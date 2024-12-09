<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="/Clinic-Booking/">
    <!-- Link Footer Css -->
    <link rel="stylesheet" href="public/css/Doctor.css">
    <!-- Link fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
</head>
<body>
    <div class="container">
        <div class="container-content">
            <div class="container-head">
                <div class="search-box">
                    <label for="searchDoctor">Name of the doctor</label>
                    <!-- icon -->
                    <div class="boxIcon">
                        <input type="text" id="search" placeholder="Search doctor..." autocomplete="off">
                        <i class="fa-brands fa-searchengin"></i>
                    </div>
                </div>
            </div>
            <h1>Top <span>Doctors</span> To Book</h1>
            <div class="container-main">
                <div class="container-specialities">
                    <ul class="specialities">
                    <?php
                        foreach ($data['ListSpecialities'] as $speciality): ?>
                            <?php if (isset($speciality['SPName'])): ?>
                                    <a href="Doctors/Specilist/<?= htmlspecialchars($speciality['SPName'], ENT_QUOTES, 'UTF-8') ?>">
                                        <li class="<?= ($speciality['SPName'] == $data['specilist']) ? 'selected' : '' ?>">
                                            <?= htmlspecialchars($speciality['SPName'], ENT_QUOTES, 'UTF-8') ?>
                                        </li>
                                    </a>
                                <?php else: ?>
                                    <h3>Not Found Any Result</h3>
                                <?php endif; ?>
                        <?php endforeach; ?>
                    <!-- Đang chỉnh sửa tại đây -->
                    </ul>
                </div>
                <div class="container-doctor-info">
                <div class="doctor-info" id="result">
                    <?php foreach($data['doctorList'] as $doctor) : ?>  
                        <?php
                            echo '<a href="DoctorDetail/show/'.$doctor['DoctorID'].'">';                            
                            echo '<img src="public/images/' . $doctor['Image'] . '" alt="" class=doctor-image">';
                            echo '<div class="doctor-name">' . $doctor['FullName'] . '</div>';
                            echo '<div class="doctor-specility">' . $doctor['SPName'] . '</div>';
                            echo '</a>';
                        ?>
                    <?php endforeach;?>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>