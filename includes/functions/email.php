<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Email Functions
 * Additional email sending functions
 * ========================================
 */

/**
 * Send order confirmation email
 *
 * @param array $order Order data
 * @param array $user User data
 * @return bool Success status
 */
function sendOrderConfirmationEmail($order, $user) {
    $subject = 'Konfirmasi Order #' . $order['order_number'];

    $content = '
        <h2>Terima kasih atas order Anda!</h2>
        <p>Halo <strong>' . htmlspecialchars($user['name']) . '</strong>,</p>
        <p>Order Anda telah kami terima dan sedang diproses.</p>

        <div style="background: #f8f9fa; padding: 20px; border-radius: 10px; margin: 20px 0;">
            <h3 style="margin-top: 0; color: ' . COLOR_GOLD . ';">Detail Order</h3>
            <table style="width: 100%;">
                <tr>
                    <td style="padding: 5px 0;"><strong>Order Number:</strong></td>
                    <td style="padding: 5px 0;">' . $order['order_number'] . '</td>
                </tr>
                <tr>
                    <td style="padding: 5px 0;"><strong>Layanan:</strong></td>
                    <td style="padding: 5px 0;">' . htmlspecialchars($order['service_name']) . '</td>
                </tr>
                <tr>
                    <td style="padding: 5px 0;"><strong>Total:</strong></td>
                    <td style="padding: 5px 0;">' . formatRupiah($order['total_amount']) . '</td>
                </tr>
                <tr>
                    <td style="padding: 5px 0;"><strong>Status:</strong></td>
                    <td style="padding: 5px 0;">' . $order['status'] . '</td>
                </tr>
            </table>
        </div>

        <p>Silakan lakukan pembayaran untuk melanjutkan proses order Anda.</p>

        <p style="text-align: center;">
            <a href="' . url('client/orders/detail/' . $order['id']) . '" class="btn">Lihat Detail Order</a>
        </p>

        <p>Tim kami akan segera menghubungi Anda.</p>

        <p>Terima kasih,<br><strong>Tim ' . COMPANY_NAME . '</strong></p>
    ';

    return sendEmail($user['email'], $subject, getEmailTemplate($content));
}

/**
 * Send payment confirmation email
 *
 * @param array $payment Payment data
 * @param array $user User data
 * @return bool Success status
 */
function sendPaymentConfirmationEmail($payment, $user) {
    $subject = 'Pembayaran Diterima - ' . $payment['order_number'];

    $content = '
        <h2>Pembayaran Anda Telah Dikonfirmasi!</h2>
        <p>Halo <strong>' . htmlspecialchars($user['name']) . '</strong>,</p>
        <p>Pembayaran Anda telah kami terima dan dikonfirmasi.</p>

        <div style="background: #d4edda; border: 1px solid #c3e6cb; padding: 20px; border-radius: 10px; margin: 20px 0;">
            <h3 style="margin-top: 0; color: #155724;">✓ Pembayaran Berhasil</h3>
            <table style="width: 100%;">
                <tr>
                    <td style="padding: 5px 0;"><strong>Order Number:</strong></td>
                    <td style="padding: 5px 0;">' . $payment['order_number'] . '</td>
                </tr>
                <tr>
                    <td style="padding: 5px 0;"><strong>Jumlah:</strong></td>
                    <td style="padding: 5px 0;">' . formatRupiah($payment['amount']) . '</td>
                </tr>
                <tr>
                    <td style="padding: 5px 0;"><strong>Metode:</strong></td>
                    <td style="padding: 5px 0;">' . $payment['payment_method'] . '</td>
                </tr>
                <tr>
                    <td style="padding: 5px 0;"><strong>Tanggal:</strong></td>
                    <td style="padding: 5px 0;">' . formatDate($payment['paid_at'], 'd F Y H:i') . '</td>
                </tr>
            </table>
        </div>

        <p>Tim kami akan segera memproses order Anda.</p>

        <p style="text-align: center;">
            <a href="' . url('client/orders/detail/' . $payment['order_id']) . '" class="btn">Lihat Status Order</a>
        </p>

        <p>Terima kasih atas kepercayaan Anda!</p>

        <p>Salam,<br><strong>Tim ' . COMPANY_NAME . '</strong></p>
    ';

    return sendEmail($user['email'], $subject, getEmailTemplate($content));
}

/**
 * Send order completed email
 *
 * @param array $order Order data
 * @param array $user User data
 * @return bool Success status
 */
