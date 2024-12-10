<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/Clinic-Booking/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashborard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="public/css/appointment.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="content">



        <div class="content-manage-patient">
            <div class="infor-search">
                <button class="action-add-appointment"><a href="./DoctorLayout/AddAppointment">Add Appointment</a></button>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Appointment At</th>
                        <th>Service Charge</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data['Patients'])): ?>
                        <?php foreach ($data['Patients'] as $patient): ?>
                            <tr>
                                <td>
                                    <div class="infor-patient">
                                        <img src="<?= htmlspecialchars($patient['ImagePatient']); ?>" alt="">
                                        <div class="infor-patient-detail">
                                            <div class="name"><?= htmlspecialchars($patient['NamePatient']); ?></div>
                                            <div class="email"><?= htmlspecialchars($patient['emailPatient']); ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="schedual">
                                        <div class="hour"><?= htmlspecialchars($patient['TimeValue']); ?></div>
                                        <div class="date"><?= htmlspecialchars($patient['DateSchedule']); ?></div>
                                    </div>
                                </td>
                                <td><span>$20.00</span></td> <!-- Điều chỉnh giá nếu cần -->
                                <td><span><?= htmlspecialchars($patient['Payment']); ?></span></td>
                                <td>
                                    <select class="form-select">
                                        <option><?= htmlspecialchars($patient['StatusAppointment']); ?></option>
                                    </select>
                                </td>
                                <td><i class="fa-solid fa-eye"></i></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No appointments found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    
</body>

</html>