<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $date  = $_POST['date'];
    $time  = $_POST['time'];
    $note  = $_POST['note'];

    // Check if slot already booked
    $stmt = $conn->prepare("SELECT * FROM appointments WHERE date = ? AND time = ?");
    $stmt->bind_param("ss", $date, $time);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "This time slot is already booked.";
    } else {
        $stmt = $conn->prepare("INSERT INTO appointments (name, email, date, time, note) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $date, $time, $note);
        $stmt->execute();
        echo "Appointment booked successfully!";
    }

    $stmt->close();
    $conn->close();
}
?>
