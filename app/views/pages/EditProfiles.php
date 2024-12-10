<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashborard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/PHP_CLINIC/Clinic-Booking/public/css/EditProfile.css">
</head>

<body>
    <div class="contain">
        <div id="nav-bar">
            <div class="nav-logo">
                <img id="logo" src="/public/images/logo.png" alt="">
                <button class="menu-bar"><i class="fa-solid fa-bars icon-menubar"></i></button>
            </div>
            <div class="nav-menu">
                <div class="nav-item">
                    <i class="fas fa fa-digital-tachograph nav-item-icon"></i>
                    <a href="../pages/Profile.php">Dashboard</a>
                </div>
                <div class="nav-item">
                    <i class="fas fa-calendar-alt nav-item-icon"></i>
                    <a href="../pages/Appointment.php">Appointments</a>
                </div>
                <div class="nav-item">
                    <i class="fas fa-money-bill-wave nav-item-icon"></i>
                    <a href="#">Transactions</a>
                </div>
                <div class="nav-item">
                    <i class="fas fa-calendar nav-item-icon"></i>
                    <a href="#">My schedule</a>
                </div>
            </div>
        </div>
        <div class="content">

            <div class="header">
                <div class="dashboard">Dashboard</div>
                <div class="infor">
                    <div class="notice">
                        <i class="fa-solid fa-bell icon-notice"></i>
                        <div class="number-notice">2</div>
                    </div>
                    <img src="/public/images/doctors/Andy.jpg" alt="">
                    <p>Doctor</p>
                </div>
            </div>

            <div class="profile">
                <div class="info-profile-doctor">
                    <p>Profile</p>
                    <img src="/public/images/doctors/Andy.jpg" alt="">
                </div>
                <div class="info-profile-doctor">
                    <p>Full Name:*</p>
                    <input type="text" name="name" readonly>
                </div>
                <div class="info-profile-doctor">
                    <p>Email:*</p>
                    <input type="email" name="email" readonly>
                </div>
                <div class="info-profile-doctor">
                    <p>Phone number:*</p>
                    <input type="email" name="phone" readonly>
                </div>
                <button type="submit" class="btn-save" name="save">Save</button>
            </div>

        </div>
    </div>
    <script>
        const menuBar = document.querySelector('.menu-bar');
        const navBar = document.getElementById('nav-bar');
        const logo = document.getElementById('logo');
        menuBar.addEventListener('click', () => {
            navBar.classList.toggle('collapsed');
            logo.classList.toggle('collapsed');
        })
    </script>
</body>

</html>