<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/src/SMTP.php';

    class SendEmailSignUp {
        function __construct() {}

        function SendEmail($email, $fullName) {
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'holykimsa05@gmail.com'; // email của bạn
                $mail->Password = 'ocfo jdqr ujsu wzqs'; // mật khẩu ứng dụng
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587; // Port cho STARTTLS
                
                $mail->setFrom('holykimsa05@gmail.com', 'ExtraClinic'); // email người gửi
                $mail->addAddress($email); // email người nhận

                $mail->isHTML(true);
                $mail->Subject = "[Confirm register from ExtraClinic]";
                $mail->Body = "
                    <!DOCTYPE html>
                    <html lang='en'>
                    <head>
                        <meta charset='UTF-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <title>Welcome to ExtraClinic</title>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                color: #333;
                                background-color: #f4f4f4;
                                padding: 20px;
                            }
                            .email-content {
                                background-color: #ffffff;
                                border-radius: 8px;
                                padding: 20px;
                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                margin: 0 auto;
                                width: 80%;
                                max-width: 600px;
                            }
                            .email-header {
                                text-align: center;
                                font-size: 28px;
                                font-weight: bold;
                                color: #1d2d5e; /* Màu xanh đậm cho tiêu đề */
                            }

                            .email-header span {
                                color: #0cb8b6; /* Màu xanh lá mạ cho tên người dùng */
                            }

                            .highlight {
                                color: #1d2d5e; /* Màu xanh lá mạ cho tên người dùng */
                                font-weight: bold;
                            }
                            .email-body {
                                font-size: 16px;
                                line-height: 1.6;
                                color: #333;
                            }
                            .email-footer {
                                text-align: center;
                                font-size: 14px;
                                color: #777;
                                margin-top: 20px;
                            }
                        </style>
                    </head>
                    <body>
                        <div class='email-content'>
                            <p class='email-header'>Welcome to <span>ExtraClinic</span>, $fullName!</p>
                            <div class='email-body'>
                                <p>Hi <span class='highlight'>$fullName</span>,</p>
                                <p>Thank you for registering an account on ExtraClinic using this email address.</p>
                                <p>If you have any questions or need further assistance, feel free to contact us.</p>
                                <p>Best wishes,</p>
                                <p>The ExtraClinic Team</p>
                            </div>
                            <div class='email-footer'>
                                <p>&copy; 2024 ExtraClinic. All rights reserved.</p>
                            </div>
                        </div>
                    </body>
                    </html>
                ";

                $mail->send(); // Gửi email
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
?>
