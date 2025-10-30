<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Payment Configuration
 * Payment gateway settings
 * ========================================
 */

// ============================================
// PAYMENT METHODS
// ============================================
define('PAYMENT_MANUAL_TRANSFER', true);
define('PAYMENT_XENDIT', false); // Enable when ready
define('PAYMENT_MIDTRANS', false); // Disabled

// ============================================
// BANK TRANSFER SETTINGS
// ============================================
$PAYMENT_BANKS = [
    'bca' => [
        'name' => 'BCA',
        'account_number' => BANK_BCA_NUMBER,
        'account_name' => BANK_BCA_NAME,
        'logo' => 'assets/images/banks/bca.png',
        'active' => true
    ],
    'mandiri' => [
        'name' => 'Mandiri',
        'account_number' => '', // To be filled
        'account_name' => BANK_BCA_NAME,
        'logo' => 'assets/images/banks/mandiri.png',
        'active' => false
    ],
    'bni' => [
        'name' => 'BNI',
        'account_number' => '', // To be filled
        'account_name' => BANK_BCA_NAME,
        'logo' => 'assets/images/banks/bni.png',
        'active' => false
    ],
    'qris' => [
        'name' => 'QRIS',
        'account_number' => 'Semua Bank',
        'account_name' => COMPANY_NAME,
        'logo' => 'assets/images/banks/qris.png',
        'active' => PAYMENT_QRIS
    ]
];

/**
 * Get active payment methods
 *
 * @return array Active payment methods
 */
function getActivePaymentMethods() {
    global $PAYMENT_BANKS;

    return array_filter($PAYMENT_BANKS, function($method) {
        return $method['active'] === true;
    });
}

/**
 * Get payment method by code
 *
 * @param string $code Payment method code
 * @return array|null Payment method or null
 */
function getPaymentMethod($code) {
    global $PAYMENT_BANKS;

    return $PAYMENT_BANKS[$code] ?? null;
}

// ============================================
// XENDIT CONFIGURATION (Future use)
// ============================================
define('XENDIT_API_KEY', ''); // Set in production
define('XENDIT_WEBHOOK_TOKEN', ''); // Set in production
define('XENDIT_MODE', 'test'); // 'test' or 'live'

/**
 * Create Xendit invoice (placeholder for future implementation)
 *
 * @param array $data Invoice data
 * @return array|false Invoice response or false
 */
function createXenditInvoice($data) {
    // This will be implemented when Xendit is activated
    if (!PAYMENT_XENDIT) {
        return false;
    }

    // Xendit API implementation here
    // ...

    return false;
}

// ============================================
// PAYMENT STATUS
// ============================================
define('PAYMENT_STATUS_PENDING', 'pending');
define('PAYMENT_STATUS_WAITING', 'waiting');
define('PAYMENT_STATUS_VERIFIED', 'verified');
define('PAYMENT_STATUS_PAID', 'paid');
define('PAYMENT_STATUS_EXPIRED', 'expired');
define('PAYMENT_STATUS_FAILED', 'failed');
define('PAYMENT_STATUS_REFUNDED', 'refunded');

/**
 * Get payment status label
 *
 * @param string $status Payment status
 * @return string Status label
 */
function getPaymentStatusLabel($status) {
    $labels = [
        PAYMENT_STATUS_PENDING => 'Menunggu Pembayaran',
        PAYMENT_STATUS_WAITING => 'Menunggu Verifikasi',
        PAYMENT_STATUS_VERIFIED => 'Terverifikasi',
        PAYMENT_STATUS_PAID => 'Lunas',
        PAYMENT_STATUS_EXPIRED => 'Kadaluarsa',
        PAYMENT_STATUS_FAILED => 'Gagal',
        PAYMENT_STATUS_REFUNDED => 'Refund'
    ];

    return $labels[$status] ?? 'Unknown';
}

/**
 * Get payment status color class
 *
 * @param string $status Payment status
 * @return string Bootstrap color class
 */
function getPaymentStatusColor($status) {
    $colors = [
        PAYMENT_STATUS_PENDING => 'warning',
        PAYMENT_STATUS_WAITING => 'info',
        PAYMENT_STATUS_VERIFIED => 'primary',
        PAYMENT_STATUS_PAID => 'success',
        PAYMENT_STATUS_EXPIRED => 'secondary',
        PAYMENT_STATUS_FAILED => 'danger',
        PAYMENT_STATUS_REFUNDED => 'dark'
    ];

    return $colors[$status] ?? 'secondary';
}

// ============================================
// PAYMENT HELPERS
// ============================================

/**
 * Generate unique payment code
 *
 * @param int $orderId Order ID
 * @return string Payment code
 */
function generatePaymentCode($orderId) {
    return 'PAY-' . date('Ymd') . '-' . str_pad($orderId, 6, '0', STR_PAD_LEFT);
}

/**
 * Calculate unique payment amount (add unique code to total)
 *
 * @param float $amount Base amount
 * @param int $orderId Order ID
 * @return float Unique amount
 */
function calculateUniquePaymentAmount($amount, $orderId) {
    // Add unique code (last 3 digits of order ID)
    $uniqueCode = (int) substr($orderId, -3);

    return $amount + $uniqueCode;
}

/**
 * Format payment amount to Rupiah
 *
 * @param float $amount Amount
 * @return string Formatted amount
 */
function formatPaymentAmount($amount) {
    return CURRENCY_SYMBOL . ' ' . number_format($amount, 0, ',', '.');
}
?>
