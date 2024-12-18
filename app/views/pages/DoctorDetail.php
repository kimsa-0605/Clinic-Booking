<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Link Footer Css -->
    <link rel="stylesheet" href="/PHP_CLINIC/Clinic-Booking/public/css/DoctorDetail.css?v=1">
    <!-- Link fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Link Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoctorDetail</title>
</head>
<body>
    <!-- container of doctor detail -->
    <div class="container">
        <div class="container-content">
            <div class="container-content-head">
                <!-- image -->
                <div class="box-image">
                    <?php
                        echo '<img src="/PHP_CLINIC/Clinic-Booking/public/images/' . $data['Doctor']['Image'] . '" alt="" class=doctor-image">';
                    ?> 
                </div>
                <!-- infor -->
                <div class="doctor-infor">
                <?php
                    echo '<div class="doctor-name">' . $data['Doctor']['FullName'] .'<img src="/PHP_CLINIC/Clinic-Booking/public/images/verify_icon.svg"></img>' .'</div>';
                    echo '<div class="doctor-speciality">MMBS-' . $data['Doctor']['SPName'] . '</div>';
                    echo '<div class="doctor-about">About'.'<img src="/PHP_CLINIC/Clinic-Booking/public/images/info_icon.svg"></img>'.'</div>';
                    echo '<div class="doctor-desc">' . $data['Doctor']['Description'] . '</div>';
                    echo '<div class = "doctor-fees">Appointment fees:' . $data['Doctor']['DoctorFees'] . '</div>';
                ?>
                </div>
            </div>
            <!-- booking slot -->
            <div class="book-slots">
                <h3>Booking slots</h3>
                <!-- booking slot day -->
                <?php $slots = [];
                ?>
                <div class="book-slots-day">
                <?php for ($i = 0; $i < 7; $i++): ?>
                    <?php
                    
                    $dateTime = new DateTime($data['days'][$i]);
                    $dayofWeek = $dateTime->format('D');
                    $day = $dateTime->format('d');
                    ?>
                    <?php if (in_array($data['days'][$i], $data['dayofschedule']) && !empty($data['slots'][$data['days'][$i]])): ?>
                        <?php
                        $slotsForDay = isset($data['slots'][$data['days'][$i]]) ? $data['slots'][$data['days'][$i]] : [];
                        $date = $dateTime->format('Y-m-d');
                        ?> 
                        <div class="book-slots-day-item"
                            onclick="myfuncAvalialbe('<?= htmlspecialchars(json_encode($slotsForDay))?>', this, '<?= htmlspecialchars(json_encode($date))?>')">
                            <?= htmlspecialchars($dayofWeek) ?><span><?= htmlspecialchars($day) ?></span>
                        </div>
                    <?php else: ?>
                        <div class="book-slots-day-item locked" onclick="myfunc(this)">
                            <?= htmlspecialchars($dayofWeek) ?><span><?= htmlspecialchars($day) ?></span>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
                </div>
                <div class="book-slots">
                    <div id="result">
                        
                    </div>
                </div>
                <!-- booking button -->
                <div>
                    <?php
                        $id = $_SESSION['id-user'] ?? '';
                    ?>
                    <button class="btn" id="book" onclick="bookAppointment('<?php echo $id; ?>')">Book an appointment</button>
                </div>
            </div>
            <!-- Related doctor -->
            <div class="doctor-ralated">
                <div class="doctor-title">
                    <h2>Doctors Related To This Doctor</h2>
                    <p>Simply browse through our extensive list of trusted doctors and book an appointment that suits you best</p>
                </div>
                <!-- List doctor related to this doctor -->
                <div class="doctor-info">
                <?php if (isset($data['DoctorRelate'])) : ?>
                    <?php
                        foreach ($data['DoctorRelate'] as $doctor) {
                                echo '<a href="/PHP_CLINIC/Clinic-Booking/DoctorDetail/show/' . $doctor['DoctorID'] . '">';
                                echo '<img src="/PHP_CLINIC/Clinic-Booking/public/images/' . $doctor['Image'] . '" alt="" class="doctor-image">';
                                echo '<div class="doctor-name">' . $doctor['FullName'] . '</div>';
                                echo '<div class="doctor-specility">' . $doctor['SPName'] . '</div>';
                                echo '</a>';
                        }
                    ?>
                <?php else: ?>
                    <?php echo '<p>No related doctor found</p>'; ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Book Appointment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="Name" class="form-label">Patient Name</label>
                    <input type="text" class="form-control" id="name" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="Date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" placeholder="" readonly>
                </div>
                <div class="mb-3">
                    <label for="Slot" class="form-label">Slot</label>
                    <input type="text" class="form-control" id="slot" placeholder="" readonly>
                </div>
                <div class="mb-3">
                    <label for="Description" class="form-label">Description</label>
                    <textarea class="form-control" id="desc" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"  onclick="redirectToPayment(<?php echo $data['id']; ?>)">Payment</button>
            </div>
        </div>
    </div>
</div>
<script>
    const slots = <?= json_encode($slots); ?>;
</script>
<!-- Xem lại đoạn này -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/PHP_CLINIC/Clinic-Booking/public/js/schedule.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>