<?php
$servername = "db";
$username = "student";
$password = "student123";
$database = "playstation";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>