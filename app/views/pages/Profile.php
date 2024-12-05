<!DOCTYPE html>
<html lang="en">
<head>
<base href="/Clinic-Booking/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/Profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- jQuery đầy đủ -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-9/aliU8dGd2tb6OSsuzixeVYIK1O+3+8E+KnujsT/1yWlM1dN4y3+6D3XcZ6d13C" crossorigin="anonymous"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <?php 
            $pageName = "My Account";
            include("app/views/components/slider.php"); 
        ?>
        <div class="content-profile">
            <div class="body-content-profile">
                <div class="sidebar">
                <?php 
                    include("app/views/components/Sidebar.php"); 
                ?> 
                </div>
                <div class="content-body-profile">
                    <div class="UA-PI-profile">
                    <div class="UA-profile">
                        <div class="UA-content">
                            <p class="UA-title">Upcoming appointments</p>
                            <div class="UA-schedule">
                                <p class="UA-date"><?php echo $data["upComingSchedule"]["ScheduleDate"]?></p>
                                <p class="UA-time"><?php echo $data["upComingSchedule"]["TimeType"]?></p>
                                <p class="UA-doctorName"><?php echo $data["upComingSchedule"]["DoctorName"]?></p>
                                <p class="UA-specilist"><?php echo $data["upComingSchedule"]["Specilist"]?></p>
                            </div>
                        </div>
                    </div>
                    <div class="profile-infor">
                        <div class="PI-content">
                            <div class="PI-image">
                                <img src="<?php echo $data["avatarImage"]?>" alt="">
                            </div>
                            <div class="name-icon-profile">
                                <span class="name-PI-content"><?php echo $data['userInfor']["FullName"]?></span>
                            </div>
                            <div class="gender-profile">
                                <i class="fa-solid fa-transgender"></i> <span class="gender-PI-content">Gender: <?php echo $data["userInfor"]["Gender"]?></span>
                            </div>
                            <div class="birth-profile">
                                <i class="fa-regular fa-calendar"></i> <span class="birth-date-PI-content">Birth: <?php echo $data["userInfor"]["DOB"]?></span>
                            </div>
                            <div class="address-profile">
                                <i class="fa-solid fa-location-dot"></i> <span class="phoneN-PI-content">Address: <?php echo $data["userInfor"]["Address"]?></span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="RA-profile">
                        <div class="RA-content">
                            <p class="RA-title">Recent appointments</p>
                            <div class="RA-schedule">
                                <?php
                                    // Kiểm tra dữ liệu trong mảng
                                    if (!empty($data['recentAppointments'])) {
                                        echo '<table class="tbl-MH table">
                                                <thead>
                                                <tr>
                                                    <th style="padding-left: 10px;">No.</th>
                                                    <th>Doctor</th>
                                                    <th>Specialty</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Status</th>
                                                    <th>Examination Results</th>
                                                </tr>
                                                </thead>
                                                <tbody>';

                                        $counter = 1; // Khởi tạo số thứ tự
                                        foreach ($data['recentAppointments'] as $row) {
                                            echo '<tr>
                                                    <td style="padding-left: 10px;">' . $counter++ . '</td>
                                                    <td>' . htmlspecialchars($row["DoctorName"]) . '</td>
                                                    <td>' . htmlspecialchars($row["Specilist"]) . '</td>
                                                    <td>' . htmlspecialchars($row["ScheduleDate"]) . '</td>
                                                    <td>' . htmlspecialchars($row["TimeType"]) . '</td>
                                                    <td>' . htmlspecialchars($row["AppointmentStatus"]) . '</td>
                                                    <td>' . htmlspecialchars($row["Description"]) . '</td>
                                                </tr>';
                                        }

                                        echo '</tbody></table>';
                                    } else {
                                        echo "<div class='nondata'>"."<i class='fa-regular fa-face-frown-open'></i>"."No data available!"."</div>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>