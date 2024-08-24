<?php
// Fetch the event details from the database using the event ID
$eventId = $_GET['id'];
// Your database connection
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "zooparc"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM events WHERE id = $eventId";
$result = $conn->query($sql);
$event = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="stylesheet" href="../ZooParc/assets/css/signUpStyle.css">
</head>
<body>
    <div class="container">
        <div class="login form">
            <header>Edit Event</header>
            <form action="/ZooParc/assets/php/updateEvent.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $event['id']; ?>">
                <input type="text" name="Ename" placeholder="Enter event name" value="<?php echo $event['event_name']; ?>" required>
                <input type="text" name="Edesc" placeholder="Enter description" value="<?php echo $event['description']; ?>" required>
                <input type="date" name="Edate" value="<?php echo $event['event_date']; ?>" required>
                <input type="time" name="Etime" value="<?php echo $event['event_time']; ?>" required>
                <input type="submit" class="button" value="Update">
            </form>
        </div>
    </div>
</body>
</html>
