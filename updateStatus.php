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
    // Check if the required form data exists
    if (isset($_POST['id']) && isset($_POST['status'])) {
        // Retrieve the form data
        $bookingId = $_POST['id'];
        $status = $_POST['status'];

        // Prepare the update statement using prepared statements
        $sql = "UPDATE test2 SET status = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "si", $status, $bookingId);

        // Execute the update statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Booking approved successfully.";
        } else {
            echo "ERROR: Unable to approve the booking. " . mysqli_error($conn);
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
