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
?>

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

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            justify-content: center;
            background-color: #f2f2f2;
        }

        /* Style for the status button */
        .status-button {
            padding: 5px 10px;
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
            background-color: red; /* Initial state color */
        }

        .status-button.resolved {
            background-color: green;
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
                    <th>System Number</th>
                    <th>Technical Issue</th>
                    <th>Feedback</th>
                    <th>Resolved\Unresolved</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch data from the help_data table
                $sql = "SELECT * FROM help_data";
                $result = $conn->query($sql);

                // Display data in the table
                if ($result) {
                    if ($result->num_rows > 0) {
                        $serialNo = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $serialNo . "</td>";
                            echo "<td>" . $row['systemnumber'] . "</td>";
                            echo "<td>" . $row['technical_issue'] . "</td>";
                            echo "<td>" . $row['feedback'] . "</td>";
                            echo "<td>";
                            echo "<button class='status-button' onclick='updateStatus(this, " . $row['id'] . ")'>Unresolved</button>";
                            echo "</td>";
                            echo "</tr>";
                            $serialNo++;
                        }
                    } else {
                        echo "<tr><td colspan='5'>No records found</td></tr>";
                    }
                } else {
                    // Display SQL error
                    echo "Error: " . $conn->error;
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function updateStatus(button, id) {
            // Toggle the status and update button style
            if (button.innerText === 'resolved') {
                button.innerText = 'unresolved';
                button.classList.remove('resolved');
                button.classList.add('unresolved');
            } else {
                button.innerText = 'resolved';
                button.classList.remove('unresolved');
                button.classList.add('resolved');
            }

            // You can implement the logic here to send the updated status to the server using AJAX
            // For simplicity, we'll just log the updated status for now
            console.log("ID: " + id + ", Updated Status: " + button.innerText);

            // If you want to update the server asynchronously, you can use AJAX here
            // Example using Fetch API:
            // fetch('update_status.php', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //     },
            //     body: JSON.stringify({ id: id, status: button.innerText }),
            // })
            // .then(response => response.json())
            // .then(data => console.log(data))
            // .catch(error => console.error('Error:', error));
        }
    </script>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>