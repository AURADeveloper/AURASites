<?php
require 'vendor/autoload.php';
require_once('vendor/captcha/recaptcha/recaptcha/recaptchalib.php');

$recipientName = 'Sam Edge';
$recipientEmail = 'sam.edge@auraaccess.com.au';
$privateKey = '6LfE_vQSAAAAAHr_aoWQs_vhNwgLv8fPqWFvJcMX';

$senderName = $_GET['name'];
$senderEmail = $_GET['email'];
$senderMessage = $_GET['message'];
$challenge = $_GET['challenge'];
$response = $_GET['response'];

// Check the recaptcha challenge was correct
$resp = recaptcha_check_answer($privateKey,
                               $_SERVER['REMOTE_ADDR'],
                               $challenge,
                               $response);

if (!$resp->is_valid) {
    header("HTTP/1.1 400 Bad Request", true, 400);
    echo ('The reCAPTCHA wasn\'t entered correctly, please try again.');
} else {
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->IsHTML(false);
    $mail->Username = "mailer@auraaccess.com.au";
    $mail->Password = "auraaccesssecretpassword";

    $mail->setFrom($senderEmail, $senderName);
    $mail->addReplyTo($senderEmail, $senderName);
    $mail->addAddress($recipientEmail, $recipientName);     // Add a recipient

    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    $mail->isHTML(false);                                  // Set email format to HTML

    $mail->Subject = 'New Message Received via Contact Form';
    $mail->Body    = $senderMessage;
    $mail->AltBody = $senderMessage;

    if(!$mail->send()) {
        header("HTTP/1.1 500 Internal Error", true, 500);
        echo 'Message could not be sent. '. $mail->ErrorInfo;
    } else {
        echo 'Message has been sent.';
    }
}
