<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Commission Calculator
 * Tier-based commission computation
 * Explicitly excludes: domain, hosting, SSL, email services
 * ========================================
 */

if (!defined('BASE_PATH')) {
    die('Direct access not permitted');
}

/**
 * Get freelancer's current tier
 *
 * @param int $freelancerId Freelancer ID
 * @return array Tier details
 */
function getFreelancerTier($freelancerId) {
    global $db;

    $sql = "SELECT tier, commission_rate, total_orders_this_month
            FROM freelancers
            WHERE id = ?";

    $freelancer = $db->fetchOne($sql, [$freelancerId]);

    if (!$freelancer) {
        return null;
    }

    // Get tier details based on current tier
    $tierDetails = getTierDetails($freelancer['tier']);

    return array_merge($freelancer, $tierDetails);
}

/**
 * Get tier details by tier code
 *
 * @param string $tierCode Tier code (tier_1, tier_2, tier_3, tier_max)
 * @return array Tier details
 */
function getTierDetails($tierCode) {
    switch ($tierCode) {
        case 'tier_1':
            return [
                'tier_name' => TIER_1_NAME,
                'tier_icon' => TIER_1_ICON,
                'tier_color' => TIER_1_COLOR,
                'min_orders' => TIER_1_MIN_ORDERS,
                'max_orders' => TIER_1_MAX_ORDERS,
                'commission_rate' => TIER_1_COMMISSION
            ];

        case 'tier_2':
            return [
                'tier_name' => TIER_2_NAME,
                'tier_icon' => TIER_2_ICON,
                'tier_color' => TIER_2_COLOR,
                'min_orders' => TIER_2_MIN_ORDERS,
                'max_orders' => TIER_2_MAX_ORDERS,
                'commission_rate' => TIER_2_COMMISSION
            ];

        case 'tier_3':
            return [
                'tier_name' => TIER_3_NAME,
                'tier_icon' => TIER_3_ICON,
                'tier_color' => TIER_3_COLOR,
                'min_orders' => TIER_3_MIN_ORDERS,
                'max_orders' => TIER_3_MAX_ORDERS,
                'commission_rate' => TIER_3_COMMISSION
            ];

        case 'tier_max':
            return [
                'tier_name' => TIER_MAX_NAME,
                'tier_icon' => TIER_MAX_ICON,
                'tier_color' => TIER_MAX_COLOR,
                'min_orders' => TIER_MAX_MIN_ORDERS,
                'max_orders' => TIER_MAX_MAX_ORDERS,
                'commission_rate' => TIER_MAX_COMMISSION
            ];

        default:
            return [
                'tier_name' => 'Unknown',
                'tier_icon' => 'fa-question',
                'tier_color' => '#666',
                'min_orders' => 0,
                'max_orders' => 0,
                'commission_rate' => 0
            ];
    }
}

/**
 * Calculate commission for an order
 *
 * @param int $orderId Order ID
 * @param int $freelancerId Freelancer ID
 * @return array Commission details
 */
