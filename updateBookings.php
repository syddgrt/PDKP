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

// Check if the form data was submitted via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if all required form data exists
    if (
        isset($_POST['id']) &&
        isset($_POST['name']) &&
        isset($_POST['phone_number']) &&
        isset($_POST['email']) &&
        isset($_POST['type']) &&
        isset($_POST['booking_date']) &&
        isset($_POST['time_start']) &&
        isset($_POST['time_end']) &&
        isset($_POST['upload'])
    ) {
        // Retrieve the form data
        $bookingId = $_POST['id'];
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $type = $_POST['type'];
        $booking_date = $_POST['booking_date'];
        $time_start = $_POST['time_start'];
        $time_start = $_POST['time_end'];
        $upload = $_POST['upload'];

        // Prepare the update statement using prepared statements
        $sql = "UPDATE test2 SET name = ?, phone_number = ?, email = ?, type = ?, booking_date = ?, time_start = ?, time_end = ?, upload = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ssssssi", $name, $phone_number, $email, $type, $booking_date, $time_start, $time_end, $upload, $bookingId);

        // Execute the update statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Booking updated successfully.";
        } else {
            echo "ERROR: Unable to update the booking. " . mysqli_error($conn);
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        echo "ERROR: Required form data not provided.";
    }
}

// Close connection
mysqli_close($conn);
?>
