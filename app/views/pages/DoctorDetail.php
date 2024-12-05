<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="/Clinic-Booking/">
    <!-- Link Footer Css -->
    <link rel="stylesheet" href="public/css/DoctorDetail.css?v=1">
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
                        echo '<img src="public/images/' . $data['Doctor']['Image'] . '" alt="" class=doctor-image">';
                    ?> 
                </div>
                <!-- infor -->
                <div class="doctor-infor">
                <?php
                    echo '<div class="doctor-name">' . $data['Doctor']['FullName'] .'<img src="public/images/verify_icon.svg"></img>' .'</div>';
                    echo '<div class="doctor-speciality">MMBS-' . $data['Doctor']['SPName'] . '</div>';
                    echo '<div class="doctor-about">About'.'<img src="public/images/info_icon.svg"></img>'.'</div>';
                    echo '<div class="doctor-desc">' . $data['Doctor']['Description'] . '</div>';
                    echo '<div class = "doctor-fees">Appointment fees: $' . $data['Doctor']['DoctorFees'] . '</div>';
                ?>
                </div>
            </div>
            <!-- booking slot -->
            <div class="book-slots">
                <h3>Booking slots</h3>
                <!-- booking slot day -->
                <div class="book-slots-day">
                    <?php for($i = 0; $i < 7; $i++){?>
                        <?php
                            $dateTime = new DateTime($data['days'][$i]);
                            $dayofWeek = $dateTime->format('D');
                            $day = $dateTime->format('d');
                        ?>
                        <div class="book-slots-day-item" onclick="myfunc(this)"><?= $dayofWeek ?><span><?= $day ?></span></div>
                    <?php } ?>
                </div>
                <!-- booking timevalue -->
                <div class="book-slot">
                    <?php if (isset($data['TimeValue'])): ?>
                        <?php foreach ($data['TimeValue'] as $time): ?>
                            <?php if(!in_array($time, $data['isBooked'])): ?>
                                <p class="book-slot_timevalue" onclick="myfuncItem(this)"><?= $time ?></p>
                            <?php else: ?>
                                <p class="book-slot_timevalue book-slot_isBooked"><?= $time ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <!-- booking button -->
                <div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="animation"></i>Book an appointment<i class="animation"></i></button>
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
                                echo '<a href="DoctorDetail/show/' . $doctor['DoctorID'] . '">';
                                echo '<img src="public/images/' . $doctor['Image'] . '" alt="" class="doctor-image">';
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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Book Appointment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="mb-3">
                <label for="Name" class="form-label">Patient Name</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
                <label for="Name" class="form-label">Date</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <select class="form-select" aria-label="Default select example">
                <option selected>Slots</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Payment</button>
      </div>
    </div>
  </div>
</div>
<!-- Xem lại đoạn này -->
<script src="/CLINIC_YB/public/js/schedule.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>