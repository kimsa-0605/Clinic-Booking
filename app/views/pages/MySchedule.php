<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashborard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/public/css/MySchedule.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
                    <a href="./Profile.php">Profile</a>
                </div>
                <div class="nav-item">
                    <i class="fas fa-calendar-alt nav-item-icon"></i>
                    <a href="./AddAppointment.php">Appointments</a>
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
                <div class="dashboard">My Schedule </div>
                <div class="infor">
                    <div class="notice">
                        <i class="fa-solid fa-bell icon-notice"></i>
                        <div class="number-notice">2</div>
                    </div>
                    <img src="/public/images/doctors/Andy.jpg" alt="">
                    <p>Doctor</p>
                </div>
            </div>

            <div class="content-schedule">
                <div class="my-chedule">
                    <div class="date">
                        <div>Filter date</div>
                        <input type="date">
                    </div>
                    <div class="schedule-detail">
                        <div class="schedule-detail-time">10:00 AM </div>
                        <div class="schedule-detail-time">10:00 AM </div>
                        <div class="schedule-detail-time">10:00 AM </div>
                        <div class="schedule-detail-time">10:00 AM </div>
                        <div class="schedule-detail-time">10:00 AM </div>
                        <div class="schedule-detail-time">10:00 AM </div>
                        <div class="schedule-detail-time">10:00 AM </div>
                        <div class="schedule-detail-time">10:00 AM </div>
                        <div class="schedule-detail-time">10:00 AM </div>
                        <div class="schedule-detail-time">10:00 AM </div>
                        <div class="schedule-detail-time">10:00 AM </div>
                        <div class="schedule-detail-time">10:00 AM </div>
                        <div class="schedule-detail-time">10:00 AM </div>
                        <div class="schedule-detail-time">10:00 AM </div>
                        <div class="schedule-detail-time">10:00 AM </div>
                        <div class="schedule-detail-time">10:00 AM </div>
                    </div>
                </div>
            </div>
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