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
        $time_start = $_REQUEST['time_start'];
        $time_end = $_REQUEST['time_end'];
        $upload = $_REQUEST['upload'];

        $status = isset($_POST['status']) && !empty($_POST['status']) ? $_POST['status'] : 'Pending';

        $upload = isset($_FILES['upload']) ? $_FILES['upload']['name'] : '';

        if ($time_start === $time_end) {
            http_response_code(400); // Bad request status code
            echo "Time Start and Time End cannot be the same.";
            exit();
        }
        
        // Convert the time format to timestamps
        $time_start_timestamp = strtotime($time_start);
        $time_end_timestamp = strtotime($time_end);
        
        // Ensure that there is at least a 1-hour gap between time_start and time_end
        $one_hour_in_seconds = 3600; // 1 hour = 3600 seconds
        
        if ($time_end_timestamp - $time_start_timestamp < $one_hour_in_seconds) {
            http_response_code(400); // Bad request status code
            echo "There must be at least a 1-hour gap between Time Start and Time End.";
            exit();
        } else if ($time_end_timestamp <= $time_start_timestamp){
            http_response_code(400); // Bad request status code           
            echo "Time end must be later than time start";
            exit();
        }

    


        // Check if the booking is already occupied for the same date and type
        $check_sql = "SELECT * FROM test2 WHERE booking_date = '$booking_date' AND type = '$type' AND (time_start BETWEEN '$time_start' AND '$time_end' OR time_end BETWEEN '$time_start' AND '$time_end')";
        $check_result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            // Slot is already booked, display error message
            http_response_code(409); // Conflict status code
            echo "Slot is too close to an existing booking. Please choose a different time or type.";
            exit(); // Exit to stop further processing
        } else {
            // Check if there is any booking with the same date and type within a 3-hour buffer
            $bufferTime = date('H:i:s', strtotime($time_start . ' -1 hours'));
            $bufferQuery = "SELECT * FROM test2 WHERE type='$type' AND booking_date='$booking_date' AND time_start > '$bufferTime'";
            $bufferResult = mysqli_query($conn, $bufferQuery);
            if (mysqli_num_rows($bufferResult) > 0) {
                // Slot is too close to an existing booking, display error message
                http_response_code(409); // Conflict status code
                echo "Slot is too close to an existing booking. Please choose a different time or type.";
                exit(); // Exit to stop further processing
            } else {
                // Insert the new booking into the database
                $insertQuery = "INSERT INTO test2 (name, phone_number, email, type, booking_date, time_start, time_end, upload, status) VALUES ('$name', '$phone_number', '$email', '$type', '$booking_date', '$time_start','$time_end', '$upload','$status')";
                echo "Name: " . $name . "<br>";
                echo "Phone Number: " . $phone_number . "<br>";
                echo "Email: " . $email . "<br>";
                echo "Type: " . $type . "<br>";
                echo "Booking Date: " . $booking_date . "<br>";
                echo "Time Start: " . $time_start . "<br>";
                echo "Time End: " . $time_end . "<br>";
                echo "Upload: " . $upload . "<br>";
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
