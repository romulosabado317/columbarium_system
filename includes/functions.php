<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/phpmailer/src/Exception.php';
require 'vendor/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/src/SMTP.php';


function sendEmail($to, $subject, $body){
$mail = new PHPMailer(true);
try {
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'your_email@gmail.com';
$mail->Password = 'your_email_password';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom('your_email@gmail.com', 'Columbarium System');
$mail->addAddress($to);
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $body;
$mail->send();
} catch (Exception $e) { echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}"; }
}


function sanitize($data){ return htmlspecialchars(trim($data), ENT_QUOTES); }


?>
