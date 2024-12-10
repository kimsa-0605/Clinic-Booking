<!DOCTYPE html>
<html lang="en">
<head>
<base href="/Clinic-Booking/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/FAQ.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- jQuery đầy đủ -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-9/aliU8dGd2tb6OSsuzixeVYIK1O+3+8E+KnujsT/1yWlM1dN4y3+6D3XcZ6d13C" crossorigin="anonymous"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
      <?php 
        $pageName = "Frequently Asked Questions";
        include("app/views/components/slider.php"); 
      ?>
        <div class="page-cover-FAQ">
            <div class="body-container">
                <div class="page-content-FAQ">
                    <div class="elemontor-container-FAQ">
                        <div class="left-content-FAQ">
                            <div class="doctor-lc-image-FAQ">
                                <img src="https://hla-lab.com/wp-content/uploads/2022/07/img5.jpg" alt="">
                            </div>
                            <div class="form-lc-container-FAQ">
                                <div class="iconFAQ-title-rc-FAQ">
                                    <div class="iconMessage">
                                        <i class="fa-solid fa-message"></i>
                                    </div>
                                    <div class="Message-title-rc">
                                        <p class="color-Message-title">Ask Us</p>
                                        <p class="noncolor-Message-title">Quick contact form</p>
                                    </div>
                                </div>
                                <form action="./FAQ/SendFAQEmail" method="post" onsubmit="return validateForm()" target="_blank">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="nameInput" placeholder="Your Name (*)" required 
                                          data-toggle="popover"   data-content="x">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="textInput" name="message" rows="3" placeholder="Your Message..."  required 
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
                                    <p>
                                        <button type="submit" id="submitButton" name="sendMessage" class="btn btn-info">Send Message</button>
                                    </p>
                                    <script src="public/js/inputError.js"></script>
                                </form>
                            </div>
                        </div>
                        <div class="right-content-FAQ">
                            <div class="top-content-rc-FAQ">
                              <div class="title-rc-FAQ">Do you have any <span class="color-title-rc-FAQ">questions?</span></div>
                              <div class="script-rc-FAQ">
                                <p>Please read questions bellow and if you can not find your answer, 
                                please send us your question, we will answer you as soon as possible.
                                </p>
                              </div>
                              <div class="iconFAQ-title-rc-FAQ">
                                  <div class="iconQuestion">
                                      <i class="fa-solid fa-question"></i>
                                  </div>
                                  <div class="FAQ-title-rc">
                                      <p class="color-FAQ-title">F.A.Qs</p>
                                      <p class="noncolor-FAQ-title">Frequently asked questions</p>
                                  </div>
                              </div>
                            </div>
                            <div class="question-answer-rc-FAQ">
                                <div id="accordion">
                                    <div class="card">
                                      <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Hi!! How are you today ??
                                            <i class="fa-solid fa-chevron-right"></i>
                                          </button>
                                        </h5>
                                      </div>
                                  
                                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
                                        <div class="card-body">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card">
                                      <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Hi!! How are you today ??
                                            <i class="fa-solid fa-chevron-right"></i>
                                            
                                          </button>
                                        </h5>
                                      </div>
                                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
                                        <div class="card-body">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card">
                                      <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Hi!! How are you today ??
                                            <i class="fa-solid fa-chevron-right"></i>
                                          </button>
                                        </h5>
                                      </div>
                                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree">
                                        <div class="card-body">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingFour">
                                          <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                              Hi!! How are you today ??
                                              <i class="fa-solid fa-chevron-right"></i>
                                            </button>
                                          </h5>
                                        </div>
                                    
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour">
                                          <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card">
                                        <div class="card-header" id="headingFive">
                                          <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                              Hi!! How are you today ??
                                              <i class="fa-solid fa-chevron-right"></i>
                                            </button>
                                          </h5>
                                        </div>
                                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive">
                                          <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card">
                                        <div class="card-header" id="headingSix">
                                          <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                              Hi!! How are you today ??
                                              <i class="fa-solid fa-chevron-right"></i>
                                            </button>
                                          </h5>
                                        </div>
                                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix">
                                          <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</body>
</html>