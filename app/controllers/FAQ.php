<?php
require_once __DIR__ . '/../libs/FAQSendEmail.php'; 
class FAQ extends Controller {

    function show() {
        $this->view('master', [
            'Page' => 'FAQ',
        ]);
    }

    function SendFAQEmail() {
        if (isset($_POST["sendMessage"])) {
            $name =$_POST["name"];
            $message =$_POST["message"];

            // Gửi email chào mừng
            $sendEmail = new FAQSendEmail();
            $sendEmail->SendEmail( $name, $message);
            $this->view('master', [
                'Page' => 'FAQ',
                "success" => true,
                "message" => "Email sent successfully",
                "page" => "FAQ"
            ]);
        }
    }
}