function sendOrderCompletedEmail($order, $user) {
    $subject = 'Order Selesai - ' . $order['order_number'];

    $content = '
        <h2>Order Anda Telah Selesai!</h2>
        <p>Halo <strong>' . htmlspecialchars($user['name']) . '</strong>,</p>
        <p>Selamat! Order Anda telah selesai dikerjakan.</p>

        <div style="background: #d1ecf1; border: 1px solid #bee5eb; padding: 20px; border-radius: 10px; margin: 20px 0;">
            <h3 style="margin-top: 0; color: #0c5460;">✓ Project Completed</h3>
            <p><strong>Order Number:</strong> ' . $order['order_number'] . '</p>
            <p><strong>Layanan:</strong> ' . htmlspecialchars($order['service_name']) . '</p>
        </div>

        <p>Silakan login ke dashboard Anda untuk melihat hasil dan download file project.</p>

        <p style="text-align: center;">
            <a href="' . url('client/orders/detail/' . $order['id']) . '" class="btn">Download Project</a>
        </p>

        <p>Kami berharap Anda puas dengan hasil kerja kami. Jika ada pertanyaan atau feedback, jangan ragu untuk menghubungi kami.</p>

        <p>Terima kasih telah mempercayai ' . COMPANY_NAME . '!</p>

        <p>Salam,<br><strong>Tim ' . COMPANY_NAME . '</strong></p>
    ';

    return sendEmail($user['email'], $subject, getEmailTemplate($content));
}

/**
 * Send password reset email
 *
 * @param string $email User email
 * @param string $token Reset token
 * @return bool Success status
 */
function sendPasswordResetEmail($email, $token) {
    $subject = 'Reset Password - ' . COMPANY_NAME;

    $resetUrl = url('auth/reset-password?token=' . $token);

    $content = '
        <h2>Reset Password</h2>
        <p>Anda menerima email ini karena ada permintaan reset password untuk akun Anda.</p>

        <p>Klik tombol di bawah untuk reset password Anda:</p>

        <p style="text-align: center; margin: 30px 0;">
            <a href="' . $resetUrl . '" class="btn">Reset Password</a>
        </p>

        <p style="color: #666; font-size: 14px;">
            Link ini akan kadaluarsa dalam 1 jam.<br>
            Jika Anda tidak merasa meminta reset password, abaikan email ini.
        </p>

        <p style="color: #999; font-size: 12px; margin-top: 30px;">
            Jika tombol tidak berfungsi, copy dan paste link berikut ke browser Anda:<br>
            <span style="word-break: break-all;">' . $resetUrl . '</span>
        </p>
    ';

    return sendEmail($email, $subject, getEmailTemplate($content));
}

/**
 * Send freelancer commission notification
 *
 * @param array $freelancer Freelancer data
 * @param float $commission Commission amount
 * @param array $order Order data
 * @return bool Success status
 */
function sendCommissionNotificationEmail($freelancer, $commission, $order) {
    $subject = 'Komisi Order Baru - ' . formatRupiah($commission);

    $content = '
        <h2>Anda Mendapat Komisi!</h2>
        <p>Halo <strong>' . htmlspecialchars($freelancer['name']) . '</strong>,</p>
        <p>Selamat! Anda mendapat komisi dari order referral.</p>

        <div style="background: #fff3cd; border: 1px solid #ffeeba; padding: 20px; border-radius: 10px; margin: 20px 0;">
            <h3 style="margin-top: 0; color: #856404;">💰 Komisi Earned</h3>
            <p style="font-size: 24px; color: ' . COLOR_GOLD . '; margin: 10px 0;">
                <strong>' . formatRupiah($commission) . '</strong>
            </p>
            <table style="width: 100%;">
                <tr>
                    <td style="padding: 5px 0;"><strong>Order Number:</strong></td>
                    <td style="padding: 5px 0;">' . $order['order_number'] . '</td>
                </tr>
                <tr>
                    <td style="padding: 5px 0;"><strong>Layanan:</strong></td>
                    <td style="padding: 5px 0;">' . htmlspecialchars($order['service_name']) . '</td>
                </tr>
                <tr>
                    <td style="padding: 5px 0;"><strong>Total Order:</strong></td>
                    <td style="padding: 5px 0;">' . formatRupiah($order['total_amount']) . '</td>
                </tr>
            </table>
        </div>

        <p>Komisi ini akan ditambahkan ke akun Anda dan dapat Anda withdraw setelah order selesai.</p>

        <p style="text-align: center;">
            <a href="' . url('partner/earnings') . '" class="btn">Lihat Earnings</a>
        </p>

        <p>Terima kasih atas kontribusi Anda!</p>

        <p>Salam,<br><strong>Tim ' . COMPANY_NAME . '</strong></p>
    ';

    return sendEmail($freelancer['email'], $subject, getEmailTemplate($content));
}
?>
