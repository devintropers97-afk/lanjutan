<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Tier Checker
 * Monthly tier evaluation with upgrade/downgrade automation
 * ========================================
 */

if (!defined('BASE_PATH')) {
    die('Direct access not permitted');
}

/**
 * Evaluate and update freelancer tier based on monthly orders
 *
 * @param int $freelancerId Freelancer ID
 * @return array Update result
 */
function evaluateFreelancerTier($freelancerId) {
    global $db;

    // Get freelancer current data
    $freelancer = $db->fetchOne("SELECT * FROM freelancers WHERE id = ?", [$freelancerId]);

    if (!$freelancer) {
        return ['success' => false, 'message' => 'Freelancer not found'];
    }

    $currentTier = $freelancer['tier'];
    $monthlyOrders = $freelancer['total_orders_this_month'];

    // Determine new tier
    $newTier = determineT

ierByOrders($monthlyOrders);

    // No change
    if ($currentTier === $newTier) {
        return [
            'success' => true,
            'changed' => false,
            'tier' => $currentTier,
            'monthly_orders' => $monthlyOrders
        ];
    }

    // Update tier
    $tierDetails = getTierDetails($newTier);
    $db->update('freelancers', [
        'tier' => $newTier,
        'commission_rate' => $tierDetails['commission_rate']
    ], "id = {$freelancerId}");

    // Log tier change
    logTierChange($freelancerId, $currentTier, $newTier, $monthlyOrders);

    // Send notification email
    $isUpgrade = isUpgrade($currentTier, $newTier);
    sendTierChangeEmail($freelancer['user_id'], $currentTier, $newTier, $isUpgrade, $monthlyOrders);

    return [
        'success' => true,
        'changed' => true,
        'old_tier' => $currentTier,
        'new_tier' => $newTier,
        'is_upgrade' => $isUpgrade,
        'tier_details' => $tierDetails,
        'monthly_orders' => $monthlyOrders
    ];
}

/**
 * Determine tier by monthly order count
 *
 * @param int $orderCount Monthly order count
 * @return string Tier code
 */
function determineTierByOrders($orderCount) {
    if ($orderCount >= TIER_MAX_MIN_ORDERS) {
        return 'tier_max';
    } elseif ($orderCount >= TIER_3_MIN_ORDERS) {
        return 'tier_3';
    } elseif ($orderCount >= TIER_2_MIN_ORDERS) {
        return 'tier_2';
    } else {
        return 'tier_1';
    }
}

/**
 * Check if tier change is upgrade or downgrade
 *
 * @param string $oldTier Old tier code
 * @param string $newTier New tier code
 * @return bool True if upgrade
 */
function isUpgrade($oldTier, $newTier) {
    $tierRanking = [
        'tier_1' => 1,
        'tier_2' => 2,
        'tier_3' => 3,
        'tier_max' => 4
    ];

    return $tierRanking[$newTier] > $tierRanking[$oldTier];
}

/**
 * Log tier change to database
 *
 * @param int $freelancerId Freelancer ID
 * @param string $oldTier Old tier
 * @param string $newTier New tier
 * @param int $orderCount Monthly orders
 * @return bool Success status
 */
function logTierChange($freelancerId, $oldTier, $newTier, $orderCount) {
    global $db;

    $data = [
        'freelancer_id' => $freelancerId,
        'old_tier' => $oldTier,
        'new_tier' => $newTier,
        'order_count' => $orderCount,
        'evaluated_at' => date('Y-m-d H:i:s')
    ];

    // Log to activity_logs
    $freelancer = $db->fetchOne("SELECT user_id FROM freelancers WHERE id = ?", [$freelancerId]);

    logActivity(
        $freelancer['user_id'],
        'tier_change',
        "Tier changed from {$oldTier} to {$newTier} based on {$orderCount} orders",
        'freelancers',
        $freelancerId
    );

    return true;
}

/**
 * Send tier change notification email
 *
 * @param int $userId User ID
 * @param string $oldTier Old tier
 * @param string $newTier New tier
 * @param bool $isUpgrade Is upgrade
 * @param int $orderCount Monthly orders
 * @return bool Success status
 */
