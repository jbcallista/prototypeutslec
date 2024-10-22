<?php
include 'db.php';
session_start();

if (isset($_GET['event_id']) && isset($_SESSION['user_id'])) {
    $event_id = $_GET['event_id'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO registrations (user_id, event_id) VALUES ('$user_id', '$event_id')";

    if (mysqli_query($conn, $sql)) {
        echo "Successfully registered for the event!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
