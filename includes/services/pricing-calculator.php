<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Pricing Calculator
 * Price computation with add-ons, bundling, and commission separation
 * ========================================
 */

if (!defined('BASE_PATH')) {
    die('Direct access not permitted');
}

/**
 * Third-party services (NON-commissionable)
 * Domain registration, hosting, SSL, email services
 */
define('NON_COMMISSIONABLE_ITEMS', [
    'domain_registration',
    'hosting_shared',
    'hosting_vps',
    'hosting_dedicated',
    'ssl_certificate',
    'email_hosting',
    'google_workspace'
]);

/**
 * Calculate base price from packages
 *
 * @param array $items Array of items with package_id and quantity
 * @return array Price breakdown
 */
function calculateBasePrice($items) {
    global $db;

    $subtotal = 0;
    $commissionableAmount = 0;
    $nonCommissionableAmount = 0;
    $details = [];

    foreach ($items as $item) {
        $package = getServicePackage($item['package_id']);

        if (!$package) {
            continue;
        }

        $quantity = isset($item['quantity']) ? (int)$item['quantity'] : 1;
        $itemTotal = $package['price'] * $quantity;

        $details[] = [
            'package_id' => $package['id'],
            'service_name' => $package['service_name'],
            'package_name' => $package['name'],
            'price' => $package['price'],
            'quantity' => $quantity,
            'subtotal' => $itemTotal,
            'is_commissionable' => true // Default semua commissionable
        ];

        $subtotal += $itemTotal;
        $commissionableAmount += $itemTotal;
    }

    return [
        'subtotal' => $subtotal,
        'commissionable_amount' => $commissionableAmount,
        'non_commissionable_amount' => $nonCommissionableAmount,
        'items' => $details
    ];
}

/**
 * Calculate add-ons price
 *
 * @param array $addons Array of add-ons with type and details
 * @return array Add-ons breakdown
 */
function calculateAddOns($addons) {
    $total = 0;
    $commissionableAmount = 0;
    $nonCommissionableAmount = 0;
    $details = [];

    foreach ($addons as $addon) {
        $price = (float)$addon['price'];
        $quantity = isset($addon['quantity']) ? (int)$addon['quantity'] : 1;
        $itemTotal = $price * $quantity;

        // Check if non-commissionable
        $isCommissionable = !in_array($addon['type'], NON_COMMISSIONABLE_ITEMS);

        $details[] = [
            'type' => $addon['type'],
            'name' => $addon['name'],
            'price' => $price,
            'quantity' => $quantity,
            'subtotal' => $itemTotal,
            'is_commissionable' => $isCommissionable
        ];

        $total += $itemTotal;

        if ($isCommissionable) {
            $commissionableAmount += $itemTotal;
        } else {
            $nonCommissionableAmount += $itemTotal;
        }
    }

    return [
        'total' => $total,
        'commissionable_amount' => $commissionableAmount,
        'non_commissionable_amount' => $nonCommissionableAmount,
        'items' => $details
    ];
}

/**
 * Calculate bundling discount
 *
 * @param float $subtotal Current subtotal
 * @param int $itemCount Number of different services
 * @return array Discount details
 */
function calculateBundlingDiscount($subtotal, $itemCount) {
    $discountPercent = 0;
    $discountName = '';

    // Bundle discount rules
    if ($itemCount >= 5) {
        $discountPercent = 20;
        $discountName = 'Bundle 5+ Services (20% OFF)';
    } elseif ($itemCount >= 3) {
        $discountPercent = 15;
        $discountName = 'Bundle 3+ Services (15% OFF)';
    } elseif ($itemCount >= 2) {
        $discountPercent = 10;
        $discountName = 'Bundle 2 Services (10% OFF)';
    }

    $discountAmount = ($subtotal * $discountPercent) / 100;

    return [
        'name' => $discountName,
        'percent' => $discountPercent,
        'amount' => $discountAmount
    ];
}

/**
 * Calculate complete order price
 *
 * @param array $items Base service items
 * @param array $addons Optional add-ons
 * @param string $couponCode Optional coupon code
 * @return array Complete price breakdown
 */
