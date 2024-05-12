<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Register</title>
    
    <style>
        body {
            display: flex;
            height: 100vh;
            background: url(img/bgs.png) no-repeat;
            background-size: cover;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }
        
        .container {
            max-width: 975px;
            width: 75%;
            background-color: #f5f7f8;
            padding: 20px 30px;
            border-radius: 30px;
            height: 96vh;
        }
        h2 {
            text-align: center;
            margin-top: 0px;
            font-weight: bold;
        }

        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Staff Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Name</th>
                    <th>Dept/Year</th>
                    <th>Purpose</th>
                    <th>system No</th>
                    <th>Date</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // MySQL database credentials
                    $servername = "localhost";
                    $username = "root";
                    $password = "root";
                    $dbname = "lab_reg";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch data from the staff_data table
                    $sql = "SELECT * FROM staff_data";
                    $result = $conn->query($sql);

                    // Display data in the table
                    if ($result) {
                        if ($result->num_rows > 0) {
                            $serialNo = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $serialNo . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['departmentYear'] . "</td>";
                                echo "<td>" . $row['purpose'] . "</td>";
                                echo "<td>" . $row['systemnumber'] . "</td>";
                                echo "<td>" . $row['date_in'] . "</td>";
                                echo "<td>" . $row['time_in'] . "</td>";
                                echo "<td>" . $row['time_out'] . "</td>";
                                echo "</tr>";
                                $serialNo++;
                            }
                        } else {
                            echo "<tr><td colspan='8'>No records found</td></tr>";
                        }
                    } else {
                        // Display SQL error
                        echo "Error: " . $conn->error;
                    }

                    // Close the database connection
                    $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
