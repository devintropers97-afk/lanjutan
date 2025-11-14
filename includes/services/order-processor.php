<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Order Processor
 * Order creation, item management, status tracking,
 * partner assignment, and commission recording
 * ========================================
 */

if (!defined('BASE_PATH')) {
    die('Direct access not permitted');
}

/**
 * Create new order
 *
 * @param array $orderData Order details
 * @param array $items Order items
 * @param array $addons Optional add-ons
 * @return array Result with order ID
 */
function createOrder($orderData, $items, $addons = []) {
    global $db;

    try {
        // Calculate pricing
        $pricing = calculateOrderPrice($items, $addons);

        // Generate order number
        $orderNumber = generateOrderNumber();

        // Prepare order data
        $order = [
            'order_number' => $orderNumber,
            'user_id' => $orderData['user_id'],
            'status' => 'pending',
            'customer_name' => $orderData['customer_name'],
            'customer_email' => $orderData['customer_email'],
            'customer_phone' => $orderData['customer_phone'] ?? null,
            'customer_company' => $orderData['customer_company'] ?? null,
            'subtotal' => $pricing['subtotal'],
            'discount' => $pricing['total_discount'],
            'tax' => $pricing['tax'],
            'total_amount' => $pricing['grand_total'],
            'notes' => $orderData['notes'] ?? null,
            'requirements' => $orderData['requirements'] ?? null
        ];

        // Insert order
        $orderId = $db->insert('orders', $order);

        if (!$orderId) {
            throw new Exception('Failed to create order');
        }

        // Insert order items
        foreach ($pricing['items'] as $item) {
            $orderItem = [
                'order_id' => $orderId,
                'service_id' => $item['package_id'], // Will get from package
                'package_id' => $item['package_id'],
                'service_name' => $item['service_name'],
                'package_name' => $item['package_name'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['subtotal']
            ];

            $db->insert('order_items', $orderItem);
        }

        // Insert add-ons if any
        if (!empty($pricing['addons'])) {
            foreach ($pricing['addons'] as $addon) {
                $addonItem = [
                    'order_id' => $orderId,
                    'service_id' => 0, // Add-ons don't have service_id
                    'service_name' => $addon['name'],
                    'quantity' => $addon['quantity'],
                    'price' => $addon['price'],
                    'subtotal' => $addon['subtotal']
                ];

                $db->insert('order_items', $addonItem);
            }
        }

        // Create initial status history
        addOrderStatusHistory($orderId, null, 'pending', 'Order created', $orderData['user_id']);

        // Send notification to client
        notifyNewOrder($orderId);

        // Send notification to admin
        notifyAdminNewOrder($orderId);

        return [
            'success' => true,
            'order_id' => $orderId,
            'order_number' => $orderNumber,
            'total_amount' => $pricing['grand_total']
        ];

    } catch (Exception $e) {
        return [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }
}

/**
 * Generate unique order number
 *
 * @return string Order number (format: ORD-YYYYMMDD-XXXX)
 */
function generateOrderNumber() {
    global $db;

    $date = date('Ymd');
    $prefix = "ORD-{$date}-";

    // Get last order number today
    $sql = "SELECT order_number FROM orders
            WHERE order_number LIKE ?
            ORDER BY id DESC LIMIT 1";

    $lastOrder = $db->fetchOne($sql, ["{$prefix}%"]);

    if ($lastOrder) {
        $lastNumber = (int)substr($lastOrder['order_number'], -4);
        $newNumber = $lastNumber + 1;
    } else {
        $newNumber = 1;
    }

    return $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
}

/**
 * Update order status
 *
 * @param int $orderId Order ID
 * @param string $newStatus New status
 * @param string $notes Optional notes
 * @param int $changedBy User ID who changed status
 * @return bool Success status
 */
function updateOrderStatus($orderId, $newStatus, $notes = null, $changedBy = null) {
    global $db;

    // Get current order
    $order = $db->fetchOne("SELECT * FROM orders WHERE id = ?", [$orderId]);

    if (!$order) {
        return false;
    }

    $oldStatus = $order['status'];

    // Update order
    $updateData = ['status' => $newStatus];

    // Set timestamps for specific statuses
    switch ($newStatus) {
        case 'processing':
            $updateData['started_at'] = date('Y-m-d H:i:s');
            break;
        case 'completed':
            $updateData['completed_at'] = date('Y-m-d H:i:s');
            break;
        case 'cancelled':
            $updateData['cancelled_at'] = date('Y-m-d H:i:s');
            if ($notes) {
                $updateData['cancellation_reason'] = $notes;
            }
            break;
    }

    $db->update('orders', $updateData, "id = {$orderId}");

    // Add status history
    addOrderStatusHistory($orderId, $oldStatus, $newStatus, $notes, $changedBy);

    // Handle commission when order is completed
    if ($newStatus === 'completed' && $order['freelancer_id']) {
        handleOrderCompletion($orderId, $order['freelancer_id']);
    }

    // Send notifications
    sendOrderStatusNotification($orderId, $oldStatus, $newStatus);

    return true;
}

/**
 * Add order status history record
 *
 * @param int $orderId Order ID
 * @param string $oldStatus Old status
 * @param string $newStatus New status
 * @param string $notes Notes
 * @param int $changedBy User ID
 * @return int History ID
 */
function addOrderStatusHistory($orderId, $oldStatus, $newStatus, $notes = null, $changedBy = null) {
    global $db;

    $data = [
        'order_id' => $orderId,
        'old_status' => $oldStatus,
        'new_status' => $newStatus,
        'notes' => $notes,
        'changed_by' => $changedBy
    ];

    return $db->insert('order_status_history', $data);
}

/**
 * Assign freelancer to order
 *
 * @param int $orderId Order ID
 * @param int $freelancerId Freelancer ID
 * @return bool Success status
 */
function assignFreelancerToOrder($orderId, $freelancerId) {
    global $db;

    // Update order
    $db->update('orders', ['freelancer_id' => $freelancerId], "id = {$orderId}");

    // Send notification to freelancer
    $freelancer = $db->fetchOne("SELECT user_id FROM freelancers WHERE id = ?", [$freelancerId]);
    $order = $db->fetchOne("SELECT * FROM orders WHERE id = ?", [$orderId]);

    createNotification(
        $freelancer['user_id'],
        'Order Baru Ditugaskan',
        "Order #{$order['order_number']} telah ditugaskan kepada Anda",
        'success',
        '/freelancer/orders/' . $orderId
    );

    return true;
}

/**
 * Handle order completion (commission & tier update)
 *
 * @param int $orderId Order ID
 * @param int $freelancerId Freelancer ID
 * @return bool Success status
 */
function handleOrderCompletion($orderId, $freelancerId) {
    global $db;

    // Calculate commission
    $commission = calculateOrderCommission($orderId, $freelancerId);

    if ($commission) {
        // Record commission
        recordCommission($commission);

        // Update freelancer stats
        $db->query("UPDATE freelancers SET
                    total_orders = total_orders + 1,
                    total_orders_this_month = total_orders_this_month + 1,
                    total_earnings = total_earnings + ?,
                    pending_balance = pending_balance + ?
                    WHERE id = ?",
                    [$commission['commission_amount'], $commission['commission_amount'], $freelancerId]);

        // Evaluate tier (might upgrade)
        evaluateFreelancerTier($freelancerId);

        // Notify freelancer about commission
        notifyCommissionEarned($freelancerId, $commission['commission_amount'], $orderId);
    }

    // Increment service orders count
    $items = $db->fetchAll("SELECT DISTINCT service_id FROM order_items WHERE order_id = ?", [$orderId]);
    foreach ($items as $item) {
        $db->query("UPDATE services SET orders_count = orders_count + 1 WHERE id = ?", [$item['service_id']]);
    }

    return true;
}

/**
 * Send order status notification
 *
 * @param int $orderId Order ID
 * @param string $oldStatus Old status
 * @param string $newStatus New status
 * @return bool Success status
 */
function sendOrderStatusNotification($orderId, $oldStatus, $newStatus) {
    global $db;

    $order = $db->fetchOne("SELECT * FROM orders WHERE id = ?", [$orderId]);

    if (!$order) {
        return false;
    }

    $statusMessages = [
        'pending' => 'Order Anda sedang menunggu pembayaran',
        'paid' => 'Pembayaran Anda telah diterima dan sedang diverifikasi',
        'processing' => 'Order Anda sedang dikerjakan',
        'revision' => 'Revisi order Anda sedang diproses',
        'completed' => 'Order Anda telah selesai!',
        'cancelled' => 'Order Anda dibatalkan',
        'refunded' => 'Pembayaran Anda telah dikembalikan'
    ];

    $message = $statusMessages[$newStatus] ?? 'Status order Anda berubah';

    createNotification(
        $order['user_id'],
        'Update Order #' . $order['order_number'],
        $message,
        'info',
        '/orders/' . $orderId
    );

    return true;
}

/**
 * Get order details with items
 *
 * @param int $orderId Order ID
 * @return array|null Order with items
 */
function getOrderDetails($orderId) {
    global $db;

    $order = $db->fetchOne("SELECT * FROM orders WHERE id = ?", [$orderId]);

    if (!$order) {
        return null;
    }

    // Get items
    $order['items'] = $db->fetchAll("SELECT * FROM order_items WHERE order_id = ?", [$orderId]);

    // Get status history
    $order['status_history'] = $db->fetchAll(
        "SELECT * FROM order_status_history WHERE order_id = ? ORDER BY created_at DESC",
        [$orderId]
    );

    // Get payment if exists
    $order['payment'] = $db->fetchOne("SELECT * FROM payments WHERE order_id = ? ORDER BY id DESC LIMIT 1", [$orderId]);

    return $order;
}
