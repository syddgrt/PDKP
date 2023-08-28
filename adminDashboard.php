<?php


// Start the session to check for admin login status
session_start();

// Check if the user is logged in as an admin
if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true) {
    // Redirect to the login page or display an error message
    header("Location: main.php");
    exit();
    include_once 'updateBookings.php';
}

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PDKP - Admin Dashboard</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" /> -->
        <link href="css/admindb.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    

        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Include jQuery UI -->
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>


        <link rel="stylesheet" href="index.css">
	    <script src="script.js"></script>
        


    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="adminDashboard.php">PDKP</a>
            <!-- Sidebar Toggle-->
            <!-- <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button> -->
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li> -->
                        <!-- <li><hr class="dropdown-divider" /></li> -->
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="adminDashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Others</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Navigation
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="main.php">Logout</a>
                                    <a class="nav-link" href="DewanTunkuAnum.php">Dewan Tunku Anum</a>
                                    <a class="nav-link" href="DewanSerbaguna.php">Dewan Serbaguna</a>                                    
                                    <a class="nav-link" href="DewanKodiang.php">Dewan Kodiang</a>
                                    <a class="nav-link" href="BilikGerakan.php">Bilik Gerakan</a>
                                    <a class="nav-link" href="BilikMesyuaratPembangunan.php">Bilik Mesyuarat Pembangunan</a>
                                    <a class="nav-link" href="BilikNGO.php">Bilik NGO</a>
                                </nav>
                            </div>
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>                              
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div> --><a class="nav-link" href="logout.html">Logout</a>
                            <!-- <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a> -->
                        </div>
                    </div>
                    <!-- <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div> -->
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>

                    <div class="container-fluid px-4">
                        <h1 class="mt-4">PDKP Admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row"> <!-- Dewan Tunku Anum -->
                            <div class="col-xl-2 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Dewan <br>Tunku Anum</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <!-- display booking count -->
                                    <?php
                                        // Include the fetchBookingDetails.php file
                                        require_once 'fetchBookingDetails.php';
                                        $venueType = 'Dewan Tunku Anum';
                                        $bookingCount = getBookingCountForType($venueType);
                                        echo $bookingCount . ' Tempahan';
                                    ?>


                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6"> <!-- Dewan serbaguna -->
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Dewan <br>Serbaguna</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                        // Include the fetchBookingDetails.php file
                                        
                                        $venueType = 'Dewan Serbaguna';
                                        $bookingCount = getBookingCountForType($venueType);
                                        echo $bookingCount . ' Tempahan';
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6"> <!-- Dewan kodiang -->
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Dewan <br>Kodiang</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                        // Include the fetchBookingDetails.php file
                                        
                                        $venueType = 'Dewan Kodiang';
                                        $bookingCount = getBookingCountForType($venueType);
                                        echo $bookingCount . ' Tempahan';
                                    ?>
                                    </div>                                   
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6"> <!-- Bilik Gerakan -->
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Bilik <br>Gerakan             </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                        // Include the fetchBookingDetails.php file
                                        
                                        $venueType = 'Bilik Gerakan';
                                        $bookingCount = getBookingCountForType($venueType);
                                        echo $bookingCount . ' Tempahan';
                                    ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="col-xl-2 col-md-6"> <!-- Bilik Mesyuarat Pembangunan -->
                                <div class="card bg-danger text-white mb-3">
                                    <div class="card-body">Bilik Mesyuarat Pembangunan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                        // Include the fetchBookingDetails.php file
                                        
                                        $venueType = 'Bilik Mesyuarat Pembangunan';
                                        $bookingCount = getBookingCountForType($venueType);
                                        echo $bookingCount . ' Tempahan';
                                    ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6"> <!-- Bilik NGO -->
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body">Bilik <br>NGO</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                        // Include the fetchBookingDetails.php file
                                        
                                        $venueType = 'Bilik NGO';
                                        $bookingCount = getBookingCountForType($venueType);
                                        echo $bookingCount . ' Tempahan';
                                    ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                            <div class="card-body">
    <table id="datatablesSimple">
        <tr>
            <th><strong>ID</strong></th>
            <th><strong>Nama</strong></th>
            <th><strong>Nombor Telefon</strong></th>
            <th><strong>Agensi/Jabatan</strong></th>
            <th><strong>Tujuan</strong></th>
            <th><strong>Bilik/Dewan</strong></th>
            <th><strong>Tarikh Tempahan</strong></th>
            <th><strong>Masa Mula</strong></th>
            <th><strong>Masa Tamat</strong></th>
            <th><strong>Dokumen Sokongan</strong></th>
            <th><strong>Status</strong></th>
            <th><strong>Tindakan</strong></th>
        </tr>
        <?php
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "staff");

        // Check connection
        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Fetch all bookings from the database
        $sql = "SELECT * FROM test2";
        $result = mysqli_query($conn, $sql);

        if ($result === false) {
            die("ERROR: Query failed. " . mysqli_error($conn));
        }

        // Loop through the results and display them in the table
        while ($row = mysqli_fetch_assoc($result)) {
            
            $status = $row['status'];
            $rowClass = $status === 'Approved' ? 'approved-row' : ($status === 'Rejected' ? 'rejected-row' : '');

            // // Add the data-id attribute to each row
            echo "<tr data-id='" . $row['id'] . "' class='$rowClass'>";
            


            // Rest of the code remains the same...
            
            
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['phone_number'] . "</td>";
            echo "<td>" . $row['organization'] . "</td>";
            echo "<td>" . $row['notes'] . "</td>";
            
            echo "<td>" . $row['type'] . "</td>";
            echo "<td>" . date('d-m-Y', strtotime($row['booking_date'])) . "</td>";

            // Convert time_start to 12-hour format
            $time_start_24h = $row['time_start'];
            $time_start_12h = date("h:i A", strtotime($time_start_24h));

            // Display the booking time in 12-hour format
            echo "<td>" . $time_start_12h . "</td>";

            // Convert time_start to 12-hour format
            $time_end_24h = $row['time_end'];
            $time_end_12h = date("h:i A", strtotime($time_end_24h));

            // Display the booking time in 12-hour format
            echo "<td>" . $time_end_12h . "</td>";

            echo "<td>" . $row['id'] . "</td>";

            echo "<td class='status-cell'>" . $row['status'] . "</td>";

            echo "<td>";
            echo "<button onclick=\"openEditBookingModal(" . $row['id'] . ")\">Edit</button>";
            echo "<form action='adminDashboard.php' method='post' style='display: inline;' onsubmit=\"return false;\">";
            echo "<input type='hidden' name='delete_id' value='" . $row['id'] . "'>";
            echo "<button onclick=\"deleteBooking(" . $row['id'] . ")\">Delete</button>";
            // echo "<button onclick=\"approveBooking(this, " . $row['id'] . ")\">Approve</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }

        // Don't forget to close the database connection
        mysqli_close($conn);
        ?>
    </table>
</div>

                            <button onclick="showBookingForm()">Create Booking</button>
                            <button onclick="approveBooking(this, <?php echo $row['id']; ?>)">Approve</button>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        

        <!-- Booking Form Modal -->
	<div id="booking-modal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="hideBookingModal()">&times;</span>
      <h2>Borang Tempahan</h2>
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


	<!-- Edit Booking Modal -->
	<div id="edit-booking-modal" class="modal" style="display: none;">
	<div class="modal-content-admin">
		<span class="close" onclick="closeEditBookingModal()">&times;</span>
		<h2>Kemaskini tempahan</h2>
		<form onsubmit="submitEditBookingForm(); return false;">
            <!-- Hidden input to store the booking ID for submission -->
            <input type="hidden" id="edit-booking-id" value="">
            <div class="form-group">
                <label for="edit-name">Nama:</label>
                <input type="text" name="name" id="edit-name" required>
            </div>
            <div class="form-group">
                <label for="edit-phone_number">Nombor Telefon:</label>
                <input type="text" name="phone_number" id="edit-phone_number" required>
            </div>

            <div class="form-group">
                <label for="edit-organization">Agensi/Jabatan/Persendirian:</label>
                <input type="text" name="organization" id="edit-organization" required>
            </div>
            <div class="form-group">
                <label for="edit-notes">Tujuan:</label>
                <input type="text" name="notes" id="edit-notes" required>
            </div>
            
            <!-- <div class="form-group">
                <label for="edit-notes">Agensi:</label>
                <input type="text" name="notes" id="edit-notes" required>
            </div> -->
            <div class="form-group">
                <label for="edit-type">Bilik/Dewan:</label>      
                    <select name="type" id="edit-type">
                    <option value="Dewan Tunku Anum">Dewan Tunku Anum</option>
                    <option value="Dewan Serbaguna">Dewan Serbaguna</option>
                    <option value="Dewan Kodiang">Dewan Kodiang</option>
                    <option value="Bilik Gerakan">Bilik Gerakan</option>
                    <option value="Bilik Mesyuarat Pembangunan">Bilik Mesyuarat Pembangunan</option>
                    <option value="Bilik NGO">Bilik NGO</option>
                </select>
            </div>
            <div class="form-group">
                <label for="edit-booking_date">Tarikh Tempahan:</label>
                <input type="date" name="booking_date" id="edit-booking_date" required>
            </div>

            <div class="form-group">
                <label for="edit-time_start">Masa Mula:</label>
                <input type="time" name="time_start" id="edit-time_start" required>
            </div>
            <div class="form-group">
                <label for="edit-time_end">Masa Tamat:</label>
                <input type="time" name="time_end" id="edit-time_end" required>
            </div>
            <div class="form-group">
                <label for="edit-status">Status:</label>
                <select name="text" id="edit-status">
                    <option value="Pending">Pending</option>
                    <option value="Approved">Approved</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>
            <div class="form-group">
                <label for="edit-upload">&nbsp;&nbsp;&nbsp;Dokumen Sokongan:</label>
                <input type="file" name="upload" id="edit-upload">
            </div>
            <input type="submit" value="Update Booking">
		</form>
	</div>                        




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- <script src="js/scripts.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <!-- <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
