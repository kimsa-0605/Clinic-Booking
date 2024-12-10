<!DOCTYPE html>
<html lang="en">
<head>
<base href="/Clinic-Booking/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/addDoctorAdmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <title>Add Doctor</title>
</head>
<body>
    <div class="container-fluid">
        <div class="content-AD">
            <div class="icon-back">
                <a href="./Admin/doctorManagement">
                    <button> <i class="fa-solid fa-arrow-left"></i></button>
                </a>
            </div>
            <div class="body-content-AD">
                <div class="bd-form-AD">
                    <div class="logo-AD">
                        <img src="public/images/logoSU.png" alt="">
                    </div>
                    <div class="bd-form-content-AD">
                        <form class="form-content-AD" action="./Admin/addDoctor" method="POST" onsubmit="return validateForm()">
                            <p class="text-title-form-AD">
                                Add <span>a new</span> doctor
                            </p>
                            <?php if (isset($data["message"])): ?>
                                <?php if (isset($data["success"]) && $data["success"]): ?>
                                    <!-- Thông báo thành công -->
                                    <div class="alert alert-success text-center" role="alert">
                                        <?php echo $data["message"]; ?>
                                    </div>
                                    <script>
                                        // Chuyển hướng sử dụng route từ PHP
                                        setTimeout(function() {
                                            window.location.href = "<?php echo $data['page']; ?>";
                                        }, 1000);
                                    </script>
                                <?php else: ?>
                                    <!-- Thông báo lỗi -->
                                    <div id="errorAlert" class="alert alert-danger text-center" role="alert">
                                        <?php echo $data["message"]; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="input-content-AD">
                                <div class="inputInforDoctor">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  name="fullName" placeholder="Doctor's full name" required 
                                            data-toggle="popover"   data-content="x">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="gender" required>
                                            <option value="" disabled selected>Doctor's gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="emailInput-ad" name="email" placeholder="Doctor's Email" required 
                                        data-toggle="popover"   data-content="x">
                                </div>
                                <div class="inputInforDoctor">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="password" name="password" placeholder="Doctor's password" minlength="8" required 
                                            data-toggle="popover"   data-content="x">
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="birth" placeholder="Doctor's birth date" required 
                                            data-toggle="popover"   data-content="x">
                                    </div>
                                </div>
                                <div class="inputInforDoctor">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phoneNumber" placeholder="Doctor's phone number" required 
                                            data-toggle="popover"   data-content="x">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="address" placeholder="Doctor's address"  required 
                                            data-toggle="popover"   data-content="x">
                                    </div>
                                </div>
                                <div class="inputInforDoctor">
                                    <div class="form-group">
                                        <select class="form-control" name="specialty" required>
                                            <option value="" disabled selected>Doctor's specialty</option>
                                            <?php
                                            // Sử dụng vòng for để duyệt qua mảng
                                            for ($i = 0; $i < count($data['specialist']); $i++) {
                                                $specialty = $data['specialist'][$i];  // Lấy từng chuyên ngành từ mảng
                                                echo '<option value="' . $specialty['SPID'] . '">' . $specialty['SPName'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="fees" placeholder="Doctor's consultation fee" required 
                                            data-toggle="popover"   data-content="x">
                                    </div>
                                </div>
                                <p>
                                    <button type="submit" id="submitButton" name="addDoctorButton" class="btn btn-info">Add Doctor</button>
                                </p>
                            </div>
                            <script src="public/js/inputError.js"></script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
