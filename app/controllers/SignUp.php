<?php
require_once __DIR__ . '/../libs/SendEmailSignUp.php'; 
class SignUp extends Controller {
    public $UserModel;
    function __construct() {
        $this->UserModel = $this->model("UserModel");
    }

    function show() {
        $this->view("SignUp", []); // Load view
    }

    function UserSignUp() {
        if (isset($_POST["signUpButton"])) {
            $fullName = trim($_POST["fullName"]);
            $email = trim($_POST["email"]);
            $password = trim($_POST["password"]);
            $confirmPassword = trim($_POST["confirmPassword"]);
    
            if ($password === $confirmPassword) {
                $emailCheck = false;
                $result = $this->UserModel->CheckSignUp();
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['Email'] === $email) {
                        $emailCheck = true;
                        break;
                    }
                }
    
                if (!$emailCheck) {
                    $this->UserModel->InsertNewUser($fullName, $email, $password);

                    // Gửi email chào mừng
                    $sendEmail = new SendEmailSignUp();
                    $sendEmail->SendEmail($email, $fullName);

                    // Gửi thông báo thành công
                    $this->view("SignUp", [
                        "success" => true,
                        "message" => "Registration Successful!",
                        "page" => "SignIn" // Đường dẫn chuyển hướng
                    ]);
                    return;
                } else {
                    // Email đã tồn tại
                    $this->view("SignUp", [
                        "success" => false,
                        "message" => "Email already exists. Please try again."
                    ]);
                    return;
                }
            } else {
                // Mật khẩu không khớp
                $this->view("SignUp", [
                    "success" => false,
                    "message" => "The confirmation password does not match. Please try again."
                ]);
                return;
            }
        }
    }
}
