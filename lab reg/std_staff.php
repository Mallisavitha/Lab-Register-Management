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
        .an {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            justify-content: space-between;
            padding: 10px; /* Add some padding */
        }

        .an a {
            text-decoration: none; /* Remove underline from links */
            color: #333; /* Link color */
            margin-right: 10px; /* Add some space between links */
        }


        
        button {
            padding: 10px 20px; /* Adjust padding for your preferred size */
            font-size: 16px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            margin-top: 10px; /* Add some space between buttons */
            width: 150px; /* Adjust the width for your preferred size */

        }

        #printPageButton {
            background: linear-gradient(135deg, #71b7e6 ,#9b59b6 );
             
            color: white;
        }

        #technicalIssueButton {
            background: linear-gradient(135deg, #71b7e6 ,#9b59b6 );
            
            color: white;
        }

        .container {
            max-width: 975px;
            width: 75%;
            background-color: #f5f7f8;
            padding: 20px 30px;
            border-radius: 30px;
            height: 96vh;
            margin-top: 20px; /* Add some space between tables */
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
        .an {
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="an">
        <!-- Button for Technical Issue -->
        <button id="technicalIssueButton">Technical Issue</button><br>
        
        <!-- Printer icon for printing with a button -->
        <button id="printPageButton">Print
            <img src="img/printer.png" alt="Print" width="15px" height="15px">
        </button>
    </div>
    <div class="container">
        <h2>Students Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Dept/Year</th>
                    <th>Subject</th>
                    <th>System No</th>
                    <th>Laptop</th>
                    <th>Date</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // ... (your existing PHP code for students table)
                     // MySQL database credentials
                     $servername = "localhost";
                     $username = "root";
                     $password = "root";
                     $dbname = "lab_reg"; // Change this to your actual database name
 
                     // Create connection
                     $conn = new mysqli($servername, $username, $password, $dbname);
 
                     // Check connection
                     if ($conn->connect_error) {
                         die("Connection failed: " . $conn->connect_error);
                     }
 
                     // Fetch data from the student_data table
                     $sql = "SELECT * FROM student_data";
                     $result = $conn->query($sql);
 
                     // Display data in the table
                     if ($result) {
                         if ($result->num_rows > 0) {
                             $serialNo = 1;
                             while ($row = $result->fetch_assoc()) {
                                 echo "<tr>";
                                 echo "<td>" . $serialNo . "</td>";
                                 echo "<td>" . $row['registerNumber'] . "</td>";
                                 echo "<td>" . $row['name'] . "</td>";
                                 echo "<td>" . $row['departmentYear'] . "</td>";
                                 echo "<td>" . $row['subjectName'] . "</td>";
                                 echo "<td>" . $row['systemnumber'] . "</td>";
                                 echo "<td>" . $row['laptop'] . "</td>";
                                 echo "<td>" . $row['date_in'] . "</td>";
                                 echo "<td>" . $row['time_in'] . "</td>";
                                 echo "<td>" . $row['time_out'] . "</td>";
                                 echo "</tr>";
                                 $serialNo++;
                             }
                         } else {
                             echo "<tr><td colspan='10'>No records found</td></tr>";
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

        <h2>Staff Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Name</th>
                    <th>Dept/Year</th>
                    <th>Purpose</th>
                    <th>System No</th>
                    <th>Date</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // ... (your existing PHP code for staff table)
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
    <script>
        // JavaScript code to handle printing
        document.getElementById('printPageButton').addEventListener('click', function() {
            window.print();
        });

        // JavaScript code to handle redirecting to the next page on Technical Issue button click
        document.getElementById('technicalIssueButton').addEventListener('click', function() {
            window.location.href = "help_fetch.php"; // Change the URL accordingly
        });
    </script>
</body>
</html>