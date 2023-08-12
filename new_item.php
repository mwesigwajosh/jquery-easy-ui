<?php
//databas configurations
$host = 'localhost';
$dbname = 'karibu';
$user = 'root';
$password = '';

//form data
$date = new DateTime($_POST['date']); // at first the date comes as a string so we format it into a date
$date = $date->format("Y-m-d"); //  then we use the year, month and day
$rtc = intval ($_POST['rtc']);
$description = $_POST['description'];
$quantity = intval ($_POST['quantity']);
$unitprice = intval ( $_POST['unitprice']);

//calculating total amount and VAT(18%)
$totalamount = $quantity * $unitprice;

$vat = $unitprice * $quantity * 0.18;

// Create a new mysqli connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO sales (date, rtc, description, quantity, unitprice, totalamount, vat) VALUES ('$date', '$rtc', '$description', '$quantity', '$unitprice', '$totalamount', '$vat')";

$conn->query($sql);

$conn->close();

?>