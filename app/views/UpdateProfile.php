<!DOCTYPE html>
<html lang="en">
<head>
<base href="/Clinic-Booking/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/UpdateProfile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <?php 
            $pageName = "My Account";
            include("pages/slider.php");
        ?>
        <div class="content-profile">
            <div class="body-content-profile">
                <div class="sidebar">
                <?php 
                    include("pages/Sidebar.php");
                ?> 
                </div>
                <div class="content-body-profile">
                    <form class="avata-user" action="./Profile/UpdateProfile" method="post" enctype="multipart/form-data">
                        <div class="UDP-image">
                            <img src="<?php echo $data["avatarImage"]?>" alt="">
                        </div>
                        
                        <label for="file-upload" class="custom-file-upload">
                            <input id="file-upload" name="imageAvatar" type="file"/> <i class="fa-solid fa-pen"></i> Change image
                        </label>
                        <button type="submit" class="submitChangeImage" name="submitChangeImage">Save</button>
                    </form>

                    <div class="form-infor-update-change-UDP">
                        <div class="infor-form-UDP">
                            <div class="bd-infor-form-content-UDP">
                                <form class="infor-form-content-UDP" action="./Profile/UpdateProfile" method="POST" onsubmit="return validateForm()">
                                    <p class="text-title-infor-form-UDP">
                                        Personal <span>Information</span>
                                    </p>
                                    <?php if (isset($data["message"]) && $data['POST'] == 'UpdateInfor'): ?>
                                        <?php if (isset($data["success"]) && $data["success"]): ?>
                                            <!-- Thông báo thành công -->
                                            <div id="successAlert" class="alert alert-success text-center" role="alert">
                                                <?php echo $data["message"]; ?>
                                            </div>
                                            <script>
                                                setTimeout(function() {
                                                    document.getElementById('successAlert').style.display = 'none';
                                                }, 2000); // Ẩn sau 2 giây
                                            </script>
                                        <?php else: ?>
                                            <!-- Thông báo lỗi -->
                                            <div id="errorAlert" class="alert alert-danger text-center" role="alert">
                                                <?php echo $data["message"]; ?>
                                            </div>
                                            <script>
                                                setTimeout(function() {
                                                    document.getElementById('errorAlert').style.display = 'none';
                                                }, 2000); // Ẩn sau 2 giây
                                            </script>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <div class="input-infor-content-UDP">
                                        <div class="form-group">
                                            <label for="fullnameInput-UDP">Fullname</label>
                                            <input type="text" class="form-control" id="fullnameInput-UDP" name="fullName" placeholder="Your FullName" value="<?php echo $data['userInforResult']['FullName']?>" required>
                                        </div>

                                        <div class="form-group">
                                            <p class="title-input-gender-UDP">Gender</p>
                                            <div class="radio-input-gender-UDP">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="male" <?php if ($data['userInforResult']['Gender'] == "male") echo "checked"; ?> >
                                                    <label class="form-check-label" for="gridRadios1">
                                                    Male
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="female" <?php if ($data['userInforResult']['Gender'] == "female") echo "checked"; ?> >
                                                    <label class="form-check-label" for="gridRadios2">
                                                    Female
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="other" <?php if ($data['userInforResult']['Gender'] == "other") echo "checked"; ?>>
                                                    <label class="form-check-label" for="gridRadios2">
                                                    Other
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="fullnameInput-UDP">Birth</label>
                                            <input type="date" class="form-control" id="birth-UDP" name="birth" placeholder="Your Birth" value="<?php echo $data['userInforResult']['DOB'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="fullnameInput-UDP">Address</label>
                                            <input type="text" class="form-control" id="fullnameInput-UDP" name="address" placeholder="Your Address" value="<?php echo $data['userInforResult']['Address'] ?>">
                                        </div>
                                    </div> 
                                    <p>
                                        <button type="submit" name="UpdateInfor"  id="submitButton" class="btn btn-info">Update</button>
                                    </p>   
                                </form>
                            </div>
                        </div>

                        <div class="password-form-UDP">
                            <div class="bd-password-form-content-UDP">
                                <form class="password-form-content-UDP"  class="infor-form-content-UDP" action="./Profile/UpdateProfile" method="POST" onsubmit="return validateForm()">
                                    <p class="text-title-password-form-UDP">
                                        Change <span>Password</span>
                                    </p>
                                    <?php if (isset($data["message"]) && $data['POST'] == 'UpdatePassword'): ?>
                                        <?php if (isset($data["success"]) && $data["success"]): ?>
                                            <!-- Thông báo thành công -->
                                            <div id="successAlert" class="alert alert-success text-center" role="alert">
                                                <?php echo $data["message"]; ?>
                                            </div>
                                            <script>
                                                setTimeout(function() {
                                                    document.getElementById('successAlert').style.display = 'none';
                                                }, 3000); // Ẩn sau 2 giây
                                            </script>
                                        <?php else: ?>
                                            <!-- Thông báo lỗi -->
                                            <div id="errorAlert" class="alert alert-danger text-center" role="alert">
                                                <?php echo $data["message"]; ?>
                                            </div>
                                            <script>
                                                setTimeout(function() {
                                                    document.getElementById('errorAlert').style.display = 'none';
                                                }, 3000); // Ẩn sau 2 giây
                                            </script>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <div class="input-password-content-UDP">
                                        <div class="form-group">
                                            <label for="currentPassword-UDP">Current Password</label>
                                            <input type="password" class="form-control" id="currentPassword-UDP" name="currentPassword" placeholder="Current Password"  required>
                                        </div>
                                        <div class="form-group">
                                            <label for="newPassword-UDP">New Password</label>
                                            <input type="password" class="form-control" id="newPassword-UDP" name="newPassword" placeholder="New Password"  required>
                                        </div>
                                        <label for="confirmNewPassword-UDP">Confirm New Password</label>
                                        <input type="password" class="form-control" id="confirmNewPassword-UDP" name="confirmNewPassword" placeholder="Confirm New Password"  required>
                                        <p>
                                            <button type="submit" name="UpdatePassword"  id="submitButton" class="btn btn-info">Update</button>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <script src="public/js/inputError.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>