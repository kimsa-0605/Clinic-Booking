<!DOCTYPE html>
<html lang="en">
<head>
<base href="/Clinic-Booking/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/ContactUs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- jQuery đầy đủ -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-9/aliU8dGd2tb6OSsuzixeVYIK1O+3+8E+KnujsT/1yWlM1dN4y3+6D3XcZ6d13C" crossorigin="anonymous"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Customized Google Map</title>
</head>
<body>
    <?php 
        $pageName = "Contact Us";
        include("app/views/components/slider.php"); 
      ?>
    <div class="container-fluid">
          <div class="page-cover-Contact">
              <div class="body-container-Contact">
                  <div class="page-content-Contact">
                    <div class="contactInfor">
                        <div class="icon-title-Contact">
                            <div class="iconMessage-Contact">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="Message-title-Contact">
                                <p class="color-Message-title-Contact">Email</p>
                                <p class="noncolor-Message-title-Contact">clinic@gmail.com</p>
                            </div>
                        </div>
        
                        <div class="icon-title-Contact">
                            <div class="iconMessage-Contact">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="Message-title-Contact">
                                <p class="color-Message-title-Contact">Phone</p>
                                <p class="noncolor-Message-title-Contact">033 234 456</p>
                            </div>
                        </div>

                        <div class="icon-title-Contact">
                            <div class="iconMessage-Contact">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="Message-title-Contact">
                                <p class="color-Message-title-Contact">Address</p>
                                <p class="noncolor-Message-title-Contact">99 THT, Son Tra, Da Nang</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-map-container-Contact">
                        <div class="form-container-Contact">
                            <form action="./ContactUs/sendContactUs" method="post" onsubmit="return validateForm()" target="_blank">
                                <div class="iconContact-title-Contact">
                                    <h2 class="form-title" >Get in <span style="color: white;">touch</span> with us</h2>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                      <input type="text" class="form-control" name="name" placeholder="Your Name (*)" required
                                      data-toggle="popover"   data-content="x">
                                    </div>
                                  </div>
                                  <div class="form-row">
                                    <div class="col">
                                      <input type="text" class="form-control" name="subject" placeholder="Subject" required
                                      data-toggle="popover"   data-content="x">
                                    </div>
                                  </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="textInput" name="message" rows="3" placeholder="Your Message..." required
                                    data-toggle="popover"   data-content="x"></textarea>
                                </div>
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
                                            }, 3000);
                                        </script>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <button type="submit" id="submitButton" name="sendMessage" class="btn btn-info">Send Message</button>
                                <script src="public/js/inputError.js"></script>
                            </form>
                        </div>
                        <iframe class="ggMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125822.36959094334!2d105.34131991640626!3d9.770378800000017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0e9642a86f28f%3A0x887f01f1e131bf12!2zUGjDsm5nIGtow6FtIHTGsCBuaMOibiBCUyBOZ3V54buFbiBWxINuIFbFqQ!5e0!3m2!1svi!2s!4v1732082401891!5m2!1svi!2s" 
                        width="600" height="450" style="border:0;" 
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                  </div>
              </div>
          </div> 
      </div>
</body>
</html>