function sendTierChangeEmail($userId, $oldTier, $newTier, $isUpgrade, $orderCount) {
    $user = getUserById($userId);

    if (!$user) {
        return false;
    }

    $oldTierDetails = getTierDetails($oldTier);
    $newTierDetails = getTierDetails($newTier);

    $subject = $isUpgrade
        ? '🎉 Selamat! Tier Anda Naik - ' . $newTierDetails['tier_name']
        : '⚠️ Pemberitahuan Tier - ' . $newTierDetails['tier_name'];

    $message = $isUpgrade
        ? "<h2>🎉 Selamat, Tier Anda Naik!</h2>
           <p>Halo {$user['name']},</p>
           <p>Berkat kerja keras Anda dengan <strong>{$orderCount} orders</strong> bulan ini, tier Anda naik!</p>
           <div style='background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;'>
               <h3 style='margin: 0; color: #0F3057;'>Tier Baru Anda:</h3>
               <p style='font-size: 24px; font-weight: bold; color: {$newTierDetails['tier_color']}; margin: 10px 0;'>
                   <i class='fas {$newTierDetails['tier_icon']}'></i> {$newTierDetails['tier_name']}
               </p>
               <p style='font-size: 18px; color: #FFB400; margin: 0;'>
                   Komisi: <strong>{$newTierDetails['commission_rate']}%</strong>
               </p>
           </div>
           <p>Komisi Anda sekarang <strong>{$newTierDetails['commission_rate']}%</strong> (naik dari {$oldTierDetails['commission_rate']}%)!</p>
           <p>Terus tingkatkan performa Anda! 🚀</p>"
        : "<h2>⚠️ Update Tier Anda</h2>
           <p>Halo {$user['name']},</p>
           <p>Tier Anda telah diupdate berdasarkan {$orderCount} orders bulan ini.</p>
           <div style='background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;'>
               <h3 style='margin: 0; color: #0F3057;'>Tier Anda Sekarang:</h3>
               <p style='font-size: 24px; font-weight: bold; color: {$newTierDetails['tier_color']}; margin: 10px 0;'>
                   <i class='fas {$newTierDetails['tier_icon']}'></i> {$newTierDetails['tier_name']}
               </p>
               <p style='font-size: 18px; color: #FFB400; margin: 0;'>
                   Komisi: <strong>{$newTierDetails['commission_rate']}%</strong>
               </p>
           </div>
           <p>Tingkatkan order Anda untuk naik tier dan dapatkan komisi lebih besar!</p>";

    $emailContent = getEmailTemplate($message);

    return sendEmail($user['email'], $subject, $emailContent);
}

/**
 * Evaluate all freelancers (run monthly via cron)
 *
 * @return array Evaluation results
 */
function evaluateAllFreelancers() {
    global $db;

    $sql = "SELECT id, user_id FROM freelancers WHERE status = 'active'";
    $freelancers = $db->fetchAll($sql);

    $results = [
        'total' => count($freelancers),
        'upgraded' => 0,
        'downgraded' => 0,
        'unchanged' => 0,
        'details' => []
    ];

    foreach ($freelancers as $freelancer) {
        $result = evaluateFreelancerTier($freelancer['id']);

        if ($result['success'] && $result['changed']) {
            if ($result['is_upgrade']) {
                $results['upgraded']++;
            } else {
                $results['downgraded']++;
            }
        } else {
            $results['unchanged']++;
        }

        $results['details'][] = $result;
    }

    return $results;
}

/**
 * Reset monthly order count (run at start of each month via cron)
 *
 * @return bool Success status
 */
function resetMonthlyOrderCounts() {
    global $db;

    $sql = "UPDATE freelancers SET total_orders_this_month = 0 WHERE status = 'active'";
    return $db->query($sql);
}

/**
 * Get tier progression path for freelancer
 *
 * @param int $freelancerId Freelancer ID
 * @return array Progression details
 */
function getTierProgression($freelancerId) {
    global $db;

    $freelancer = $db->fetchOne("SELECT * FROM freelancers WHERE id = ?", [$freelancerId]);

    if (!$freelancer) {
        return null;
    }

    $currentOrders = $freelancer['total_orders_this_month'];
    $currentTierDetails = getTierDetails($freelancer['tier']);

    // Calculate next tier
    $nextTier = null;
    $ordersToNextTier = 0;

    switch ($freelancer['tier']) {
        case 'tier_1':
            $nextTier = getTierDetails('tier_2');
            $ordersToNextTier = TIER_2_MIN_ORDERS - $currentOrders;
            break;
        case 'tier_2':
            $nextTier = getTierDetails('tier_3');
            $ordersToNextTier = TIER_3_MIN_ORDERS - $currentOrders;
            break;
        case 'tier_3':
            $nextTier = getTierDetails('tier_max');
            $ordersToNextTier = TIER_MAX_MIN_ORDERS - $currentOrders;
            break;
        case 'tier_max':
            $nextTier = null;
            $ordersToNextTier = 0;
            break;
    }

    return [
        'current_tier' => $currentTierDetails,
        'current_orders' => $currentOrders,
        'next_tier' => $nextTier,
        'orders_to_next_tier' => max(0, $ordersToNextTier),
        'is_max_tier' => $freelancer['tier'] === 'tier_max'
    ];
}
