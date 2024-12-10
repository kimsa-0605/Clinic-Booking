<!DOCTYPE html>
<html lang="en">
<head>
<base href="/Clinic-Booking/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Appointments</title>
    <link rel="stylesheet" href="public/css/DoctorManagement.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="content-admin">
            <div class="body-content-admin">
                <div class="content-body-admin">
                    <div class="table-display-admin">
                        <div class="tbl-content-admin">
                            <div class="flex-title-button">
                                <p class="tbl-title-admin">Doctor <span>Management</span></p>
                                <form action="./Admin/addDoctor" method="post">
                                    <button type="submit" name="addDoctorSubmit">Add doctor</button>
                                </form>
                            </div>
                            <?php
                            // Kiểm tra nếu có dữ liệu appointments
                            if (!empty($data['doctor'])) {
                                echo '<table class="tbl-admin table">
                                        <thead>
                                            <tr>
                                                <th style="padding-left: 10px;">No.</th>
                                                <th>Full name </th>
                                                <th>Email</th>
                                                <th>Birth</th>
                                                <th>Gender</th>
                                                <th>Phone number</th>
                                                <th>Address</th>
                                                <th>Specialty</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                $counter = 1;
                               for ($i=0; $i<count($data['doctor']); $i++) {
                                    echo '<tr>
                                            <td style="padding-left: 10px;">' . $counter++ . '</td>
                                            <td>' . htmlspecialchars($data['doctor'][$i]['FullName']) . '</td>
                                            <td>' . htmlspecialchars($data['doctor'][$i]['Email']) . '</td>
                                            <td>' . htmlspecialchars($data['doctor'][$i]['DOB']) . '</td>
                                            <td>' . htmlspecialchars($data['doctor'][$i]['Gender']) . '</td>
                                            <td>' . htmlspecialchars($data['doctor'][$i]['PhoneNumber']) . '</td>
                                            <td>' . htmlspecialchars($data['doctor'][$i]['Address']) . '</td>
                                            <td>' . htmlspecialchars($data['doctor'][$i]['Specialty']) . '</td>
                                        </tr>
                                        ';
                                }
                                echo '</tbody></table>';
                            } else {
                                echo "<div class='nondata'><i class='fa-regular fa-face-frown-open'></i>No data available!</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>