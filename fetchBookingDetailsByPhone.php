<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// servername => localhost
// username => root
// password => empty
// database name => staff
$conn = mysqli_connect("localhost", "root", "", "staff");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Check if the phone parameter is provided
if (isset($_POST['phone'])) {
    // Sanitize the input to prevent SQL injection
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phone']);

    // Fetch booking details based on the phone number
    $sql = "SELECT * FROM test2 WHERE phone_number = '$phoneNumber'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Check if any bookings are found
        if (mysqli_num_rows($result) > 0) {
            // Return the booking details as JSON
            header('Content-Type: application/json'); // Corrected content type
            $bookings = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $bookings[] = $row;
            }
            echo json_encode(array("bookings" => $bookings));
        } else {
            // No bookings found for the phone number
            http_response_code(404);
            echo json_encode(array("error" => "No bookings found for the phone number"));
        }
    } else {
        // Error in query execution
        http_response_code(500);
        echo json_encode(array("error" => "Error fetching booking details"));
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
