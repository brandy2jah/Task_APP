<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
if (file_exists('conf.php')) include 'conf.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // collect form inputs
    $email = trim($_POST['email'] ?? '');
    $name  = trim($_POST['name'] ?? 'User');

    // validate email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    $safe_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $subject   = "Welcome to Task App";
    $body      = "
        <p>Hi {$safe_name},</p>
        <p>Welcome to Task App — we're excited to have you onboard!</p>
        <p>Cheers,<br>Task App Team</p>
    ";

    $mail = new PHPMailer(true);
    try {
        // use settings from conf.php
        $mail->isSMTP();
        $mail->Host       = $conf['smtp_host'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $conf['smtp_user'];
        $mail->Password   = $conf['smtp_pass'];
        $mail->SMTPSecure = $conf['smtp_secure'];
        $mail->Port       = $conf['smtp_port'];

        // headers
        $mail->setFrom($conf['smtp_user'], $conf['site_name']);
        $mail->addAddress($email, $safe_name);

        // content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        echo " Welcome email sent to {$email}";
    } catch (Exception $e) {
        echo " Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}
?>
