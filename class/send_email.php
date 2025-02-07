<?php
require_once("../libraries/PHPMailer_SMTP/PHPMailerAutoload.php");


class SENDMAIL_TR {
    function set_smtp_parameters() {
        $smtp_parameters = array();
        $smtp_parameters['host'] = '192.168.3.244';
        $smtp_parameters['encryption'] = 'ssl';
        $smtp_parameters['username'] = 'issinfoservice@pricon.ph';
        $smtp_parameters['password'] = 'EYGEKFwlzuDfNufG2DGk';
        $smtp_parameters['port'] = '465';

        return $smtp_parameters;
    }
    
    // function email_with_no_attachment($from, $fromName, $recipient, $subject) {
	function email_with_no_attachment($from, $recipient, $subject) {
		$mail = new PHPMailer_TR();
		
		$smtp_parameters = $this->set_smtp_parameters();
		$mail->IsSMTP();
		$mail->Host       = $smtp_parameters['host'];
		$mail->SMTPAuth   = true;
		$mail->SMTPSecure = $smtp_parameters['encryption'];
		$mail->Username   = $smtp_parameters['username'];
		$mail->Password   = $smtp_parameters['password'];
		$mail->Port       = $smtp_parameters['port'];  
		
		$mail->From       = $from;
		$mail->AddAddress($recipient);
		$mail->IsHTML(true);
		$mail->Subject    = $subject;
		
		// Include the message body from tr_mail_body.php
		ob_start();
		include('tr_mail_body.php');
		$body = ob_get_clean();
		
		if (!$body) {
			return "Failed to generate email body.";
		}
		$mail->Body = $body;
	
		if (!$mail->Send()) {
			return "Mailer Error: " . $mail->ErrorInfo;
		}
		return "Email sent!";
	}
		
}
?>
