<?php
require("C:/xampp/htdocs/asd/php/Todolist.php");
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];
if(!($titulo==""&&$descripcion=="")){
    Todolist::insert($titulo,$descripcion,$fecha);
}

header("Location: http://localhost/pags/todolist.php");
exit();
?>