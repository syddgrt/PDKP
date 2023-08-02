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
    $sql = "DELETE FROM test2 WHERE id = '$bookingIdToDelete'";
    if (mysqli_query($conn, $sql)) {
        echo "Booking deleted successfully.";

        // Retrieve all the remaining bookings from the database
        $sqlRetrieveBookings = "SELECT * FROM test2";
        $result = mysqli_query($conn, $sqlRetrieveBookings);

        if ($result) {
            $newBookings = array();
            $newId = 1;

            // Iterate through the retrieved bookings and update their IDs
            while ($row = mysqli_fetch_assoc($result)) {
                $bookingId = $row['id'];
                // Update the ID for the booking
                $sqlUpdateId = "UPDATE test2 SET id = $newId WHERE id = $bookingId";
                mysqli_query($conn, $sqlUpdateId);

                // Store the updated booking in a new array
                $row['id'] = $newId;
                $newBookings[] = $row;

                $newId++; // Increment the new ID for the next booking
            }

            // Empty the test2 table to avoid duplicate entries
            mysqli_query($conn, "TRUNCATE TABLE test2");

            // Insert the updated bookings back into the test2 table
            foreach ($newBookings as $booking) {
                $name = $booking['name'];
                $phone_number = $booking['phone_number'];
                $email = $booking['email'];
                $type = $booking['type'];
                $booking_date = $booking['booking_date'];
                $time_start = $booking['time_start'];

                // Insert the booking into the test2 table with the updated ID
                $sqlInsert = "INSERT INTO test2 (id, name, phone_number, email, type, booking_date, time_start) 
                              VALUES ($newId, '$name', '$phone_number', '$email', '$type', '$booking_date', '$time_start')";
                mysqli_query($conn, $sqlInsert);

                $newId++; // Increment the new ID for the next booking
            }

            echo "IDs reset successfully.";
        } else {
            echo "ERROR: Unable to retrieve bookings. " . mysqli_error($conn);
        }
    } else {
        echo "ERROR: Unable to delete the booking. " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
