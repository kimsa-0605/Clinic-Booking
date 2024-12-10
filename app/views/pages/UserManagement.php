<!DOCTYPE html>
<html lang="en">
<head>
<base href="/Clinic-Booking/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Appointments</title>
    <link rel="stylesheet" href="public/css/UserManagement.css">
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
                            <p class="tbl-title-admin">User <span>Management</span></p>
                            <?php
                            // Kiểm tra nếu có dữ liệu appointments
                            if (!empty($data['user'])) {
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
                                                <th>Role</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                $counter = 1;
                               for ($i=0; $i<count($data['user']); $i++) {
                                    echo '<tr>
                                            <td style="padding-left: 10px;">' . $counter++ . '</td>
                                            <td>' . htmlspecialchars($data['user'][$i]['FullName']) . '</td>
                                            <td>' . htmlspecialchars($data['user'][$i]['Email']) . '</td>
                                            <td>' . htmlspecialchars($data['user'][$i]['DOB']) . '</td>
                                            <td>' . htmlspecialchars($data['user'][$i]['Gender']) . '</td>
                                            <td>' . htmlspecialchars($data['user'][$i]['PhoneNumber']) . '</td>
                                            <td>' . htmlspecialchars($data['user'][$i]['Address']) . '</td>
                                            <td>' . htmlspecialchars($data['user'][$i]['Role']) . '</td>
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
      <!-- jQuery -->
    <script src='https://code.jquery.com/jquery-3.7.0.js'></script>
    <!-- Data Table JS -->
    <script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
    <script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>
      <!-- Script JS -->
      <script src="./js/script.js"></script>
      <!--$%analytics%$-->
</body>
</html>