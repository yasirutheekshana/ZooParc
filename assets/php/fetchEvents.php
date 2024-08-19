<?php
// Database connection details
$host = 'localhost';
$db = 'zooparc'; // Use your database name
$user = 'root';  // Your database username
$pass = '';      // Your database password

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch events
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

// Prepare an array to store events
$events = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}

// Close connection
$conn->close();

// Return events as JSON
echo json_encode($events);
?>
