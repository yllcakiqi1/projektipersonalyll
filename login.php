<?php
session_start();
include '../includes/db.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'guest' && $password === 'guest123') {
        $_SESSION['admin'] = 'Guest';
        $_SESSION['role'] = 'guest';
        header("Location: booking_form.php");
        exit();
    } else {
        $hashed = hash('sha256', $password);
        $stmt = $conn->prepare("SELECT * FROM admin_users WHERE username=? AND password=?");
        $stmt->bind_param("ss", $username, $hashed);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $_SESSION['admin'] = $username;
            $_SESSION['role'] = 'admin';
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $error = "Invalid username or password";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
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
</body>
</html>
