<?php

require_once "./app/controllers/Profile.php";
class Login extends Controller
{
    public function show()
    {
        $this->view('login');
    }

    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = $this->model('UserModel');
            $user = $userModel->getUserByEmail($email);
            if ($user) {
                if (isset($user['RoleID']) && $user['RoleID'] === "2") {
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start(); // Khởi động session nếu chưa bắt đầu
                    }
                    $_SESSION['user'] = $user; // Lưu thông tin người dùng
                    $_SESSION['user_id'] = $user['UserID']; // Lưu ID người dùng

                    $profileController = new Profile();
                    $profileController->show();

                } else {
                    echo "Bạn không có quyền truy cập vào trang này.";
                }
            } else {
                echo "Email không tồn tại.";
            }
        }
    }
}
