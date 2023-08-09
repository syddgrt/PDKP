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
    // Retrieve the booking ID to delete
    $bookingIdToDelete = $_POST['id'];

    // Perform any necessary validation and sanitization of the form data

    // Delete the selected booking from the database
    $sqlDelete = "DELETE FROM test2 WHERE id = '$bookingIdToDelete'";
    if (mysqli_query($conn, $sqlDelete)) {
        echo "Booking deleted successfully.";

        // Reset the auto-increment value for the ID column
        $sqlResetAutoIncrement = "ALTER TABLE test2 AUTO_INCREMENT = 1";
        mysqli_query($conn, $sqlResetAutoIncrement);

        echo "IDs reset successfully.";
    } else {
        echo "ERROR: Unable to delete the booking. " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
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
    // Retrieve the booking ID to delete
    $bookingIdToDelete = $_POST['id'];

    // Perform any necessary validation and sanitization of the form data

    // Delete the selected booking from the database
    $sqlDelete = "DELETE FROM test2 WHERE id = '$bookingIdToDelete'";
    if (mysqli_query($conn, $sqlDelete)) {
        echo "Booking deleted successfully.";

        // Reset the auto-increment value for the ID column
        $sqlResetAutoIncrement = "ALTER TABLE test2 AUTO_INCREMENT = 1";
        mysqli_query($conn, $sqlResetAutoIncrement);

        echo "IDs reset successfully.";
    } else {
        echo "ERROR: Unable to delete the booking. " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
