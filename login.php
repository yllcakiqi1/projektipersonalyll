<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar">
    <div class="logo"><a href="index.php">AppointmentPro</a></div>
    <div class="nav-links">
        <a href="index.php">Home</a>
    </div>
</nav>

<div class="container">
    <h2>Login</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p class="error"><?php echo $error; ?></p>
    <p>Guest login: username <b>guest</b>, password <b>guest123</b></p>
</div>

<footer>
    <p>© 2025 AppointmentPro. All rights reserved.</p>
</footer>

</body>
</html>

