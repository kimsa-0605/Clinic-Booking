<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/Clinic-Booking/">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="public/css/DoctorLayout.css"> <!-- Đảm bảo đường dẫn đúng -->
</head>

<body>
    <div class="contain">
        <div id="nav-bar">
            <div class="nav-logo">
                <img id="logo" src="public/images/logo.png" alt="">
                <button class="menu-bar"><i class="fa-solid fa-bars icon-menubar"></i></button>
            </div>
            <div class="nav-menu">
                <div class="nav-item">
                    <i class="fas fa fa-digital-tachograph nav-item-icon"></i>
                    <a href="./DoctorLayout/ProfileDoctor">Profile</a> <!-- Sử dụng query string để điều hướng -->
                </div>
                <div class="nav-item">
                    <i class="fas fa-calendar-alt nav-item-icon"></i>
                    <a href="./DoctorLayout/Appointment">Appointments</a> <!-- Sử dụng query string để điều hướng -->
                </div>
                <div class="nav-item">
                    <i class="fas fa-money-bill-wave nav-item-icon"></i>
                    <a href="#">Transactions</a>
                </div>
                <div class="nav-item">
                    <i class="fas fa-calendar nav-item-icon"></i>
                    <a href="./DoctorLayout/MySchedule">My Schedule</a> <!-- Sử dụng query string để điều hướng -->
                </div>
            </div>
        </div>
        <div class="content">

            <?php
            require_once './app/views/pages/' . $data['Page'] . '.php';
            ?>

        </div>
    </div>
    <script>
        const menuBar = document.querySelector('.menu-bar');
        const navBar = document.getElementById('nav-bar');
        const logo = document.getElementById('logo');
        menuBar.addEventListener('click', () => {
            navBar.classList.toggle('collapsed');
            logo.classList.toggle('collapsed');
        });
    </script>
</body>

</html>