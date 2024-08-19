<?php
// Start session if needed
session_start();

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

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $eventName = $conn->real_escape_string($_POST['Ename']);
    $eventDesc = $conn->real_escape_string($_POST['Edesc']);
    $eventDate = $conn->real_escape_string($_POST['Edate']);
    $eventTime = $conn->real_escape_string($_POST['Etime']);

    // Prepare SQL statement to prevent SQL injection
    $sql = "INSERT INTO events (event_name, description, event_date, event_time) 
            VALUES ('$eventName', '$eventDesc', '$eventDate', '$eventTime')";

    // Execute query and prepare response
    $response = [];
    if ($conn->query($sql) === TRUE) {
        $response['status'] = 'success';
        $response['message'] = 'New event added successfully';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error: ' . $conn->error;
    }

    // Close connection
    $conn->close();

    // Send JSON response
    echo json_encode($response);
}
?>
