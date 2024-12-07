<?php


require_once 'app/controllers/MiddleWare.php';
class Profile extends Controller {
    public $AppointmentBookingModel;
    public $UserModel;
    function __construct() {
        $this->AppointmentBookingModel = $this->model("AppointmentBookingModel");
        $this->UserModel = $this->model("UserModel");
    }

    function show() {
        $isLogIn = MiddleWare::isSignedIn();
        if (!$isLogIn) {
            $this->view('master', [
                'Page' => 'MyAccount',
            ]); 
        }
        else {
            $this->Overview();
        } 
    }

    function Overview() {
        $userID = $_SESSION['id-user'];
        // upcomingSchedule
        $upComingSchedule = $this->AppointmentBookingModel->getUpcomingSchedule($userID)->fetch_assoc();
        if (!empty($upComingSchedule)) {
            $upComingScheduleResult = $upComingSchedule;
        }
        else {
            $upComingScheduleResult =$upComingScheduleResult = [
                "ScheduleDate" => "---",
                "TimeType" => "---",
                "DoctorName" => "---",
                "Specilist" => "---"
            ];
        }
        // user profile
        $userInfor = $this->UserModel->getUserInfor($userID)->fetch_assoc();
        // Cập nhật hình ảnh
        if ($userInfor['Image'] == null || $userInfor['Image'] == ''){
            $image = "public/images/uploads/defaultAvatar.jpg";
        }else {
            $image = "public/images/uploads/" . $userInfor['Image'];
        }

        //Lịch gần đây
        $recentAppointments = [];
        $appointmentsResult = $this->AppointmentBookingModel->getRecentAppointments($userID);
        while ($appointment = $appointmentsResult->fetch_assoc()) {
                $recentAppointments[] = $appointment;
            }
        
        $this->view('master', [
                'Page' => 'Profile',
                "userInfor" => $userInfor,
                "upComingSchedule" =>  $upComingScheduleResult,
                'recentAppointments' => $recentAppointments,
                'avatarImage' => $image,
        ]);
    }

    public function BookedAppointments() {
        $userID = $_SESSION['id-user'];
        // Lấy danh sách cuộc hẹn đã đặt với phân trang
        $appointments = [];
        $appointmentsResult = $this->AppointmentBookingModel->getAppointments($userID);
        while ($appointment = $appointmentsResult->fetch_assoc()) {
            $appointments[] = $appointment;
        }
        // Truyền dữ liệu vào view
        $this->view('master', [
            'Page' => 'BookedAppointments',
            'appointments' => $appointments,
        ]);
    }

    function MedicalHistory() {
        $userID = $_SESSION['id-user'];
        $appointments = [];
        $appointmentsResult = $this->AppointmentBookingModel->getAppointments($userID);
        while ($appointment = $appointmentsResult->fetch_assoc()) {
            if ($appointment['AppointmentStatus'] == 'Examined') {
                $appointments[] = $appointment;
            }
        }
        // Truyền dữ liệu vào view
        $this->view('master', [
            'Page' => 'MedicalHistory',
            'appointments' => $appointments,
        ]);
    }

    function UpdateProfile() {
        $userID = $_SESSION['id-user'];
        $userInfor = $this->UserModel->getUserInfor($userID)->fetch_assoc();
        $message = null;
        $success = null;
        $POST = null;
    
        // chỉnh sửa thông tin
        if (isset($_POST['UpdateInfor'])) {
            $fullName = $_POST["fullName"];
            $gender = $_POST["gridRadios"];
            $birth = $_POST["birth"];
            $address = $_POST["address"];
            $POST = 'UpdateInfor';
    
            if ($this->UserModel->UpdateUserInfor($fullName, $gender, $birth, $address, $userID)) {
                $success = true;
                $message = "Update Successful!";
                header("Refresh:0");
            } else {
                $success = false;
                $message = "Update failed. Please try again!";
            }
        }

        // chỉnh sửa mật khẩu
        if (isset($_POST['UpdatePassword'])) {
            $currentPassword = $_POST["currentPassword"];
            $newPassword = $_POST["newPassword"];
            $confirmNewPassword = $_POST["confirmNewPassword"];
            $POST = 'UpdatePassword';

            $userPassword = $this->UserModel->getUserInfor($userID)->fetch_assoc();
            if ($userPassword['Password'] == $currentPassword && $newPassword == $confirmNewPassword) {
                $this->UserModel->UpdateUserPassword($newPassword, $userID);
                $success = true;
                $message = "Update password Successful!";
            } else {
                $success = false;
                $message = "Update password failed. Please try again!";
            }
        }

        // Cập nhật hình ảnh
        if (isset($_POST['submitChangeImage'])) {
            $imagepath = basename($_FILES["imageAvatar"]["name"]);
            // update vào database
            $this->UserModel->UpdateUserImage($imagepath, $userID);
            // upload file
            $target_dir = "./public/images/uploads/";
            $target_file = $target_dir . $imagepath;
            move_uploaded_file($_FILES["imageAvatar"]["tmp_name"], $target_file);
            header("Refresh:0");
        }

        // Hiển thị ảnh đại diện
            if ($userInfor['Image'] == null || $userInfor['Image'] == ''){
                $image = "public/images/uploads/defaultAvatar.jpg";
            }else {
                $image = "public/images/uploads/" . $userInfor['Image'];
            }

        $this->view('master', [
                'Page' => 'UpdateProfile',
                'userInforResult' => $userInfor,
                'success' => $success,
                'message' => $message,
                'POST' => $POST,
                'avatarImage' => $image,
            ]);
    }
}
