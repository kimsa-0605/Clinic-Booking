<?php
require_once __DIR__ . '/../libs/UserSendEmail.php'; 
class ContactUs extends Controller {

    function SayHi() {
            $this->view("ContactUs",[]); // view
    }

    function sendContactUs() {
        if (isset($_POST["sendMessage"])) {
            $name =$_POST["name"];
            $email =$_POST["email"];
            $subject =$_POST["subject"];
            $message =$_POST["message"];

            // Gửi email chào mừng
            $sendEmail = new UserSendEmail();
            $sendEmail->SendEmail($email, $name, $message, $subject);
            $this->view("ContactUs",[
                "success" => true,
                "message" => "Email sent successfully",
                "page" => "ContactUs"
            ]);
        }
    }
}