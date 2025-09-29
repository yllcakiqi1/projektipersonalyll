<?php include 'includes/db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Appointment</title>
</head>
<body>
    <h2>Book an Appointment</h2>
    <form action="book.php" method="post">
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Date: <input type="date" name="date" required><br><br>
        Time: 
        <select name="time" required>
            <option value="09:00:00">9:00 AM</option>
            <option value="10:00:00">10:00 AM</option>
            <option value="11:00:00">11:00 AM</option>
            <!-- Add more slots -->
        </select><br><br>
        Note (optional): <textarea name="note"></textarea><br><br>
        <button type="submit">Book</button>
    </form>
</body>
</html>
