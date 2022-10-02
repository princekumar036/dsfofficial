<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mailer/Exception.php';
require 'mailer/PHPMailer.php';
require 'mailer/SMTP.php';

// Sendmail
function sendMail($to, $subject, $html){
    $mail = new PHPMailer;
    try {
        //Server settings
        $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );

        // $mail->SMTPDebug = 2;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.dsfofficial.org';                     //Set the SMTP server to send through
        $mail->Port       = 587;      
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'info@dsfofficial.org';                     //SMTP username
        $mail->Password   = 'luxemburg1919';                               //SMTP password

        //Recipients
        $mail->setFrom('info@dsfofficial.org', 'Democratic Student\'s Federation');
        $addresses = explode(',', $to);
        foreach ($addresses as $address) {
            $mail->AddAddress($address);
        }
        $mail->addReplyTo('info@dsfofficial.org', 'Democratic Student\'s Federation');

        //Content
        $mail->Subject = $subject;
        $mail->msgHTML($html);

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>