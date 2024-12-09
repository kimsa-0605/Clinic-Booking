<!DOCTYPE html>
<html lang="en">
<head>
<base href="/PHP_CLINIC/Clinic-Booking/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/SignIn.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="content-SI">
            <div class="icon-back">
                <a href="Profile">
                    <button> <i class="fa-solid fa-arrow-left"></i></button>
                </a>
                
            </div>
            <div class="body-content-SI">
                <div class="bd-image-SI">
                    <img src="https://framerusercontent.com/images/WlY0h8qorDn4kpxSer6BtZSGeew.png" alt="">
                </div>
                <div class="bd-form-SI">
                    <div class="logo-SI">
                        <img src="public/images/logoSU.png" alt="">
                    </div>
                    <div class="bd-form-content-SI">
                        <form class="form-content-SI" action="./SignIn/UserLogIn" method="POST" onsubmit="return validateForm()">
                            <p class="text-title-form-SI">
                                Wel<span>come !</span>
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
                            <div class="input-content-SI">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="emailInput-si" name="email" placeholder="Your Email" required 
                                    data-toggle="popover"   data-content="x">
                                </div>
            
                                <div class="inputPassword">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Your Password"  minlength="8" required 
                                        data-toggle="popover"  data-content="x" >
                                    </div>
                                </div>

                                <div class="nav-user-SU">
                                    <p>Already have an account? <a href="SignUp">Sign up</a> here.</p>
                                </div>

                                <button type="submit" id="submitButton" name="signInButton" class="btn btn-info">Log In</button>
                                
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
