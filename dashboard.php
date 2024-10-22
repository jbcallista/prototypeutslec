<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

$user_role = $_SESSION['role'];

if ($user_role == 'admin') {
    // Admin Dashboard
    echo "<h2>Admin Dashboard</h2>";
    echo "<a href='create_event.php'>Create Event</a><br>";
    echo "<a href='view_events.php'>View Events</a><br>";
    echo "<a href='logout.php'>Logout</a>";
} else {
    // User Dashboard
    echo "<h2>User Dashboard</h2>";
    echo "<a href='view_events.php'>Browse Events</a><br>";
    echo "<a href='logout.php'>Logout</a>";
}
?>
