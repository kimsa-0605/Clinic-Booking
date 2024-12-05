<?php

class Profile extends Controller
{
    public function show()
    {
        // Kiểm tra session đã được khởi động hay chưa
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Khởi động session nếu chưa bắt đầu
        }

        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!isset($_SESSION['user'])) {
            header('Location: ./app/controllers/Login.php'); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
            exit();
        }

        // Lấy thông tin người dùng từ session
        $doctor = $_SESSION['user'];
        // var_dump($doctor);
        // Hiển thị view và truyền thông tin bác sĩ
        $this->view('DoctorLayout', [
            'Page' => 'Profile',
            'Doctor' => $doctor // Truyền thông tin bác sĩ vào view
        ]);
    }
}
