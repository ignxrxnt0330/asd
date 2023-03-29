<?php
require("C:/xampp/htdocs/asd/pags/db_connection.php");

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];

$sql = "insert into todolist(titulo,descripcion,fecha,completado) values('$titulo','$descripcion','$fecha',0)";
mysqli_query($conn, $sql);

mysqli_close($conn);
?>