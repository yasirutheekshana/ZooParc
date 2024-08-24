<?php
$servername = "localhost";  // Replace with your database server name
$username = "root";          // Replace with your database username
$password = "";              // Replace with your database password
$dbname = "zooparc";         // Replace with your database name

$eventId = $_POST['id'];
$name = $_POST['Ename'];
$description = $_POST['Edesc'];
$date = $_POST['Edate'];
$time = $_POST['Etime'];

// Your database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE events SET event_name = '$name', description = '$description', event_date = '$date', event_time = '$time' WHERE id = $eventId";

if ($conn->query($sql) === TRUE) {
    echo "Event updated successfully";
    header('Location: ../../events.html'); // Redirect back to events page
} else {
    echo "Error updating event: " . $conn->error;
}

$conn->close();
?>

