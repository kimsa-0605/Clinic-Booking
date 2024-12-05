<?php
class SignIn extends Controller {
    public $UserModel;
    function __construct() {
        $this->UserModel = $this->model("UserModel");
    }

    function show() {
        $this->view("SignIn",[]); // view
    }
    
    function userLogIn() {

        if (isset($_POST['signInButton'])) {
            $email = trim($_POST["email"]);
            $password = trim($_POST["password"]);
            $result = $this->UserModel->GetUserInforLogIn($email);
            $checkPassword = false;
            $row = mysqli_fetch_assoc( $result);
            if ($row['Password'] == $password) {
                $checkPassword = true;
            }
            else {
                $checkPassword = false;
                $this->view("SignIn", [
                    "success" => false,
                    "message" => "Incorrect password. Please try again."
                ]);
                return;
            }

            if ($checkPassword) {
                $_SESSION['id-user'] = $row['UserID'];
                $_SESSION['LogIn-time'] = time();
                if ($row['RoleID'] == 3) { // RoleID: User
                    $this->view("SignIn", [
                        "success" => true,
                        "message" => "LogIn Successful!",
                        "page" => "Profile" // Đường dẫn chuyển hướng
                    ]);
                    return;
                } 
                elseif ($row['RoleID'] == 2) {
                    $this->view("SignIn", [
                        "success" => true,
                        "message" => "LogIn Successful!",
                        "page" => "Doctor" // Đường dẫn chuyển hướng
                    ]);
                    return;
                }
                else {
                    $this->view("SignIn", [
                        "success" => true,
                        "message" => "LogIn Successful!",
                        "page" => "Admin" // Đường dẫn chuyển hướng
                    ]);
                    return;
                }
            }
        }
    }

}
