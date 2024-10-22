<?php
include 'db.php';
session_start();

$sql = "SELECT * FROM events WHERE status='open'";
$result = mysqli_query($conn, $sql);

while ($event = mysqli_fetch_assoc($result)) {
    echo "<h3>" . $event['event_name'] . "</h3>";
    echo "<p>Date: " . $event['event_date'] . "</p>";
    echo "<p>Location: " . $event['location'] . "</p>";
    echo "<a href='register_event.php?event_id=" . $event['id'] . "'>Register</a><br>";
}
?>
