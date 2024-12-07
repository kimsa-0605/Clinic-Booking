<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashborard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/public/css/AddApointment.css">
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
                    <a href="/app/views/pages/Doctors.php">Dashboard</a>
                </div>
                <div class="nav-item">
                    <i class="fas fa-calendar-alt nav-item-icon"></i>
                    <a href="/app/views/pages/Appointment.php">Appointments</a>
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
                <div class="dashboard">Appointment </div>
                <div class="infor">
                    <div class="notice">
                        <i class="fa-solid fa-bell icon-notice"></i>
                        <div class="number-notice">2</div>
                    </div>
                    <img src="/public/images/doctors/Andy.jpg" alt="">
                    <p>Doctor</p>
                </div>
            </div>

            <div class="content-add-appointment">
                <div class="infor-patient">
                    <div>Patient's full name </div>
                    <input type="text" name="name-patient">
                </div>
                <div class="date">
                    <div class="choose-date">Choose date</div>
                    <input type="date" name="date">
                </div>

                <div class="add-time">
                    <div class="time-detail">9: 30PM</div>
                    <div class="time-detail">9: 30PM</div>
                    <div class="time-detail">9: 30PM</div>
                    <div class="time-detail">9: 30PM</div>
                    <div class="time-detail">9: 30PM</div>
                    <div class="time-detail">9: 30PM</div>
                    <div class="time-detail">9: 30PM</div>
                    <div class="time-detail">9: 30PM</div>
                    <div class="time-detail">9: 30PM</div>                
                </div>
                <button class="btn-create">Create time</button>
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