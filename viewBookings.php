<!DOCTYPE html>
<html>
<head>
    <title>Tempahan</title>
    <script src="script.js"></script> 
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <table>
        <!--- Build Table --->
        <tr>
            <center>
                <!-- <th>Nama</th>
                <th>Nombor Telefon</th> -->
                <th>Tujuan</th>
                <th>Jabatan/Agensi</th>
                <th>Bilik/Dewan</th>
                <th>Tarikh Tempahan</th>
                <th>Masa Mula</th>
                <th>Masa Tamat</th>
                <th>Status</th>
            </center>
        </tr>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "staff");

        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        
        
        

        $type = $_GET['type'];
        
        if (empty($type) || $type === 'all') { // Handle 'all' case
            $sql = "SELECT * FROM test2";
            $result = mysqli_query($conn, $sql);
        
            echo "<h2>Semua Tempahan</h2>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                //echo "<td>" . $row['name'] . "</td>";
                //echo "<td>" . $row['phone_number'] . "</td>";
                echo "<td>" . $row['notes'] . "</td>";
                echo "<td>" . $row['organization'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['booking_date'] . "</td>";
                // Convert time_start to 12-hour format
                $time_start_24h = $row['time_start'];
                $time_start_12h = date("h:i A", strtotime($time_start_24h));

                // Display the booking time in 12-hour format
                echo "<td>" . $time_start_12h . "</td>";

                // Convert time_start to 12-hour format
                $time_end_24h = $row['time_end'];
                $time_end_12h = date("h:i A", strtotime($time_end_24h));

                // Display the booking time in 12-hour format
                echo "<td>" . $time_end_12h . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                
                

                
                echo "</tr>";
            }







        }else if (!empty($type)) {
            $sql = "SELECT * FROM test2 WHERE type='$type'";
            $result = mysqli_query($conn, $sql);

            echo "<h2>Tempahan ( $type )</h2>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                //echo "<td>" . $row['name'] . "</td>";
                //echo "<td>" . $row['phone_number'] . "</td>";
                echo "<td>" . $row['notes'] . "</td>";
                echo "<td>" . $row['organization'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['booking_date'] . "</td>";
                // Convert time_start to 12-hour format
                $time_start_24h = $row['time_start'];
                $time_start_12h = date("h:i A", strtotime($time_start_24h));

                // Display the booking time in 12-hour format
                echo "<td>" . $time_start_12h . "</td>";

                // Convert time_start to 12-hour format
                $time_end_24h = $row['time_end'];
                $time_end_12h = date("h:i A", strtotime($time_end_24h));

                // Display the booking time in 12-hour format
                echo "<td>" . $time_end_12h . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                
                

                
                echo "</tr>";
            }

        } else {
            echo "No type specified.";
        }

        mysqli_close($conn);
        ?>
    </table>

    <!-- Back to Main Page button -->
    <button onclick="goBack()">Back</button>

</body>
</html>
