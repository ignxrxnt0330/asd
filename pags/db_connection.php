<?php
function getConn(){

   $conn = mysqli_connect("localhost", "asd", "1234","asd");
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
return $conn;
}
?>