<!doctype html>
<html lang="en">
<head>
    <title>Sistem Tempahan Dewan PDKP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400|Playfair+Display:400,700" rel="stylesheet">

    <link rel="stylesheet" href="index.css">
    <!-- js file -->
    <script src="script.js"></script> 

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- css -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400|Playfair+Display:400,700" rel="stylesheet">


    <!-- Theme Style
    <link rel="stylesheet" href="css/style.css"> -->
  </head>
  <body>
    
  <header class="site-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4 site-logo" data-aos="fade"><a href="main.php"><em>PDKP</em></a></div>
          <div class="col-8">


            <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- END menu-toggle -->

            <div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <div class="col-md-12">
                      <ul class="list-unstyled menu">
                        <li class="active"><a href="main.php">Halaman Utama</a></li>
                        <li><a href="DewanTunkuAnum.php">Dewan Tunku Anum</a></li>
                        <li><a href="DewanSerbaguna.php">Dewan Serbaguna</a></li>
                        <li><a href="DewanKodiang.php">Dewan Kodiang</a></li>
                        <li><a href="BilikGerakan.php">Bilik Gerakan</a></li>
                        <li><a href="BilikMesyuaratPembangunan.php">Bilik Mesyuarat Pembangunan</a></li>
                        <li><a href="BilikNGO.php">Bilik NGO</a></li>
                      </ul>
                    </div>
                    <div class="col-md-6 extra-info">
                      <div class="row">
                        
                        <div class="col-md-6">
                          <h3>Hubungi Kami</h3>
                          <ul class="list-unstyled">
                            <li><a href="https://www.facebook.com/pdtkpasu/?locale=ms_MY">Facebook</a></li>
                            <li><a href="https://ptg.kedah.gov.my/pejabat-tanah/kubang-pasu/">Website</a></li>
                            <li><a > 04-918 3100 </a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- END head -->

    <!-- Booking Form Modal -->
  <div id="booking-modal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="hideBookingModal()">&times;</span>
      <h2>Booking Form</h2>
      <center>
      <form action="insert.php" method="post" onsubmit="submitBookingForm(event)"> <!-- Updated action attribute -->
          
          <p>
            <label for="Name">Nama:</label>
            <input type="text" name="name" id="name">
          </p>

          <p>
            <label for="phoneNumber">Nombor Telefon:</label>
            <input type="text" name="phone_number" id="phone_number">
          </p>

          <p>
            <label for="emailAddress">Catatan:</label>
            <input type="text" name="email" id="email">
          </p>

          <p>
              <label for="type">Bilik/Dewan:</label>
              <select name="type" id="type">
                <option value="Dewan Tunku Anum">Dewan Tunku Anum</option>
                <option value="Dewan Serbaguna">Dewan Serbaguna</option>
                <option value="Dewan Kodiang">Dewan Kodiang</option>
                <option value="Bilik Gerakan">Bilik Gerakan</option>
                <option value="Bilik Mesyuarat Pembangunan">Bilik Mesyuarat Pembangunan</option>
                <option value="Bilik NGO">Bilik NGO</option>
              </select>
            </p>
            


          <p>
            <label for="booking_date">Tarikh Tempahan:</label>
            <input type="date" name="booking_date" id="booking_date">
          </p>

          <p>
          <label for="booking_time">Masa Tempahan:</label>
          <input type="time" name="booking_time" id="booking_time">
        </p>

          <input type="submit" value="Submit">
        </form>     
	    </center>
    </div>
  </div>



  <!-- Admin Login Modal -->
  <div id="admin-login-modal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="hideAdminLoginModal()">&times;</span>
      <h2>Admin Login</h2>
      <form action="login.php" method="post"> <!-- Add the form element with action="login.php" -->
        <p>
          <label for="username">Username:</label>
          <input type="text" name="username" id="username">
        </p>

        <p>
          <label for="password">Password:</label>
          <input type="password" name="password" id="password">
        </p>

        <input type="submit" value="Submit">
      </form>
    </div>
  </div>


    <section class="site-hero overlay" style="background-image: url(img/hero_1.jpg)">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center">
            <h1 class="heading" data-aos="fade-up">Sistem Tempahan Dewan PDKP</h1>
            <p class="sub-heading mb-5" data-aos="fade-up" data-aos-delay="100">Kompleks Pentadbiran Kubang Pasu</p>
            <a href="#" class="btn uppercase btn-primary mr-md-2 mr-0 mb-3 d-sm-inline d-block" onclick="showBookingForm()">Tempahan</a>
            <a href="#" class="btn uppercase btn-outline-light d-sm-inline d-block" onclick="showAdminLoginModal()" >Login Admin</a></p>
          </div>
        </div>
        <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
      </div>
    </section>
    <!-- END section -->

    <section class="section visit-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="heading" data-aos="fade-right">Dewan / Bilik</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 visit mb-3" data-aos="fade-right">
            <a href="DewanTunkuAnum.php"><img src="img/img_1.jpg" alt="Image placeholder" class="img-fluid"> </a>
            <h3><a href="DewanTunkuAnum.php">Dewan Tunku Anum</a></h3>
            <span class="reviews-count">
            <?php
                // Include the fetchBookingDetails.php file
                require_once 'fetchBookingDetails.php';
                $venueType = 'Dewan Tunku Anum';
                $bookingCount = getBookingCountForType($venueType);
                echo $bookingCount . ' Tempahan';
            ?>
            </span>
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3" data-aos="fade-right" data-aos-delay="100">
            <a href="DewanSerbaguna.php"><img src="img/img_2.jpg" alt="Image placeholder" class="img-fluid"> </a>
            <h3><a href="DewanSerbaguna.php">Dewan Serbaguna</a></h3>
            <div class="reviews-star float-left">
              <span class="ion-android-star"></span>
              <span class="ion-android-star"></span>
              <span class="ion-android-star"></span>
              <span class="ion-android-star-half"></span>
              <span class="ion-android-star-outline"></span>
            </div>
            <span class="reviews-count float-right">
              4,921 reviews
            </span>
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3" data-aos="fade-right" data-aos-delay="200">
            <a href="hotel.html"><img src="img/img_4.jpg" alt="Image placeholder" class="img-fluid"> </a>
            <h3><a href="hotel.html">Dewan Kodiang</a></h3>
            <div class="reviews-star float-left">
              <span class="ion-android-star"></span>
              <span class="ion-android-star"></span>
              <span class="ion-android-star"></span>
              <span class="ion-android-star"></span>
              <span class="ion-android-star-outline"></span>
            </div>
            <span class="reviews-count float-right">
              2,112 reviews
            </span>
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3" data-aos="fade-right" data-aos-delay="300">
            <a href="yacht.html"><img src="img/img_5.jpg" alt="Image placeholder" class="img-fluid"> </a>
            <h3><a href="yacht.html">Bilik Gerakan</a></h3>
            <div class="reviews-star float-left">
              <span class="ion-android-star"></span>
              <span class="ion-android-star"></span>
              <span class="ion-android-star"></span>
              <span class="ion-android-star"></span>
              <span class="ion-android-star-outline"></span>
            </div>
            <span class="reviews-count float-right">
              6,421 reviews
            </span>
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3" data-aos="fade-right">
            <a href="restaurant.html"><img src="img/img_1.jpg" alt="Image placeholder" class="img-fluid"> </a>
            <h3><a href="restaurant.html">Bilik Mesyuarat Pembangunan</a></h3>
            <div class="reviews-star float-left">
              <span class="ion-android-star"></span>
              <span class="ion-android-star"></span>
              <span class="ion-android-star"></span>
              <span class="ion-android-star-half"></span>
              <span class="ion-android-star-outline"></span>
            </div>
            <span class="reviews-count float-right">
              3,239 reviews
            </span>
          </div>
          <div class="col-lg-3 col-md-6 visit mb-3" data-aos="fade-right">
            <a href="restaurant.html"><img src="img/img_1.jpg" alt="Image placeholder" class="img-fluid"> </a>
            <h3><a href="restaurant.html">Bilik NGO</a></h3>
            <div class="reviews-star float-left">
              <span class="ion-android-star"></span>
              <span class="ion-android-star"></span>
              <span class="ion-android-star"></span>
              <span class="ion-android-star-half"></span>
              <span class="ion-android-star-outline"></span>
            </div>
            <span class="reviews-count float-right">
              3,239 reviews
            </span>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="section slider-section">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-8">
        <h2 class="heading" data-aos="fade-up">Lokasi</h2>
        <p class="lead" data-aos="fade-up" data-aos-delay="100">Kompleks Pentadbiran Daerah Kubang Pasu</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <!-- Use a wrapper div to center the map -->
        <div style="width: 100%; max-width: 800px; margin: 0 auto;">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15862.900066700175!2d100.4213878!3d6.2998185!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304b580bb6286425%3A0x84dfbee0442ab2ca!2sKompleks%20Pentadbiran%20Daerah%20Kubang%20Pasu!5e0!3m2!1sen!2smy!4v1689667973188!5m2!1sen!2smy" width="100%" height="600" style="border: 2;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- END section -->
    <footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Help</a></li>
             <li><a href="#">Rooms</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">Our Location</a></li>
              <li><a href="#">The Hosts</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Restaurant</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <p><span class="d-block">Address:</span> <span> 98 West 21th Street, Suite 721 New York NY 10016</span></p>
            <p><span class="d-block">Phone:</span> <span> (+1) 435 3533</span></p>
            <p><span class="d-block">Email:</span> <span> info@yourdomain.com</span></p>
          </div>
          <div class="col-md-3 mb-5">
            <p>Sign up for our newsletter</p>
            <form action="#" class="footer-newsletter">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Your email...">
                <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="row bordertop pt-5">
          <p class="col-md-6 text-left"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            
          <p class="col-md-6 text-right social">
            <a href="#"><span class="fa fa-tripadvisor"></span></a>
            <a href="#"><span class="fa fa-facebook"></span></a>
            <a href="#"><span class="fa fa-twitter"></span></a>
          </p>
        </div>
      </div>
    </footer>
    
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- <script src="js/jquery.waypoints.min.js"></script> -->
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>