<!DOCTYPE html>
<html lang="en">
<head>
<base href="/Clinic-Booking/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/MyAccount.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- jQuery đầy đủ -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-9/aliU8dGd2tb6OSsuzixeVYIK1O+3+8E+KnujsT/1yWlM1dN4y3+6D3XcZ6d13C" crossorigin="anonymous"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
       <?php 
            $pageName = "My account";
            include("pages/slider.php");
        ?> 
        <div class="content-myAC">
            <div id="body-content-myAC">
                <div class="content-image-myAC">
                    <img src="https://img.freepik.com/free-vector/health-professional-team-concept_23-2148494662.jpg" alt="">
                </div>
                <div class="content-button-myAC">
                    <div class="welcom-title-myAC">
                        <p>Welcome to our <span>XtraClinic!</span> Please</p>
                    </div>

                    <div class="button-SU-SI">
                        <a href="SignUp">
                            <button class="button-SISU" id="SU">Sign Up</button>
                        </a>
                        <p>or</p>
                        <a href="SignIn">
                            <button class="button-SISU" id="SI">Log In</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
