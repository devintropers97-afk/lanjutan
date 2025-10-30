<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Email Configuration
 * Email settings and templates
 * ========================================
 */

// ============================================
// SMTP CONFIGURATION (for future use)
// ============================================
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', CONTACT_EMAIL_ADMIN);
define('SMTP_PASSWORD', ''); // Set in production
define('SMTP_ENCRYPTION', 'tls');

// Email sender
define('EMAIL_FROM', CONTACT_EMAIL_ADMIN);
define('EMAIL_FROM_NAME', COMPANY_NAME);

// Email defaults
define('EMAIL_CHARSET', 'UTF-8');
define('EMAIL_HTML', true);

/**
 * Send email using PHP mail() function
 *
 * @param string $to Recipient email
 * @param string $subject Email subject
 * @param string $message Email message (HTML or plain text)
 * @param string $fromEmail Sender email (optional)
 * @param string $fromName Sender name (optional)
 * @return bool Success status
 */
function sendEmail($to, $subject, $message, $fromEmail = EMAIL_FROM, $fromName = EMAIL_FROM_NAME) {
    // Email headers
    $headers = [];
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=' . EMAIL_CHARSET;
    $headers[] = 'From: ' . $fromName . ' <' . $fromEmail . '>';
    $headers[] = 'Reply-To: ' . $fromEmail;
    $headers[] = 'X-Mailer: PHP/' . phpversion();

    // Send email
    return mail($to, $subject, $message, implode("\r\n", $headers));
}

/**
 * Get email template wrapper
 *
 * @param string $content Email content
 * @return string Full HTML email
 */
function getEmailTemplate($content) {
    $template = '
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>' . COMPANY_NAME . '</title>
        <style>
            body {
                font-family: "Inter", Arial, sans-serif;
                line-height: 1.6;
                color: #333;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }
            .container {
                max-width: 600px;
                margin: 20px auto;
                background: #ffffff;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }
            .header {
                background: linear-gradient(135deg, ' . COLOR_PRIMARY_BLUE . ' 0%, ' . COLOR_DARK_BLUE . ' 100%);
                padding: 30px;
                text-align: center;
                color: #ffffff;
            }
            .header h1 {
                margin: 0;
                font-size: 24px;
                color: ' . COLOR_GOLD . ';
            }
            .content {
                padding: 30px;
            }
            .footer {
                background: #f8f8f8;
                padding: 20px;
                text-align: center;
                font-size: 12px;
                color: #666;
            }
            .btn {
                display: inline-block;
                padding: 12px 30px;
                background: ' . COLOR_GOLD . ';
                color: ' . COLOR_DARK_BLUE . ';
                text-decoration: none;
                border-radius: 25px;
                font-weight: bold;
                margin: 10px 0;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>' . COMPANY_NAME . '</h1>
                <p>' . COMPANY_TAGLINE . '</p>
            </div>
            <div class="content">
                ' . $content . '
            </div>
            <div class="footer">
                <p><strong>' . COMPANY_NAME . '</strong></p>
                <p>' . COMPANY_ADDRESS_FULL . '</p>
                <p>
                    Email: ' . CONTACT_EMAIL_ADMIN . ' |
                    Phone: ' . CONTACT_WHATSAPP_FORMATTED . '
                </p>
                <p>© ' . date('Y') . ' ' . COMPANY_NAME . '. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>';

    return $template;
}

/**
 * Send welcome email to new user
 *
 * @param string $email User email
 * @param string $name User name
 * @return bool Success status
 */
function sendWelcomeEmail($email, $name) {
    $subject = 'Selamat Datang di ' . COMPANY_NAME;

    $content = '
        <h2>Halo, ' . htmlspecialchars($name) . '!</h2>
        <p>Terima kasih telah bergabung dengan ' . COMPANY_NAME . '.</p>
        <p>Kami senang Anda menjadi bagian dari keluarga digital kami.</p>
        <p>Dengan akun Anda, Anda dapat:</p>
        <ul>
            <li>Memesan layanan digital kami</li>
            <li>Melacak status order</li>
            <li>Mengelola pembayaran</li>
            <li>Dan masih banyak lagi!</li>
        </ul>
        <p style="text-align: center;">
            <a href="' . url('auth/login') . '" class="btn">Mulai Sekarang</a>
        </p>
        <p>Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi kami.</p>
        <p>Salam hangat,<br><strong>Tim ' . COMPANY_NAME . '</strong></p>
    ';

    return sendEmail($email, $subject, getEmailTemplate($content));
}

/**
 * Send contact form notification to admin
 *
 * @param array $data Form data
 * @return bool Success status
 */
function sendContactNotification($data) {
    $subject = 'Pesan Baru dari Website - ' . $data['name'];

    $content = '
        <h2>Pesan Kontak Baru</h2>
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Nama:</strong></td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">' . htmlspecialchars($data['name']) . '</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Email:</strong></td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">' . htmlspecialchars($data['email']) . '</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Telepon:</strong></td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">' . htmlspecialchars($data['phone']) . '</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Subjek:</strong></td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">' . htmlspecialchars($data['subject']) . '</td>
            </tr>
            <tr>
                <td style="padding: 10px; vertical-align: top;"><strong>Pesan:</strong></td>
                <td style="padding: 10px;">' . nl2br(htmlspecialchars($data['message'])) . '</td>
            </tr>
        </table>
    ';

    return sendEmail(CONTACT_EMAIL_ADMIN, $subject, getEmailTemplate($content));
}
?>
