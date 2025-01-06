<?php
session_start();
include 'db_connect.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the hashed password
        if (password_verify($password, $row['password'])) {
            // Login successful
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
        } else {
            $message = "رمز عبور اشتباه است.";
        }
    } else {
        $message = "نام کاربری وجود ندارد.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <title>صفحه ورود</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-container">
            <h2>ورود به سایت</h2>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">نام کاربری</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">رمز عبور</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" id="login-btn">ورود</button>
            </form>
            <?php
            if ($message != "") {
                echo "<p class='message'>$message</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