function calculateOrderCommission($orderId, $freelancerId) {
    global $db;

    // Get order details
    $order = $db->fetchOne("SELECT * FROM orders WHERE id = ?", [$orderId]);

    if (!$order) {
        return null;
    }

    // Get freelancer tier
    $tierData = getFreelancerTier($freelancerId);

    if (!$tierData) {
        return null;
    }

    $commissionRate = $tierData['commission_rate'];

    // Get order items to separate commissionable vs non-commissionable
    $sql = "SELECT oi.*, s.name as service_name
            FROM order_items oi
            LEFT JOIN services s ON oi.service_id = s.id
            WHERE oi.order_id = ?";

    $items = $db->fetchAll($sql, [$orderId]);

    $commissionableAmount = 0;
    $nonCommissionableAmount = 0;
    $itemDetails = [];

    foreach ($items as $item) {
        $isCommissionable = !isNonCommissionableService($item['service_id']);

        $itemDetails[] = [
            'service_name' => $item['service_name'],
            'subtotal' => $item['subtotal'],
            'is_commissionable' => $isCommissionable
        ];

        if ($isCommissionable) {
            $commissionableAmount += $item['subtotal'];
        } else {
            $nonCommissionableAmount += $item['subtotal'];
        }
    }

    // Calculate commission (only from commissionable amount)
    $commissionAmount = ($commissionableAmount * $commissionRate) / 100;

    return [
        'order_id' => $orderId,
        'freelancer_id' => $freelancerId,
        'tier' => $tierData['tier'],
        'tier_name' => $tierData['tier_name'],
        'tier_icon' => $tierData['tier_icon'],
        'tier_color' => $tierData['tier_color'],
        'commission_rate' => $commissionRate,
        'order_amount' => $order['total_amount'],
        'commissionable_amount' => $commissionableAmount,
        'non_commissionable_amount' => $nonCommissionableAmount,
        'commission_amount' => $commissionAmount,
        'items' => $itemDetails,
        'breakdown' => [
            'Order Total' => formatRupiah($order['total_amount']),
            'Commissionable' => formatRupiah($commissionableAmount),
            'Non-Commissionable' => formatRupiah($nonCommissionableAmount),
            'Commission Rate' => $commissionRate . '%',
            'Your Commission' => formatRupiah($commissionAmount)
        ]
    ];
}

/**
 * Check if service is non-commissionable
 *
 * @param int $serviceId Service ID
 * @return bool True if non-commissionable
 */
function isNonCommissionableService($serviceId) {
    global $db;

    $sql = "SELECT slug FROM services WHERE id = ?";
    $service = $db->fetchOne($sql, [$serviceId]);

    if (!$service) {
        return false;
    }

    // Check if slug contains non-commissionable keywords
    $nonCommissionableKeywords = [
        'domain',
        'hosting',
        'ssl',
        'email',
        'google-workspace'
    ];

    foreach ($nonCommissionableKeywords as $keyword) {
        if (strpos($service['slug'], $keyword) !== false) {
            return true;
        }
    }

    return false;
}

/**
 * Record commission to database
 *
 * @param array $commissionData Commission calculation result
 * @return int Commission ID
 */
function recordCommission($commissionData) {
    global $db;

    $releaseDate = date('Y-m-d H:i:s', strtotime('+' . COMMISSION_RELEASE_DAYS . ' days'));

    $data = [
        'freelancer_id' => $commissionData['freelancer_id'],
        'order_id' => $commissionData['order_id'],
        'order_amount' => $commissionData['order_amount'],
        'commission_rate' => $commissionData['commission_rate'],
        'commission_amount' => $commissionData['commission_amount'],
        'tier' => $commissionData['tier'],
        'status' => 'pending',
        'available_at' => $releaseDate
    ];

    return $db->insert('commissions', $data);
}

/**
 * Get freelancer total earnings
 *
 * @param int $freelancerId Freelancer ID
 * @param string $status Commission status (all, available, withdrawn, pending)
 * @return float Total earnings
 */
function getFreelancerEarnings($freelancerId, $status = 'all') {
    global $db;

    $sql = "SELECT SUM(commission_amount) as total
            FROM commissions
            WHERE freelancer_id = ?";

    $params = [$freelancerId];

    if ($status !== 'all') {
        $sql .= " AND status = ?";
        $params[] = $status;
    }

    $result = $db->fetchOne($sql, $params);

    return $result ? (float)$result['total'] : 0;
}

/**
 * Get commission breakdown by month
 *
 * @param int $freelancerId Freelancer ID
 * @param int $months Number of months to show
 * @return array Monthly breakdown
 */
function getCommissionBreakdownByMonth($freelancerId, $months = 6) {
    global $db;

    $sql = "SELECT
                DATE_FORMAT(created_at, '%Y-%m') as month,
                COUNT(*) as total_orders,
                SUM(commission_amount) as total_commission
            FROM commissions
            WHERE freelancer_id = ?
            AND created_at >= DATE_SUB(NOW(), INTERVAL ? MONTH)
            GROUP BY DATE_FORMAT(created_at, '%Y-%m')
            ORDER BY month DESC";

    return $db->fetchAll($sql, [$freelancerId, $months]);
}
