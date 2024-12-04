<!DOCTYPE html>
<html lang="en">
<head>
<base href="/Clinic-Booking/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/Sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">

    <!-- jQuery mới nhất -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-sidebar">
        <div class="content-sidebar">
            <div class="body-content-sidebar">
                <div class="sidebar-content">
                    <div class="overview">
                        <a href="Profile/Overview">
                            <button class="overview-sidebar" type="button">
                                <i class="fa-solid fa-house"></i> Overview
                            </button>
                       </a>
                    </div>
                    <div class="medical-appointments">
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa-regular fa-calendar"></i> Medical appointments 
                        </button> 
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body-sidebar">
                                <ul>
                                    <li>
                                        <a href="Profile/BookedAppointments">
                                            <button class="BA-sidebar" type="button" id="btn1">
                                                 Booked appointments
                                            </button>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="Profile/MedicalHistory">
                                            <button class="MH-sidebar" type="button" id="btn2">
                                                 Medical history
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="update-account">
                        <a href="Profile/UpdateProfile">
                            <button class="update-account-sidebar" type="button">
                                <i class="fa-solid fa-user"></i> Update account
                            </button>
                        </a>
                    </div>

                    <div class="logout-account">
                        <form action="./LogOut/LogOutAccount" method="POST" onsubmit="return validateForm()">
                            <button class="logout-account-sidebar" type="submit" name="logout">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i> Log out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
