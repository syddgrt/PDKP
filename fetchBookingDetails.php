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

// Check if the ID parameter is provided
if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $bookingId = intval($_GET['id']);

    // Fetch booking details based on the ID
    $sql = "SELECT * FROM test2 WHERE id = $bookingId";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Check if the booking exists
        if (mysqli_num_rows($result) > 0) {
            // Return the booking details as JSON
            $booking = mysqli_fetch_assoc($result);

            // Set the Content-Type header to indicate JSON response
            header('Content-Type: application/json');
            echo json_encode($booking);
        } else {
            // Booking not found
            http_response_code(404);
            echo json_encode(array("error" => "Booking not found"));
        }
    } else {
        // Error in query execution
        http_response_code(500);
        echo json_encode(array("error" => "Error fetching booking details"));
    }
} else {
    // ID parameter not provided
    http_response_code(400);
    // echo json_encode(array("error" => "Booking ID not provided"));
}

function getBookingCountForType($type)
{
    $conn = mysqli_connect("localhost", "root", "", "staff");

    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $type = mysqli_real_escape_string($conn, $type); // Sanitize the input

    // Query to count bookings for the specific type of venue
    $query = "SELECT COUNT(*) AS booking_count FROM test2 WHERE type = '$type'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $bookingCount = $row['booking_count'];
    } else {
        $bookingCount = 0;
    }

    mysqli_close($conn);

    return $bookingCount;
}

// Close the database connection
mysqli_close($conn);


?>
