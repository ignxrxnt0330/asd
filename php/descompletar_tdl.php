<?php

require("C:/xampp/htdocs/asd/pags/db_connection.php");

$id = $_GET['iddesc'];

$sql = "update todolist set completado=0 where id=$id";
mysqli_query($conn, $sql);

mysqli_close($conn);

include("C:/xampp/htdocs/asd/pags/todolist.php");
?>