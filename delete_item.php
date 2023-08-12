<?php

//databas configurations
$host = 'localhost';
$dbname = 'karibu';
$user = 'root';
$password = '';

$id = intval($_POST['id']);

$conn = new mysqli($host, $user, $password, $dbname);

$sql = "DELETE FROM sales WHERE id=$id";

$result = $conn->query($sql);

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

$conn->close();
?>