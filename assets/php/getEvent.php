<?php
header('Content-Type: application/json');
$servername = "localhost"; // Replace with your database server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "zooparc"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]));
}

if (isset($_GET['id'])) {
    $eventId = $_GET['id'];
    $sql = "SELECT id, event_name, description, event_date, event_time FROM events WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eventId);
    $stmt->execute();
    $result = $stmt->get_result();
    $event = $result->fetch_assoc();
    echo json_encode($event);
    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "No event ID provided"]);
}

$conn->close();
?>
