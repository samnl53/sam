<?php
include 'db_connect.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // Sign-up successful
        $message = "ثبت‌نام با موفقیت انجام شد. حالا می‌توانید وارد شوید.";
    } else {
        $message = "خطایی رخ داد: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <title>صفحه ثبت‌نام</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="signup-wrapper">
        <div class="signup-container">
            <h2>ثبت‌نام در سایت</h2>
            <form action="signup.php" method="post">
                <div class="form-group">
                    <label for="username">نام کاربری</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">رمز عبور</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" id="signup-btn">ثبت‌نام</button>
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
