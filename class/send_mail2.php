<?php

require_once("../libraries/PHPMailer_SMTP/PHPMailerAutoload.php");

class SENDMAIL {
    function set_smtp_parameters() {
        $smtp_parameters = array();
        $smtp_parameters['host'] = '192.168.3.244';
        $smtp_parameters['encryption'] = 'ssl';
        $smtp_parameters['username'] = 'issinfoservice@pricon.ph';
        $smtp_parameters['password'] = 'EYGEKFwlzuDfNufG2DGk';
        $smtp_parameters['port'] = '465';

        return $smtp_parameters;
    }

    function email_with_no_attachment($from, $recipient, $subject, $message_body, $cc = null, $fromName = 'Default Sender') {
        $mail = new PHPMailer();
        
        $smtp_parameters = $this->set_smtp_parameters();
        $mail->IsSMTP();
        $mail->Host       = $smtp_parameters['host'];
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = $smtp_parameters['encryption'];
        $mail->Username   = $smtp_parameters['username'];
        $mail->Password   = $smtp_parameters['password'];
        $mail->Port       = $smtp_parameters['port'];  

        // Set sender's email and name
        $mail->From       = $from;
        $mail->FromName   = $fromName; // Dynamic sender's name

        // Add recipients for 'To' (recipient)
        if (is_array($recipient)) {
            foreach ($recipient as $email) {
                $mail->AddAddress($email);
            }
        } else {
            $mail->AddAddress($recipient); // In case only one recipient is passed
        }

        // Add CC recipients if provided
        if ($cc) {
            if (is_array($cc)) {
                foreach ($cc as $cc_email) {
                    $mail->AddCC($cc_email);
                }
            } else {
                $mail->AddCC($cc);
            }
        }

        $mail->IsHTML(true);
        $mail->Subject    = $subject;
        
        // Set the email body directly
        $mail->Body = $message_body;

        // Send the email and return the status
        return $mail->Send() ? "Email sent!" : "Mailer Error: " . $mail->ErrorInfo;
    }
}



    // jowee 1
    // function email_with_no_attachment($from, $recipient, $subject, $message_body, $cc = []) {
    //     $mail = new PHPMailer();
        
    //     $smtp_parameters = $this->set_smtp_parameters();
    //     $mail->IsSMTP();
    //     $mail->Host       = $smtp_parameters['host'];
    //     $mail->SMTPAuth   = true;
    //     $mail->SMTPSecure = $smtp_parameters['encryption'];
    //     $mail->Username   = $smtp_parameters['username'];
    //     $mail->Password   = $smtp_parameters['password'];
    //     $mail->Port       = $smtp_parameters['port'];  
    
    //     $mail->From       = $from;
    //     $mail->AddAddress($recipient);
    
    //     // Add CC recipients
    //     if (!empty($cc)) {
    //         foreach ($cc as $cc_email) {
    //             $mail->addCC($cc_email);
    //         }
    //     }
    
    //     $mail->IsHTML(true);
    //     $mail->Subject    = $subject;
    //     $mail->Body       = $message_body;
    
    //     return $mail->Send() ? "Email sent!" : "Mailer Error: " . $mail->ErrorInfo;
    // }    

    // jowee 2
    // function email_with_no_attachment($from, $recipient, $subject, $message_body, $cc = []) {
    //     $mail = new PHPMailer();
    
    //     $smtp_parameters = $this->set_smtp_parameters();
    //     $mail->IsSMTP();
    //     $mail->Host       = $smtp_parameters['host'];
    //     $mail->SMTPAuth   = true;
    //     $mail->SMTPSecure = $smtp_parameters['encryption'];
    //     $mail->Username   = $smtp_parameters['username'];
    //     $mail->Password   = $smtp_parameters['password'];
    //     $mail->Port       = $smtp_parameters['port'];  
    
    //     $mail->From       = $from;
    //     $mail->AddAddress($recipient);
    
    //     // Add CC recipients
    //     if (!empty($cc)) {
    //         foreach ($cc as $cc_email) {
    //             $mail->addCC($cc_email);
    //         }
    //     }
    
    //     $mail->IsHTML(true);
    //     $mail->Subject    = $subject;
    //     $mail->Body       = $message_body;
    
    //     return $mail->Send() ? "Email sent!" : "Mailer Error: " . $mail->ErrorInfo;
    // }  
