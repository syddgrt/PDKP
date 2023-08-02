<!DOCTYPE html>
<html>
<head>
  
  <title>PDKP Booking System</title>
  <link rel="stylesheet" href="index.css">
  <!-- js file -->
  <script src="script.js"></script> 
  <!-- css -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400|Playfair+Display:400,700" rel="stylesheet">


    <!-- Theme Style
    <link rel="stylesheet" href="css/style.css"> -->
</head>
<body>
  

  <nav class="navbar">
    <div class="logo">Logo</div>
    <ul class="nav-links">
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
    <div class="burger">
      <div class="line"></div>
      <div class="line"></div>
      <div class="line"></div>
    </div>
  </nav>
  
  <!-- Rest of your HTML code -->
  
  <h1>Kompleks Pentadbiran Daerah Kubang Pasu</h1>
  <h2>Sistem Tempahan Dewan</h2>

<div class="container">
  <div class="court-images">
    <img src="gambarDewan/gamaq1.jpg" data-type="Dewan Tunku Anum" onclick="showModalWithAdditionalImages('Dewan Tunku Anum', 'court1.jpg', 'Dewan Tunku Anum', ['gambarDewan/gamaq1.jpg'], 'Dewan Tunku Anum')">
    <img src="gambarDewan/gamaq2.jpg" data-type="Dewan Serbaguna" onclick="showModalWithAdditionalImages('Dewan Serbaguna', 'court2.jpg', 'Dewan Serbaguna', ['additional4.jpg', 'additional5.jpg'], 'Dewan Serbaguna')">
    <img src="gambarDewan/gamaq2.jpg" data-type="Dewan Kodiang" onclick="showModalWithAdditionalImages('Dewan Kodiang', 'court2.jpg', 'Dewan Kodiang', ['additional4.jpg', 'additional5.jpg'], 'Dewan Kodiang')">
    <img src="gambarDewan/gamaq3.jpg" data-type="Bilik Gerakan" onclick="showModalWithAdditionalImages('Bilik Gerakan', 'court3.jpg', 'Bilik Gerakan', ['additional6.jpg'], 'Bilik Gerakan')">
    <img src="gambarDewan/gamaq4.jpg" data-type="Bilik Mesyuarat Pembangunan" onclick="showModalWithAdditionalImages('Bilik Mesyuarat Pembangunan', 'court4.jpg', 'Bilik Mesyuarat Pembangunan', ['additional7.jpg', 'additional8.jpg', 'additional9.jpg'], 'Bilik Mesyuarat Pembangunan')">
    <img src="gambarDewan/gamaq5.jpg" data-type="Bilik NGO" onclick="showModalWithAdditionalImages('Bilik NGO', 'court5.jpg', 'Bilik NGO', ['additional10.jpg', 'additional11.jpg'], 'Bilik NGO')">     
  </div>
</div>

  <!-- Modal -->
  <div id="modal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="hideModal()">&times;</span>
      <h2 id="modal-title"></h2>
      <img id="modal-image" src="" alt="">
      <p id="modal-description"></p>
      <button id="modal-button" onclick="showBookingForm()">Book Now</button>
    </div>
  </div>

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
            <label for="emailAddress">Emel:</label>
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
          <label for="time_start">Masa Tempahan:</label>
          <input type="time" name="time_start" id="time_start">
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

  <center>
    <div class="admin-login-button">
    <button onclick="showAdminLoginModal()">Admin Login</button>
  </div>
</center>
  

</body>
</html>
