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

// Process form data
$registerNumber = $_POST['registerNumber'];
$name = $_POST['name'];
$departmentYear = $_POST['departmentYear'];
$subjectName = $_POST['subjectName'];
$systemnumber = $_POST['systemnumber'];
$laptop = isset($_POST['laptop']) ? $_POST['laptop'] : "No"; // assuming the radio buttons have the name 'laptop'

// Validate form data (example: check if required fields are filled)
if (empty($registerNumber) || empty($name) || empty($departmentYear) || empty($subjectName)  || empty($systemnumber) ) {
    die("Error: All fields are required");
}

// Capture current date and time for check-in
$dateIn = date("Y-m-d");
$timeIn = date("H:i:s");

// Select the database
mysqli_select_db($conn, $dbname);

// Example using prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO student_data (registerNumber, name, departmentYear, subjectName,systemnumber,laptop,date_in, time_in) VALUES (?, ?, ?, ?, ?, ?,?,?)");
$stmt->bind_param("ssssssss", $registerNumber, $name, $departmentYear, $subjectName,$systemnumber,$laptop,$dateIn, $timeIn);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "";
} else {
    echo "Error submitting the form. Please try again later.";
}

// Close prepared statement and connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="submit.css">
    <style>
        body {
            display: flex;
            height: 100vh;
            background: url(img/bgs.png) no-repeat;
            background-size: cover;
            justify-content: center;
            align-items: center;
            padding: 10px;
            margin: 0; /* Add this to remove default margin */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #f5f7f8;
            padding: 20px;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        img {
            width: 100px;
            margin-bottom: 20px;
        }

        h2 {
            color: #3E065F;;
            font-size: 30px;
            font-weight: bold;
        }

        p {
            color: #666;
            margin-bottom: 30px;
            text-align: justify;
        }

        button {
            background: linear-gradient(-135deg, #71b7e6 ,#9b59b6 );
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: linear-gradient(-135deg, #71b7e6 ,#9b59b6 );
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="#" method="POST" id="loginForm" enctype="multipart/form-data">
            <img src="./img/tick.png">
            <h2>Thank You!</h2>
            <p>Your details have been successfully submitted. Thanks!</p>
            <button type="button">OK</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
