<?php
// Database configurations
$host = 'localhost';
$dbname = 'karibu';
$user = 'root';
$password = '';

$startDate = new DateTime($_POST['startdate']);
$startDate = $startDate -> format('Y-m-d');

$endDate = new DateTime($_POST['enddate']);
$endDate = $endDate -> format('Y-m-d');

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM sales WHERE date BETWEEN '$startDate' AND '$endDate'";

$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

$conn->close();
?>