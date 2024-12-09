<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require 'vendor/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/src/SMTP.php';

    class FAQSendEmail {
        function __construct() {}
        function SendEmail( $name, $message) {
            $subject_encoded = urlencode("FAQ FROM USER - NAME: $name");
            $message_encoded = urlencode($message);

            // Tạo URL cho Gmail
            $url = "https://mail.google.com/mail/u/0/?fs=1&to=holykimsa05@gmail.com&su=$subject_encoded&body=$message_encoded&tf=cm";

            // Chuyển hướng người dùng đến URL
            header("Location: $url");
            exit(); 
        }               
    }
?>
