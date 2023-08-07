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

// Calculate the date 30 days ago from today
$thirtyDaysAgo = date('Y-m-d', strtotime('-30 days'));

// SQL query to delete rows with "booking_date" older than 30 days from today
$sql = "DELETE FROM test2 WHERE booking_date < '$thirtyDaysAgo'";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "Old bookings older than 30 days have been deleted.";
} else {
    echo "ERROR: Unable to delete old bookings. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
