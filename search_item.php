<?php
// Database configurations
$host = 'localhost';
$dbname = 'karibu';
$user = 'root';
$password = '';

$itemname = $_POST['itemname'];

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = array();

$itemname = $conn->real_escape_string($itemname);

$sql = "SELECT * FROM sales WHERE description LIKE '%$itemname%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();

echo json_encode($data);
?>
