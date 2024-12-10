<?php
require_once './app/controllers/ProfileDoctor.php'; // Đảm bảo đường dẫn chính xác
require_once __DIR__ . '/../libs/SendEmailForDoctor.php';
require_once 'app/controllers/LogOut.php'; 
class Admin extends Controller
{
    public $UserModel;
    public $DoctorModel;

    function __construct()
    {
        $this->UserModel = $this->model("UserModel");
        $this->DoctorModel = $this->model("DoctorModel");
    }

    function show()
    {
        $this->userManagement();
    }

    function appointmentSchedule() {

    }

    function userManagement() {
        $Uselist = $this->UserModel->getUserInforforAdmin();
        $userArr = [];
        while ($UserListResult = mysqli_fetch_assoc($Uselist)) {
            $userArr[] = $UserListResult;
        };
        $this->view("Admin", [
            "Page" => "UserManagement",
            "user" => $userArr
        ]); 
    }

    function doctorManagement() {
        $Uselist = $this->DoctorModel->getDoctorInforforAdmin();
        $doctorArr = [];
        while ($UserListResult = mysqli_fetch_assoc($Uselist)) {
            $doctorArr[] = $UserListResult;
        };
        $this->view("Admin", [
            "Page" => "DoctorManagement" ,
            "doctor" => $doctorArr
        ]);    
    }

    function addDoctor() {
            $specialist = $this->DoctorModel->getAllSpecialtiesAdmin();
            $specialistArr = [];
            while ($specialistResult = mysqli_fetch_assoc($specialist)) {
                $specialistArr[] = $specialistResult;
            };
            $this->view("addDoctorAdmin", [
                "specialist" =>  $specialistArr,
            ]); 

        if (isset($_POST['addDoctorButton'])) {
            $fullName = $_POST["fullName"];
            $gender = $_POST["gender"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $birth = $_POST["birth"];
            $phoneNumber = $_POST["phoneNumber"];
            $address = $_POST["address"];
            $specialtyID = $_POST["specialty"];
            $fees = $_POST["fees"];


            $Uselist = $this->UserModel->getUserInforforAdmin();
            $checkInfor = false;
            while ($row = mysqli_fetch_assoc($Uselist)) {
                if ($row['Email'] == $email && $row['PhoneNumber'] == $phoneNumber) {
                    $checkInfor = true;
                    break;
                }
            }

            if ($checkInfor == false){
                $this->UserModel->InsertNewDoctor($fullName, $email, $password, $birth, $gender, $phoneNumber, $address);
                $result = $this->UserModel->GetUserInforLogIn($email);
                $row = mysqli_fetch_assoc($result);
                $userID =  $row['UserID'];
                $this->DoctorModel->insertDoctor($specialtyID, $fees, $userID);
                // Gửi email chào mừng
                $sendEmail = new SendEmailForDoctor();
                $sendEmail->SendEmail($email, $fullName, $password);
                $this->view("addDoctorAdmin", [
                    "success" => true,
                    "message" => "Doctor added successfully",
                    "page" => "DoctorManagement"
                ]);
                return;
            }
            else {
                $this->view("addDoctorAdmin", [
                    "success" => false,
                    "message" => "Email or phone number already exists, please use a different email or phone number."
                ]);
                return;
            }

        }
    }

    function logOutAdmin() {
        $isLogOut = new LogOut();
        $isLogOut->LogOutAccount();
        if ( $isLogOut) {
            $this->view('master', [
                'Page' => 'MyAccount',
            ]); 
        }
        else {
            $this->userManagement();
        }
    }

    
}
