<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include 'includes/db.php';
$result = $conn->query("SELECT * FROM appointments ORDER BY date, time");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar">
    <div class="logo"><a href="index.php">AppointmentPro</a></div>
    <div class="nav-links">
        <span>Welcome, <?php echo $_SESSION['admin']; ?></span>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<div class="container">
    <h3>All Appointments</h3>
    <?php
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Note</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['date']}</td>
                    <td>{$row['time']}</td>
                    <td>{$row['note']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No appointments found.</p>";
    }
    $conn->close();
    ?>
</div>

<footer>
    <p>© 2025 AppointmentPro. All rights reserved.</p>
</footer>
</body>
</html>
