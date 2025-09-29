<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['admin']; ?></h2>
    <a href="logout.php">Logout</a>
    <hr>
    <h3>All Appointments</h3>

    <?php
    include '../includes/db.php';
    $result = $conn->query("SELECT * FROM appointments ORDER BY date, time");

    if ($result->num_rows > 0) {
        echo "<table border='1' cellpadding='5'><tr><th>Name</th><th>Email</th><th>Date</th><th>Time</th><th>Note</th></tr>";
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
        echo "No appointments found.";
    }

    $conn->close();
    ?>
</body>
</html>
