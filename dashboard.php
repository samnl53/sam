<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <title>داشبورد</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div id="logo">
            <a href="index.html">
                <img id="imglogo" src="logoo.png" alt="لوگو">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="index.html">خانه</a></li>
                <li><a href="about.html">درباره ما</a></li>
                <li><a href="contact.html">تماس با ما</a></li>
                <li><a href="logout.php">خروج</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>خوش آمدید, <?php echo $_SESSION['username']; ?>!</h1>
        <p>این داشبورد کاربری شماست.</p>
    </main>
    <footer>
        <p>&copy; 2025 وبسایت نمونه</p>
    </footer>
</body>
</html>
