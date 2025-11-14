<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Notification Functions
 * In-app notification system
 * ========================================
 */

/**
 * Create notification
 *
 * @param int $userId User ID
 * @param string $title Notification title
 * @param string $message Notification message
 * @param string $type Notification type (info, success, warning, error)
 * @param string $link Link URL (optional)
 * @return bool Success status
 */
function createNotification($userId, $title, $message, $type = 'info', $link = null) {
    global $db;

    return $db->insert('notifications', [
        'user_id' => $userId,
        'title' => $title,
        'message' => $message,
        'type' => $type,
        'link' => $link,
        'is_read' => 0,
        'created_at' => date('Y-m-d H:i:s')
    ]);
}

/**
 * Get user notifications
 *
 * @param int $userId User ID
 * @param int $limit Limit
 * @param bool $unreadOnly Get unread only
 * @return array Notifications
 */
function getUserNotifications($userId, $limit = 10, $unreadOnly = false) {
    global $db;

    $userId = (int) $userId;
    $limit = (int) $limit;

    $sql = "SELECT * FROM notifications WHERE user_id = {$userId}";

    if ($unreadOnly) {
        $sql .= " AND is_read = 0";
    }

    $sql .= " ORDER BY created_at DESC LIMIT {$limit}";

    return $db->fetchAll($sql);
}

/**
 * Get unread notification count
 *
 * @param int $userId User ID
 * @return int Unread count
 */
function getUnreadNotificationCount($userId) {
    global $db;

    $userId = (int) $userId;
    $result = $db->fetchOne("SELECT COUNT(*) as count FROM notifications WHERE user_id = {$userId} AND is_read = 0");

    return $result ? (int) $result['count'] : 0;
}

/**
 * Mark notification as read
 *
 * @param int $notificationId Notification ID
 * @return bool Success status
 */
function markNotificationAsRead($notificationId) {
    global $db;

    $notificationId = (int) $notificationId;

    return $db->update('notifications', [
        'is_read' => 1,
        'read_at' => date('Y-m-d H:i:s')
    ], "id = {$notificationId}");
}

/**
 * Mark all notifications as read
 *
 * @param int $userId User ID
 * @return bool Success status
 */
function markAllNotificationsAsRead($userId) {
    global $db;

    $userId = (int) $userId;

    return $db->update('notifications', [
        'is_read' => 1,
        'read_at' => date('Y-m-d H:i:s')
    ], "user_id = {$userId} AND is_read = 0");
}

/**
 * Delete notification
 *
 * @param int $notificationId Notification ID
 * @return bool Success status
 */
function deleteNotification($notificationId) {
    global $db;

    $notificationId = (int) $notificationId;

    return $db->delete('notifications', "id = {$notificationId}");
}

/**
 * Delete all user notifications
 *
 * @param int $userId User ID
 * @return bool Success status
 */
function deleteAllNotifications($userId) {
    global $db;

    $userId = (int) $userId;

    return $db->delete('notifications', "user_id = {$userId}");
}

/**
 * Send notification to all admins
 *
 * @param string $title Notification title
 * @param string $message Notification message
 * @param string $type Notification type
 * @param string $link Link URL (optional)
 * @return bool Success status
 */
function notifyAdmins($title, $message, $type = 'info', $link = null) {
    global $db;

    // Get all admin users
    $admins = $db->fetchAll("SELECT id FROM users WHERE role = 'admin' AND status = 'active'");

    $success = true;
    foreach ($admins as $admin) {
        $result = createNotification($admin['id'], $title, $message, $type, $link);
        if (!$result) {
            $success = false;
        }
    }

    return $success;
}

/**
 * Notify new order to admins
 *
 * @param array $order Order data
 * @return bool Success status
 */
function notifyNewOrder($order) {
    $title = 'Order Baru Masuk';
    $message = "Order baru #{$order['order_number']} dari {$order['customer_name']} - " . formatRupiah($order['total_amount']);
    $link = 'admin/orders/detail/' . $order['id'];

    return notifyAdmins($title, $message, 'info', $link);
}

/**
 * Notify payment received to admins
 *
 * @param array $payment Payment data
 * @return bool Success status
 */
function notifyPaymentReceived($payment) {
    $title = 'Pembayaran Baru Diterima';
    $message = "Pembayaran untuk order #{$payment['order_number']} - " . formatRupiah($payment['amount']) . " menunggu verifikasi";
    $link = 'admin/payments/verify/' . $payment['id'];

    return notifyAdmins($title, $message, 'success', $link);
}

/**
 * Notify order status change to customer
 *
 * @param int $userId User ID
 * @param array $order Order data
 * @param string $newStatus New status
 * @return bool Success status
 */
function notifyOrderStatusChange($userId, $order, $newStatus) {
    $statusMessages = [
        'pending' => 'Order Anda sedang menunggu pembayaran',
        'paid' => 'Pembayaran Anda telah dikonfirmasi',
        'processing' => 'Order Anda sedang diproses',
        'completed' => 'Order Anda telah selesai',
        'cancelled' => 'Order Anda dibatalkan'
    ];

    $title = 'Update Status Order';
    $message = "Order #{$order['order_number']}: " . ($statusMessages[$newStatus] ?? $newStatus);
    $link = 'client/orders/detail/' . $order['id'];

    $type = $newStatus === 'completed' ? 'success' : 'info';

    return createNotification($userId, $title, $message, $type, $link);
}

/**
 * Notify commission earned to freelancer
 *
 * @param int $freelancerId Freelancer ID
 * @param float $commission Commission amount
 * @param array $order Order data
 * @return bool Success status
 */
function notifyCommissionEarned($freelancerId, $commission, $order) {
    $title = 'Komisi Diterima';
    $message = "Anda mendapat komisi " . formatRupiah($commission) . " dari order #{$order['order_number']}";
    $link = 'partner/earnings';

    return createNotification($freelancerId, $title, $message, 'success', $link);
}

/**
 * Notify tier upgrade to freelancer
 *
 * @param int $freelancerId Freelancer ID
 * @param string $newTier New tier name
 * @param int $newCommission New commission percentage
 * @return bool Success status
 */
function notifyTierUpgrade($freelancerId, $newTier, $newCommission) {
    $title = 'Selamat! Tier Naik';
    $message = "Anda naik ke {$newTier}! Komisi sekarang {$newCommission}%";
    $link = 'partner/tier';

    return createNotification($freelancerId, $title, $message, 'success', $link);
}

/**
 * Notify withdrawal request to admins
 *
 * @param array $withdrawal Withdrawal data
 * @return bool Success status
 */
function notifyWithdrawalRequest($withdrawal) {
    $title = 'Permintaan Withdrawal Baru';
    $message = "Permintaan withdrawal dari {$withdrawal['freelancer_name']} - " . formatRupiah($withdrawal['amount']);
    $link = 'admin/withdrawals/detail/' . $withdrawal['id'];

    return notifyAdmins($title, $message, 'warning', $link);
}

/**
 * Notify withdrawal approved to freelancer
 *
 * @param int $freelancerId Freelancer ID
 * @param float $amount Withdrawal amount
 * @return bool Success status
 */
function notifyWithdrawalApproved($freelancerId, $amount) {
    $title = 'Withdrawal Disetujui';
    $message = "Withdrawal Anda sebesar " . formatRupiah($amount) . " telah disetujui dan sedang diproses";
    $link = 'partner/withdrawals';

    return createNotification($freelancerId, $title, $message, 'success', $link);
}
?>
