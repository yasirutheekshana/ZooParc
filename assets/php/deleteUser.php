<?php
header('Content-Type: application/json');
$servername = "localhost"; // Replace with your database server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "zooparc"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

if (isset($_POST['id'])) {
    $userId = intval($_POST['id']);
    $sql = "DELETE FROM users WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            echo json_encode(["success" => "User deleted successfully."]);
        } else {
            echo json_encode(["error" => "Error deleting user: " . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(["error" => "Preparation of statement failed: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "User ID not provided."]);
}

$conn->close();
?>
