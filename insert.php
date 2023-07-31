<!DOCTYPE html>
<html>

<head>
    <title>Insert Page</title>
    <script src="script.js"></script>
</head>

<body>
    <center>
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

        // Taking all values from the form data(input)
        $name = $_REQUEST['name'];
        $phone_number = $_REQUEST['phone_number'];
        $email = $_REQUEST['email'];
        $type = $_REQUEST['type'];
        $booking_date = $_REQUEST['booking_date'];
        $booking_time = $_REQUEST['booking_time'];

        $status = isset($_POST['status']) && !empty($_POST['status']) ? $_POST['status'] : 'pending';


        // Check if the booking is already occupied for the same date and type
        $check_sql = "SELECT * FROM test2 WHERE booking_date = '$booking_date' AND type = '$type' AND booking_time ='$booking_time'";
        $check_result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            // Slot is already booked, display error message
            http_response_code(409); // Conflict status code
            echo "Slot is too close to an existing booking. Please choose a different time or type.";
            exit(); // Exit to stop further processing
        } else {
            // Check if there is any booking with the same date and type within a 3-hour buffer
            $bufferTime = date('H:i:s', strtotime($booking_time . ' -3 hours'));
            $bufferQuery = "SELECT * FROM test2 WHERE type='$type' AND booking_date='$booking_date' AND booking_time > '$bufferTime'";
            $bufferResult = mysqli_query($conn, $bufferQuery);
            if (mysqli_num_rows($bufferResult) > 0) {
                // Slot is too close to an existing booking, display error message
                http_response_code(409); // Conflict status code
                echo "Slot is too close to an existing booking. Please choose a different time or type.";
                exit(); // Exit to stop further processing
            } else {
                // Insert the new booking into the database
                $insertQuery = "INSERT INTO test2 (name, phone_number, email, type, booking_date, booking_time, status) VALUES ('$name', '$phone_number', '$email', '$type', '$booking_date', '$booking_time','$status')";
                echo "Name: " . $name . "<br>";
                echo "Phone Number: " . $phone_number . "<br>";
                echo "Email: " . $email . "<br>";
                echo "Type: " . $type . "<br>";
                echo "Booking Date: " . $booking_date . "<br>";
                echo "Booking Time: " . $booking_time . "<br>";
                echo "Status: " . $status . "<br>";

                if (mysqli_query($conn, $insertQuery)) {
                    // Booking successful, set the success message
                    http_response_code(200); // Success status code
                    echo "Booking successful!";
                    exit(); // Exit to stop further processing
                } else {
                    // Error inserting booking, set the error message
                    http_response_code(500); // Server error status code
                    echo "Error inserting booking: " . mysqli_error($conn);
                    exit(); // Exit to stop further processing
                }
            }
        }

        // Close connection
        mysqli_close($conn);


        ?>
        <button onclick="window.location.href='index.php'">Return</button>
    </center>

</body>

</html>
