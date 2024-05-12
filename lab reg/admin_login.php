<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="admin_login.css">
</head>
<body>
    <div class="container">
        <form id="loginForm" method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h2>Admin Login</h2>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="login">Login</button>
            <p id="error-msg"><?= isset($_GET['error']) ? htmlspecialchars($_GET['error']) : ''; ?></p>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "lab_reg";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $enteredUsername = $_POST["username"];
        $enteredPassword = $_POST["password"];

        $query = "SELECT * FROM admin WHERE username=? AND password=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $enteredUsername, $enteredPassword);

        if ($stmt->execute()) {
            header("Location: std_staff.php");
            exit();
        } else {
            echo "Invalid username or password";
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