function calculateOrderPrice($items, $addons = [], $couponCode = null) {
    // Calculate base price
    $basePrice = calculateBasePrice($items);

    // Calculate add-ons
    $addOnsPrice = !empty($addons) ? calculateAddOns($addons) : [
        'total' => 0,
        'commissionable_amount' => 0,
        'non_commissionable_amount' => 0,
        'items' => []
    ];

    // Subtotal before discounts
    $subtotal = $basePrice['subtotal'] + $addOnsPrice['total'];

    // Total commissionable & non-commissionable
    $totalCommissionable = $basePrice['commissionable_amount'] + $addOnsPrice['commissionable_amount'];
    $totalNonCommissionable = $basePrice['non_commissionable_amount'] + $addOnsPrice['non_commissionable_amount'];

    // Bundling discount
    $itemCount = count($basePrice['items']);
    $bundlingDiscount = calculateBundlingDiscount($subtotal, $itemCount);

    // Coupon discount
    $couponDiscount = 0;
    $couponDetails = null;
    if ($couponCode) {
        $couponDetails = applyCoupon($couponCode, $subtotal);
        $couponDiscount = $couponDetails['discount_amount'] ?? 0;
    }

    // Total discount
    $totalDiscount = $bundlingDiscount['amount'] + $couponDiscount;

    // Tax (if applicable)
    $taxRate = (float)getSetting('payment_tax_rate', 0);
    $taxableAmount = $subtotal - $totalDiscount;
    $tax = ($taxableAmount * $taxRate) / 100;

    // Grand total
    $grandTotal = $subtotal - $totalDiscount + $tax;

    return [
        'items' => $basePrice['items'],
        'addons' => $addOnsPrice['items'],
        'subtotal' => $subtotal,
        'bundling_discount' => $bundlingDiscount,
        'coupon_discount' => $couponDiscount,
        'coupon_details' => $couponDetails,
        'total_discount' => $totalDiscount,
        'tax_rate' => $taxRate,
        'tax' => $tax,
        'grand_total' => $grandTotal,
        'commissionable_amount' => $totalCommissionable - ($totalDiscount * ($totalCommissionable / $subtotal)),
        'non_commissionable_amount' => $totalNonCommissionable,
        'breakdown' => [
            'Subtotal' => formatRupiah($subtotal),
            'Bundling Discount' => '-' . formatRupiah($bundlingDiscount['amount']),
            'Coupon Discount' => '-' . formatRupiah($couponDiscount),
            'Tax (' . $taxRate . '%)' => formatRupiah($tax),
            'Grand Total' => formatRupiah($grandTotal)
        ]
    ];
}

/**
 * Apply coupon code
 *
 * @param string $code Coupon code
 * @param float $subtotal Current subtotal
 * @return array|null Coupon details
 */
function applyCoupon($code, $subtotal) {
    global $db;

    // Query coupon from database
    $sql = "SELECT * FROM coupons WHERE code = ? AND is_active = 1 AND (expires_at IS NULL OR expires_at > NOW())";
    $coupon = $db->fetchOne($sql, [$code]);

    if (!$coupon) {
        return null;
    }

    // Check usage limit
    if ($coupon['max_uses'] > 0 && $coupon['used_count'] >= $coupon['max_uses']) {
        return null;
    }

    // Check minimum purchase
    if ($coupon['min_purchase'] > 0 && $subtotal < $coupon['min_purchase']) {
        return null;
    }

    // Calculate discount
    $discountAmount = 0;
    if ($coupon['type'] === 'percentage') {
        $discountAmount = ($subtotal * $coupon['value']) / 100;
        if ($coupon['max_discount'] > 0) {
            $discountAmount = min($discountAmount, $coupon['max_discount']);
        }
    } else {
        $discountAmount = $coupon['value'];
    }

    return [
        'code' => $coupon['code'],
        'name' => $coupon['name'],
        'type' => $coupon['type'],
        'value' => $coupon['value'],
        'discount_amount' => $discountAmount
    ];
}

/**
 * Get price estimate for quick quote
 *
 * @param int $packageId Package ID
 * @param int $quantity Quantity
 * @return array Price estimate
 */
function getQuickPriceEstimate($packageId, $quantity = 1) {
    $items = [['package_id' => $packageId, 'quantity' => $quantity]];
    return calculateOrderPrice($items);
}
