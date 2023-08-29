<!doctype html>
<html lang="en">
  <head>
    <title>Dewan Tunku Anum</title>
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
                        <li><a href="main.php">Halaman Utama</a></li>
                        <li class="active"><a href="DewanTunkuAnum.php">Dewan Tunku Anum</a></li>
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
                        
                          <h3>Hubungi Kami</h3><a href="#" class="align-items-center list-unstyled menu btn-outline-light d-sm-inline d-block" onclick="showAdminLoginModal()" >Login Admin</a></p>
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
      <h2>Form Tempahan</h2>
      <center>
      <form action="insert.php" method="post" onsubmit="submitBookingForm(event)" enctype="multipart/form-data"> <!-- Updated action attribute -->
          
          <p>
            <label for="Name">Nama*:</label>
            <input type="text" name="name" id="name" required>
          </p>

          <p>
            <label for="phoneNumber">Nombor Telefon*:</label>
            <input type="text" name="phone_number" id="phone_number" required>
          </p>

          <p>
            <label for="organization">Agensi/Jabatan/Persendirian*:</label>
            <input type="text" name="organization" id="organization" required>
          </p>

          <p>
            <label for="notes">Tujuan*:</label>
            <input type="text" name="notes" id="notes" required>
          </p>

          <p>
              <label for="type">Bilik/Dewan*:</label>
              <select name="type" id="type" required>
                <option value="Dewan Tunku Anum">Dewan Tunku Anum</option>
                <option value="Dewan Serbaguna">Dewan Serbaguna</option>
                <option value="Dewan Kodiang">Dewan Kodiang</option>
                <option value="Bilik Gerakan">Bilik Gerakan</option>
                <option value="Bilik Mesyuarat Pembangunan">Bilik Mesyuarat Pembangunan</option>
                <option value="Bilik NGO">Bilik NGO</option>
              </select>
            </p>
            


          <p>
            <label for="booking_date">Tarikh Tempahan*:</label>
            <input type="date" name="booking_date" id="booking_date" data-booked-dates="<?php echo $bookedDatesJson; ?>" required>
          </p>

          <p>
          <label for="time_start">Masa Mula*:</label>
          <input type="time" name="time_start" id="time_start" required>
        </p>

        <p>
          <label for="time_end">Masa Tamat*:</label>
          <input type="time" name="time_end" id="time_end" required>
        </p>

        <p>

        <label for="upload">&nbsp;&nbsp;&nbsp;Dokumen Sokongan:</label>
        <input type="file" name="upload" id="upload">
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
  
    <section class="site-hero overlay page-inside" style="background-image: url(gambarDewan/dewanTunkuAnum/dewanTunkuAnumMain.jpg)">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center">
            <h1 class="heading" data-aos="fade-up">Dewan Tunku Anum</h1>
            <div class="col-md-12 text-center">
            <p class="sub-heading mb-10" data-aos="fade-up" data-aos-delay="100">Kompleks Pentadbiran Kubang Pasu</p>
            <p data-aos="fade-up" data-aos-delay="100">
            <a href="#" class="btn uppercase btn-primary mr-md-2 mr-0 mb-3 d-sm-inline d-block" onclick="showBookingForm('Dewan Tunku Anum')">Tempahan</a>
            


            
            <a href="#" class="btn uppercase btn-outline-light d-sm-inline d-block" onclick="openViewBookings('Dewan Tunku Anum')">Lihat tempahan</a></p>
          </div>
        </div>
          </div>
        </div>
        <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
      </div>
    </section>
    <!-- END section -->

    <section class="bg-light">
      <div class="half d-md-flex d-block">
        <div class="image" data-aos="fade" style="background-image: url('gambarDewan/dewanTunkuAnum/dewanTunkuAnum1.jpg');"></div>
        <div class="text" data-aos="fade-right" data-aos-delay="200">
          <h2>Kemudahan</h2>
          
          <h5>Berhawa Dingin</h5>
          
          <h5>Pembesar Suara dengan basic sound system (Speaker + Subwoofer)</h5>
          <h5>Pembesar Suara dengan basic sound system (Speaker + Subwoofer)</h5>
          <h5>Pembesar Suara dengan basic sound system (Speaker + Subwoofer)</h5>
          <h5>Pembesar Suara dengan basic sound system (Speaker + Subwoofer)</h5>
          <h5>Pembesar Suara dengan basic sound system (Speaker + Subwoofer)</h5>
          
          <!-- <p class="mt-5"><a href="#" class="btn btn-primary uppercase">Learn More</a></p> -->
        </div>
      </div>

      <div class="half d-md-flex d-block">
        <div class="image order-2" data-aos="fade"  style="background-image: url('gambarDewan/dewanTunkuAnum/dewanTunkuAnum3.jpg');"></div>
        <div class="text" data-aos="fade-left" data-aos-delay="200">
          <h2>Kadar Harga</h2>
          
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit aliquid, est reiciendis repellat sapiente consequatur aperiam, ducimus, id minima eligendi officiis, qui expedita sint culpa illum magnam ipsam adipisci possimus? Sit aspernatur eaque id sunt fuga facere hic laudantium, aperiam!</p>
          <p>Provident dolor aperiam similique maiores quasi. Quo repudiandae fuga commodi itaque dolores accusamus, dolor esse adipisci labore harum blanditiis in totam ipsum vero necessitatibus incidunt reprehenderit, id iste quas, ab, non! Voluptates, reiciendis culpa iure deserunt voluptatum itaque. Quos, soluta.</p>
          
          
        </div>
      </div>

      <section class="bg-light">
      <div class="half d-md-flex d-block">
        <div class="image" data-aos="fade" style="background-image: url('gambarDewan/dewanTunkuAnum/dewanTunkuAnum2.jpg');"></div>
        <div class="text" data-aos="fade-right" data-aos-delay="200">
          <h2>Hubungi Kami</h2>
          <h4>04-702 8383 </h4>
          <h5>(Pejabat Daerah Kubang Pasu)</h5>
          <h4>04-702 8383</h4>
          <h5>(Pejabat Tanah Kubang Pasu)</h5>
          <h4><a href="https://m.facebook.com/profile.php?id=588641034679651">Facebook</a></h4>
          <h5>(Facebook PDKP)</h5>
          
          
        </div>
      </div>

    </section>
    <!-- END section -->

    <section class="section slider-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8">
            <h2 class="heading" data-aos="fade-up">Galeri</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
              <div class="slider-item">
                <img src="gambarDewan/dewanTunkuAnum/dewanTunkuAnumSlider1.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="gambarDewan/dewanTunkuAnum/dewanTunkuAnumSlider2.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="gambarDewan/dewanTunkuAnum/dewanTunkuAnumSlider3.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="gambarDewan/dewanTunkuAnum/dewanTunkuAnumSlider4.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="gambarDewan/dewanTunkuAnum/dewanTunkuAnumSlider5.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="gambarDewan/dewanTunkuAnum/dewanTunkuAnumSlider6.jpg" alt="Image placeholder" class="img-fluid">
              </div>
            </div>
            <!-- END slider -->
          </div>
          
        </div>
        <span></span>
        <span></span>
        <span></span>
        <br><br>
        <center>
          <h1>Lokasi</h1>
        </center>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15862.918306866115!2d100.4218294!3d6.2992217!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304b580bc3eca389%3A0x1bd0ab613c7bbaee!2sDewan%20Tunku%20Anum!5e0!3m2!1sen!2smy!4v1690269716526!5m2!1sen!2smy" width="1110" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>