<?php
require_once './app/controllers/ProfileDoctor.php'; // Đảm bảo đường dẫn chính xác

class SignIn extends Controller
{
    public $UserModel;

    function __construct()
    {
        $this->UserModel = $this->model("UserModel");
    }

    function show()
    {
        $this->view("SignIn", []); // Hiển thị trang đăng nhập
    }

    function userLogIn()
    {
        if (isset($_POST['signInButton'])) {
            $email = trim($_POST["email"]);
            $password = trim($_POST["password"]);
            $result = $this->UserModel->GetUserInforLogIn($email);
            $row = mysqli_fetch_assoc($result);

            // Kiểm tra thông tin người dùng
            if ($row) {
                // Kiểm tra mật khẩu
                if ($row['Password'] == $password) {
                    $_SESSION['id-user'] = $row['UserID'];
                    $_SESSION['LogIn-time'] = time();
                    $_SESSION['user'] = $row; // Lưu thông tin người dùng vào session

                    // Chuyển hướng dựa trên RoleID
                    switch ($row['RoleID']) {
                        case 3: // RoleID: User
                            $this->view("SignIn", [
                                "success" => true,
                                "message" => "LogIn Successful!",
                                "page" => "Profile"
                            ]);
                            break;

                        case 2: // RoleID: Doctor
                            $profileController = new ProfileDoctor();
                            $profileController->show(); // Chuyển hướng đến trang ProfileDoctor
                            break;

                        default: // RoleID: Admin hoặc các vai trò khác
                            $this->view("SignIn", [
                                "success" => true,
                                "message" => "LogIn Successful!",
                                "page" => "Admin"
                            ]);
                            break;
                    }
                } else {
                    $this->view("SignIn", [
                        "success" => false,
                        "message" => "Incorrect password. Please try again."
                    ]);
                }
            } else {
                $this->view("SignIn", [
                    "success" => false,
                    "message" => "User not found."
                ]);
            }
        }
    }
}
