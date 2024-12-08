
<?php 
    class UserModel extends DB {

        public function CheckSignUp() {
            $sql = "SELECT Email FROM user";
            return mysqli_query($this->con, $sql);
        }
        public function InsertNewUser($fullName, $email, $password) {
            $qr = "INSERT INTO user VALUES (NULL, '$fullName', '$email', '$password', NULL, NULL, NULL, NULL, NULL, '3')";
            $result = false;
            if (mysqli_query($this->con, $qr)) {
                $result = true;
            }
            return json_encode($result);
        }

        public function GetUserInforLogIn($email) {
            $sql = "SELECT * FROM user WHERE Email = '$email'";
            return mysqli_query($this->con, $sql);
        }

        public function getUserInfor($userId){
            $sql = "SELECT * FROM user WHERE UserID = '$userId'";
            return mysqli_query($this->con, $sql);
        }

        public function UpdateUserInfor($fullName, $gender, $birth, $address, $userID) {
            $sql = "UPDATE user
                    SET FullName = '$fullName', Gender = '$gender', DOB = '$birth', Address = '$address'
                    WHERE UserID = $userID;";
            return mysqli_query($this->con, $sql);
        }

        public function UpdateUserPassword($newPassword, $userID) {
            $sql = "UPDATE user
                    SET Password = '$newPassword'
                    WHERE UserID = '$userID'";
            return mysqli_query($this->con, $sql);
        }

        public function UpdateUserImage($imagepath, $userID) {
            $sql = "UPDATE user
                    SET Image = '$imagepath'
                    WHERE UserID = '$userID'";
            return mysqli_query($this->con, $sql);
        }

        public function getUserInforforAdmin() {
            $sql = "SELECT 
                    *, 
                    CASE 
                        WHEN RoleID = 1 THEN 'Admin'
                        WHEN RoleID = 2 THEN 'Doctor'
                        WHEN RoleID = 3 THEN 'Patient'
                        ELSE 'Không xác định'
                    END AS Role
                FROM user";
            return mysqli_query($this->con, $sql);
        }

        public function InsertNewDoctor($fullName, $email, $password, $birth, $gender, $phoneNumber, $address) {
            $sql = "INSERT INTO user VALUES (NULL, '$fullName', '$email', '$password', NULL, '$birth', '$gender', '$phoneNumber', '$address', '2')";
            $result = mysqli_query($this->con, $sql);
        }

    }
?>
