<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/Clinic-Booking/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="public/css/DoctorDashboard.css"> <!-- Đường dẫn đến CSS -->
</head>

<body>

    <div class="content">
        <div class="header">
            <div class="dashboard">Profile</div>
            <div class="infor">
                <div class="notice">
                    <i class="fa-solid fa-bell icon-notice"></i>
                    <div class="number-notice">2</div>
                </div>
                <img src="public/images/doctors/Andy.jpg" alt=""> <!-- Đường dẫn đến hình ảnh -->
                <p><?php echo htmlspecialchars($data['Doctor']['FullName']); ?></p>
            </div>
        </div>

        <div class="detail-doctor">
            <div class="profile-doctor">
                <div class="title">
                    <h3>Welcome back</h3>
                    <span>Profile</span>
                </div>
                <div class="infor-detail-doctor">
                    <div class="infor-doctor">
                        <img src="public/images/doctors/Andy.jpg" alt=""> <!-- Đường dẫn đến hình ảnh -->
                        <div class="infor-detail">
                            <div class="name-doctor"><?= htmlspecialchars($data['Doctor']['FullName']); ?></div>
                            <div class="email"><?= htmlspecialchars($data['Doctor']['Email']); ?></div>
                        </div>
                    </div>
                    <button class="action-edit-profile">
                        <a href="app/views/pages/EditProfiles.php">Edit Profile <i class="fa-solid fa-arrow-right"></i></a>
                    </button>
                </div>
            </div>
            <div class="appointments">
                <div class="total-appointment">
                    <div class="info-appointment">
                        <div class="title-appointment">Total Appointments</div>
                        <div class="number-appointment">23323</div>
                    </div>
                    <i class="fas fa-file-medical card-icon display-6 text-white icon-appoinment"></i>
                </div>
                <div class="today-appointment">
                    <div class="info-appointment">
                        <div class="title-appointment">Today Appointments</div>
                        <div class="number-appointment">0</div>
                    </div>
                    <i class="fas fa-calendar-alt card-icon display-6 text-white hospital-user-dark-mode icon-appoinment"></i>
                </div>
                <div class="next-appointment">
                    <div class="info-appointment">
                        <div class="title-appointment">Next Appointments</div>
                        <div class="number-appointment">0</div>
                    </div>
                    <i class="fas fa-book-medical card-icon display-6 text-white icon-appoinment"></i>
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
        });
    </script>
</body>

</html>