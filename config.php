10<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "playstation";

$conn = mysqli_connect($servername, $username, $password, $playstation);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>