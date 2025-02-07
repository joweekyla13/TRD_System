<?php
class email {
	function send_email($to, $from, $cc, $subject, $message) {
		$common_function = '../handler/common_function.php';
		if(file_exists($common_function)){
			require_once($common_function);
		}else{
			return "Common function not found";
		}
		$return 	= array();
		$mail_data  = array();
		$message .= "<br><br>
					 For more info, please log-in to your Rapid account. Go to http://rapid/ and Indirect Material Inventory under My Systems 
					 <br><br>Notice of Disclaimer:<br>
                     This message (including any attachments) contains confidential information intended for a specific individual and purpose, and is protected by law. If you are not the intended recipient, you should delete this message. Any disclosure,copying, or distribution of this message, or the taking of any action based on it, is strictly prohibited.";
		$mail_data  = array(
			"`to`"				=> $to,
			"cc"				=> $cc,
			"bcc"				=> 'jmgecolea@pricon.ph, crtanay@pricon.ph, cbsatosa@pricon.ph, mmmalabanan@pricon.ph',
			"`from`"			=> $from,
			"from_name"			=> 'IMI System',
			"subject"			=> $subject,
			"message"			=> $message,
			"send_date_time"	=> date('Y-m-d H:i:s'),
			"system_name"		=> 'IMI',
			"username"			=> $from
		);
		$mail_result = send_with_mailer($mail_data);
		$return['mail_result'] 		= $mail_result;
		$return['mail_data'] 		= $mail_data;
		return $return;
	}
		
}
?>