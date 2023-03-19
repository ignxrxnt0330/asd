<?php
require("C:/xampp/htdocs/asd/pags/db_connection.php");

$id = $_GET['idcompl'];

$sql = "update todolist set completado=1 where id=$id";
mysqli_query($conn, $sql);

mysqli_close($conn);
?>