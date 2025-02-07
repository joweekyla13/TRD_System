<?php
include('send_mail.php');

$sendmail = new SENDMAIL();
$from = 'bariringpaulgabrielle17@gmail.com';         // Replace with the actual sender email
$fromName = 'ProjectBase1';                  // Replace with the actual sender name
$recipient = 'joweekylamaramag@gmail.com'; // Replace with the actual recipient email
$subject = 'Test Email';                  // Email subject

echo $sendmail->email_with_no_attachment($from, $fromName, $recipient, $subject);
?>
