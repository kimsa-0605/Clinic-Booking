<?php 


    class DoctorLayout extends Controller{
        public $AppoinmentModel;
        function __construct()
        {
            $this->AppoinmentModel = $this->model('AppointmentModel');;
        }

        function show(){
            $this->ProfileDoctor();
        }

        function ProfileDoctor(){
            if (session_status() === PHP_SESSION_NONE) {
                session_start(); // Khởi động session nếu chưa bắt đầu
            }

            // Kiểm tra xem người dùng đã đăng nhập chưa
            if (!isset($_SESSION['user'])) {
                header('Location: ./app/controllers/SignIn.php'); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
                exit();
            }

        // Lấy thông tin người dùng từ session
            $doctor = $_SESSION['user'];
            $this->view('DoctorLayout',[
                'Page'=> 'ProfileDoctor',
                'Doctor' => $doctor
            ]);
        }

        function Appointment(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Khởi động session nếu chưa bắt đầu
        }

        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!isset($_SESSION['user'])) {
            header('Location: ./app/controllers/SignIn.php'); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
            exit();
        }

        // Lấy thông tin người dùng từ session
        $doctor = $_SESSION['user'];

        // Kiểm tra 
        $doctorId = $doctor['UserID'];
        $patients = $this->AppoinmentModel->getPatientsAppointment($doctorId);

        $this->view('DoctorLayout', [
            'Page' => 'Appointment',
            'Patients' => $patients
        ]);
        }
        function MySchedule(){
            $timeTypes = $this->AppoinmentModel->getAllTime();
            $this->view('DoctorLayout',[
                'Page'=> 'MySchedule',
                'TimeType'=> $timeTypes
            ]);
        }


        function AddAppointment(){
            if (session_status() === PHP_SESSION_NONE) {
                session_start(); // Khởi động session nếu chưa bắt đầu
            }
            if (!isset($_SESSION['user'])) {
                header('Location: ./app/controllers/SignIn.php'); // Chuyển hướng nếu chưa đăng nhập
                exit();
            }
            $doctor = $_SESSION['user'];
            $doctorId = $doctor['UserID'];
            $timeTypes = $this->AppoinmentModel->getAllTime();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy dữ liệu từ form
                $patientName = $_POST['name-patient'];
                $appointmentDate = $_POST['date'];
                $timeType = $_POST['time_type']; // Lấy TimeType từ form
                var_dump($timeType);

                if ($this->AppoinmentModel->createAppointment($doctorId, $patientName, $appointmentDate, $timeType)) {
                    header('Location: ./app/controllers/DoctorLayout.php?method=Appointment');
                    exit();
                } else {
                    echo "Error in scheduling appointment.";
                }
            }
            $this->view('DoctorLayout',[
                'Page' => 'AddAppointment',
                'TimeType' => $timeTypes

            ]);
        }
    }