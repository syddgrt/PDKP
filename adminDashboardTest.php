<!DOCTYPE html>
<html>
<head>
	<!-- <link rel="stylesheet" href="styles.css"> -->
	<link rel="stylesheet" href="index.css">
	<script src="script.js"></script>
	<title>Admin Dashboard</title>
	<style>
		table {
			width: 100%;
			border-collapse: collapse;
		}

		table, th, td {
			border: 1px solid black;
			padding: 8px;
		}
	</style>
</head>
<body>

<h1>Admin dashboard lawl</h1>

<h2>View Bookings</h2>

<table>
	<tr>
		<th>Nama</th>
		<th>Nombor Telefon</th>
		<th>Catatan</th>
		<th>Bilik/Dewan</th>
		<th>Tarikh Tempahan</th>
		<th>Masa Tempahan</th>
		<th>Tindakan</th>
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

		// Loop through the results and display them in the table
		while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['phone_number'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "<td>" . $row['type'] . "</td>";
		echo "<td>" . $row['booking_date'] . "</td>";

		// Convert time_start to 12-hour format
		$time_start_24h = $row['time_start'];
		$time_start_12h = date("h:i A", strtotime($time_start_24h));

		// Display the booking time in 12-hour format
		echo "<td>" . $time_start_12h . "</td>";

		echo "<td>";
		echo "<button onclick=\"openEditBookingModal(" . $row['id'] . ")\">Edit</button>";
		echo "<form action='adminDashboard.php' method='post' style='display: inline;'>";
		echo "<input type='hidden' name='delete_id' value='" . $row['id'] . "'>";
		echo "<button onclick=\"deleteBooking(" . $row['id'] . ")\">Delete</button>";
		echo "</form>";
		echo "</td>";
		echo "</tr>";
		}
  	?>
	</table>

	<h2>Create New Booking</h2>

	<button onclick="showBookingForm()">Create Booking</button>

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
          <label for="time_start">Masa Tempahan:</label>
          <input type="time" name="time_start" id="time_start">
        </p>

          <input type="submit" value="Submit">
        </form>     
	    </center>
    </div>
  </div>


	<!-- Edit Booking Modal -->
	<div id="edit-booking-modal" class="modal" style="display: none;">
	<div class="modal-content">
		<span class="close" onclick="closeEditBookingModal()">&times;</span>
		<h2>Edit Booking</h2>
		<form onsubmit="submitEditBookingForm(); return false;">
		<!-- Hidden input to store the booking ID for submission -->
		<input type="hidden" id="edit-booking-id" value="">
		<p>
			<label for="edit-name">Nama:</label>
			<input type="text" name="name" id="edit-name" required>
		</p>
		<p>
			<label for="edit-phone_number">Nombor Telefon:</label>
			<input type="text" name="phone_number" id="edit-phone_number" required>
		</p>
		<p>
			<label for="edit-email">Emel:</label>
			<input type="text" name="email" id="edit-email" required>
		</p>
		<p>
			<label for="edit-type">Bilik/Dewan:</label>
			<input type="text" name="type" id="edit-type" required>
		</p>
		<p>
			<label for="edit-booking_date">Tarikh Tempahan:</label>
			<input type="date" name="booking_date" id="edit-booking_date" required>
		</p>
		<p>
			<label for="edit-time_start">Masa Tempahan:</label>
			<input type="time" name="time_start" id="edit-time_start" required>
		</p>
		<p>
			<input type="submit" value="Update Booking">
		</p>
		</form>
	</div>
	</div>

	<button onclick="goBack()">Back</button>
</body>
</html>
