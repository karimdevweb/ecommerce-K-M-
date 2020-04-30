<?php
/**
 * This example shows sending a message using PHP's mail() function.
 * https://github.com/PHPMailer/PHPMailer/wiki/Using-Gmail-with-XOAUTH2
 */

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


 class OurMailer
 {
     public function sendMail($subject,$sendTo,$sendFrom,$content)
     {
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        
        try {
            //Server settings
            $mail->SMTPDebug = '';                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true; // Enable SMTP authentication $clientId = '1076189070089-h9706b8pmkicvnsmd75aa82ng3e7equq.apps.googleusercontent.com';
            $mail->Username   ="karimdevweb@gmail.com" ;                     // SMTP username
            $mail->Password   = "karimdev01!";                             // SMTP password : gmail API : secret code :M5uaIgm_EPJcUUSejM7UkbTU
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to
        
            //Recipients
            $mail->setFrom($sendFrom, 'administration');
            $mail->addAddress($sendTo, 'Joe User');     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            ///$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
           // $mail->addBCC('bcc@example.com');
        
            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment($attachement, 'OurNewsLetter.thanks');    // Optional name
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $content;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            //echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    
    }
    



}