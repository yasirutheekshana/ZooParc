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

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id'])) {
    $eventId = $data['id'];
    $eventName = $data['event_name'];
    $eventDescription = $data['description'];
    $eventDate = $data['event_date'];
    $eventTime = $data['event_time'];

    $sql = "UPDATE events SET event_name = ?, description = ?, event_date = ?, event_time = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $eventName, $eventDescription, $eventDate, $eventTime, $eventId);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "Error updating event: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "No event ID provided"]);
}

$conn->close();
?>
