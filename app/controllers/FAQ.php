<?php
require_once __DIR__ . '/../libs/FAQSendEmail.php'; 
class FAQ extends Controller {

    function SayHi() {
            $this->view("FAQ",[]); // view
    }

    function SendFAQEmail() {
        if (isset($_POST["sendMessage"])) {
            $name =$_POST["name"];
            $email =$_POST["email"];
            $message =$_POST["message"];

            // Gửi email chào mừng
            $sendEmail = new FAQSendEmail();
            $sendEmail->SendEmail($email, $name, $message);
            $this->view("FAQ",[
                "success" => true,
                "message" => "Email sent successfully",
                "page" => "FAQ"
            ]);
        }
    }
}