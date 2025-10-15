<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include 'includes/db.php';

// Handle delete action
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $stmt = $conn->prepare("DELETE FROM appointments WHERE id=?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    header("Location: dashboard.php");
    exit();
}

// Handle update action
$update_success = '';
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $note = $_POST['note'];

    $stmt = $conn->prepare("UPDATE appointments SET name=?, email=?, date=?, time=?, note=? WHERE id=?");
    $stmt->bind_param("sssssi", $name, $email, $date, $time, $note, $id);
    $stmt->execute();
    $update_success = "Appointment updated successfully!";
}

// Fetch all appointments
$result = $conn->query("SELECT * FROM appointments ORDER BY date, time");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .action-btn {
            padding: 5px 10px;
            margin: 0 5px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        .edit-btn { background-color: #ffc107; color: #000; }
        .edit-btn:hover { background-color: #e0a800; }
        .delete-btn { background-color: #dc3545; color: #fff; }
        .delete-btn:hover { background-color: #c82333; }
        .update-form {
            display: none;
            background: #f1f1f1;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        table th {
            background-color: #007bff;
            color: white;
            padding: 12px;
        }
        table td, table th {
            text-align: center;
        }
        table td { vertical-align: middle; }
    </style>
    <script>
        function toggleUpdateForm(id) {
            var form = document.getElementById('updateForm' + id);
            form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
        }
    </script>
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
    <?php if($update_success) echo "<p style='color:green;'>$update_success</p>"; ?>
    <?php
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['date']}</td>
                    <td>{$row['time']}</td>
                    <td>{$row['note']}</td>
                    <td>
                        <button class='action-btn edit-btn' onclick='toggleUpdateForm({$row['id']})'>Edit</button>
                        <a class='action-btn delete-btn' href='dashboard.php?delete_id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this appointment?\")'>Delete</a>
                    </td>
                  </tr>";

            // Update form hidden by default
            echo "<tr><td colspan='6'>
                    <div class='update-form' id='updateForm{$row['id']}'>
                        <form method='post'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <label>Name</label><input type='text' name='name' value='{$row['name']}' required>
                            <label>Email</label><input type='email' name='email' value='{$row['email']}' required>
                            <label>Date</label><input type='date' name='date' value='{$row['date']}' required>
                            <label>Time</label><input type='time' name='time' value='{$row['time']}' required>
                            <label>Note</label><textarea name='note'>{$row['note']}</textarea>
                            <button type='submit' name='update'>Update</button>
                        </form>
                    </div>
                  </td></tr>";
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
