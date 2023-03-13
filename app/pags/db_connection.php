<?php
$servername = "localhost";
$username = "asd";
$password = "1234";
$db = "asd";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
?>