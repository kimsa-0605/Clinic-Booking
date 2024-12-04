<!DOCTYPE html>
<html lang="en">
<head>
<base href="/Clinic-Booking/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/MedicalHistory.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <?php 
            $pageName = "My Account";
            include("pages/slider.php"); 
        ?> 
        <div class="content-MH">
            <div class="body-content-MH">
                <div class="sideMHr">
                    <?php include("pages/Sidebar.php"); ?>
                </div>
                <div class="content-body-MH">
                    <!-- <div class="search-doctor-MH"></div> -->
                    <div class="table-display-MH">
                        <div class="tbl-content-MH">
                            <p class="tbl-title-MH">Medical <span>History</span></p>
                            <?php

                            if (!empty($data['appointments'])) {
                                echo '<table class="tbl-MH table">
                                        <thead>
                                        <tr>
                                            <th style="padding-left: 10px;">No.</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Specialty</th>
                                            <th>Examination Results</th>
                                            <th>Doctor</th>
                                        </tr>
                                        </thead>
                                        <tbody>';
                                    $counter = 1;
                                    foreach ($data['appointments'] as $appointment) {
                                    echo '<tr>
                                            <td style="padding-left: 10px;">' . $counter++ . '</td>
                                            <td>' . htmlspecialchars($appointment["ScheduleDate"]) . '</td>
                                            <td>' . htmlspecialchars($appointment["TimeType"]) . '</td>
                                            <td>' . htmlspecialchars($appointment["Specilist"]) . '</td>
                                            <td>' . htmlspecialchars($appointment["AppointmentDescription"]) . '</td>
                                            <td>' . htmlspecialchars($appointment["DoctorName"]) . '</td>
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
</body>
</html>
