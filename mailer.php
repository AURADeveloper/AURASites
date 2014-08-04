<?php
require 'vendor/autoload.php';
require_once('vendor/captcha/recaptcha/recaptcha/recaptchalib.php');

$recipientName = 'Sam Edge';
$recipientEmail = 'sam.edge@auraaccess.com.au';
$privateKey = '6LfE_vQSAAAAAHr_aoWQs_vhNwgLv8fPqWFvJcMX';

$senderName = $_GET['name'];
$senderEmail = $_GET['email'];
$senderMessage = $_GET['message'];
$challenge = $_GET['recaptcha_challenge_field'];
$response = $_GET['recaptcha_response_field'];

// Check the recaptcha challenge was correct
$resp = recaptcha_check_answer($privateKey,
                               $_SERVER['REMOTE_ADDR'],
                               $challenge,
                               $response);

session_start();

if (!$resp->is_valid) {
    $_SESSION['name'] = $_GET['name'];
    $_SESSION['email'] = $_GET['email'];
    $_SESSION['message'] = $_GET['message'];
    $_SESSION['success'] = false;
    $_SESSION['bad_recaptcha'] = true;
    header('Location: contact');
} else {
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
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
        $_SESSION['name'] = $_GET['name'];
        $_SESSION['email'] = $_GET['email'];
        $_SESSION['message'] = $_GET['message'];
        $_SESSION['success'] = false;
        $_SESSION['bad_recaptcha'] = false;
        header('Location: contact');
    } else {
        $_SESSION['name'] = "";
        $_SESSION['email'] = "";
        $_SESSION['message'] = "";
        $_SESSION['success'] = true;
        $_SESSION['bad_recaptcha'] = false;
        header('Location: contact');
    }
}
