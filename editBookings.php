<?php
// Check if the booking ID is provided as a query parameter
if (isset($_GET['id'])) {
	// Retrieve the booking ID from the query parameter
	$bookingId = $_GET['id'];

	// Perform any necessary validation and sanitization of the booking ID

	// Connect to the database
	$conn = mysqli_connect("localhost", "root", "", "staff");

	// Check connection
	if ($conn === false) {
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	// Retrieve the booking details from the database using the ID
	$sql = "SELECT * FROM test2 WHERE id = '$bookingId'";
	$result = mysqli_query($conn, $sql);

	// Check if the booking exists
	if (mysqli_num_rows($result) == 1) {
		// Fetch the booking details
		$row = mysqli_fetch_assoc($result);

		// Handle the form submission for updating the booking
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Retrieve the form data
			$updatedName = $_POST['name'];
			$updatedPhoneNumber = $_POST['phone_number'];
			$updatedEmail = $_POST['email'];
			$updatedType = $_POST['type'];
			$updatedBookingDate = $_POST['booking_date'];
			$updatedBookingTime = $_POST['time_start'];

			// Perform the update query
			$updateSql = "UPDATE test2 SET name = '$updatedName', phone_number = '$updatedPhoneNumber', email = '$updatedEmail', type = '$updatedType', booking_date = '$updatedBookingDate', time_start = '$updatedBookingTime' WHERE id = '$bookingId'";
			if (mysqli_query($conn, $updateSql)) {
				// Display a success message and redirect to the viewBookings page
				echo '<script>alert("Booking has been updated."); window.location.href = "adminDashboard.php";</script>';
				exit;
			} else {
				// Display an error message
				echo "ERROR: Unable to update the booking. " . mysqli_error($conn);
			}
		}

		// Display the form for editing the booking
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Edit Booking</title>
		</head>
		<body>
			<h1>Edit Booking</h1>
			<div id="booking-modal" class="modal">
				<div class="modal-content">
					<form action="" method="post">
						<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
						<div class="form-group">
							<label for="name">Nama:</label>
							<input type="name" name="name" id="name" value="<?php echo $row['name']; ?>" required>
						</div>
						<div class="form-group">
							<label for="phone_number">Nombor Telefon:</label>
							<input type="phone_number" name="phone_number" id="phone_number" value="<?php echo $row['phone_number']; ?>" required>
						</div>
						<div class="form-group">
							<label for="email">Emel:</label>
							<input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" required>
						</p>
						<p>
							<label for="type">Bilik/Dewan:</label>
							<input type="type" name="type" id="type" value="<?php echo $row['type']; ?>" required>
						</p>
						<p>
							<label for="booking_date">Tarikh Tempahan:</label>
							<input type="date" name="booking_date" id="booking_date" value="<?php echo $row['booking_date']; ?>" required>
						</p>
						<p>
							<label for="time_start">Masa Tempahan:</label>
							<input type="time" name="time_start" id="time_start" value="<?php echo $row['time_start']; ?>" required>
						</p>
						<p>
							<input type="submit" value="Update Booking">
						</p>
					</form>
				</div>
			</div>
		</body>
		</html>
		<?php
	} else {
		// Booking not found, display an error message or redirect to an error page
		echo "Booking not found.";
	}

	// Close connection
	mysqli_close($conn);
} else {
	// Booking ID not provided, display an error message or redirect to an error page
	echo "Invalid request.";
}
?>
