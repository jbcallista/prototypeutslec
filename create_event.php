<?php
include 'db.php';
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();  // Tambahkan exit untuk memastikan script berhenti jika pengguna bukan admin
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $max_participants = $_POST['max_participants'];

    $sql = "INSERT INTO events (event_name, event_date, event_time, location, description, max_participants) 
            VALUES ('$event_name', '$event_date', '$event_time', '$location', '$description', '$max_participants')";

    if (mysqli_query($conn, $sql)) {
        echo "Event created successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!-- HTML Form for Event Creation -->
<form action="create_event.php" method="POST">
    <input type="text" name="event_name" placeholder="Event Name" required><br>
    <input type="date" name="event_date" required><br>
    <input type="time" name="event_time" required><br>
    <input type="text" name="location" placeholder="Location" required><br>
    <textarea name="description" placeholder="Event Description"></textarea><br>
    <input type="number" name="max_participants" placeholder="Max Participants" required><br>
    <input type="submit" value="Create Event">
</form>
