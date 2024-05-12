<?php

// MySQL database credentials
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "lab_reg";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data

$regno = $_POST['regno'];
$name = $_POST['name'];
$departmentYear = $_POST['departmentYear'];
$purpose = $_POST['purpose'];
$systemnumber = $_POST['systemnumber'];

// Validate form data
if (empty($regno) ||empty($name) || empty($departmentYear) || empty($purpose) || empty($systemnumber) ) {
    die("Error: All fields are required");
}

// Capture current date and time for check-in
$dateIn = date("Y-m-d");
$timeIn = date("H:i:s");

// Select the database
mysqli_select_db($conn, $dbname);

// Example using prepared statements to prevent SQL injection for check-in
$stmt = $conn->prepare("INSERT INTO staff_data (regno, name, departmentYear, purpose, systemnumber, date_in, time_in) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $regno, $name, $departmentYear, $purpose, $systemnumber, $dateIn, $timeIn);

// Execute the prepared statement for check-in
if ($stmt->execute()) {
    echo "";
} else {
    echo "Error recording check-in. Please try again later.";
}

// Close prepared statement and connection
$stmt->close();
$conn->close();

?>


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
    background: linear-gradient(-135deg, #71b7e6 ,#9b59b6 );;
}
    </style>
</head>
<body>
    <div class="container">
        <form action="#" method="POST" id="loginForm">
            <img src="./img/tick.png">
            <h2>Thank You!</h2>
            <p>Your details has been successfully submitted. Thanks!</p>
            <button type="button">OK</button>

        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>