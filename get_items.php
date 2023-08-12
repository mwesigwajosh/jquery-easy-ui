<?php
$host = 'localhost';
$dbname = 'karibu';
$user = 'root';
$password = '';

// Create a new mysqli connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM sales";

$data = array();

$result = $conn->query($sql);

//check if database isnot empty first
if ($result->num_rows > 0) {
    // for each data base row, we fetch as an associative array
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

// Close the connection when done
$conn->close();
?>