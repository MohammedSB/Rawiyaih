<?php 

$serverName = "localhost:3306";
$dBUsername = "root";
$dBPassword = "root";
$dBName = "rawiyaih";  


$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error()); $host = 'localhost';
}
?>