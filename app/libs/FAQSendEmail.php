<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require 'vendor/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/src/SMTP.php';

    class FAQSendEmail {
        function __construct() {}

        function SendEmail($email, $name, $message) {
        
            require "vendor/autoload.php";
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP host
            $mail->Port = 587; // Replace with your SMTP port
            $mail->SMTPAuth = true;
            $mail->Username = "holykimsa05@gmail.com";
            $mail->Password = "ocfo jdqr ujsu wzqs";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            $mail->CharSet = 'UTF-8';
            $mail->setFrom("holykimsa05@gmail.com", "ClinicExtra");
            $mail->addAddress("holykimsa05@gmail.com", "ClinicExtra");
            $mail->addReplyTo($email, $name);

            $mail->Subject = "FAQ FROM USER";
            $mail->Body = $message;

            $mail->send();
        }        
    }
?>
