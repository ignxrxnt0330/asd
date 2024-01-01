<?php
require("C:/xampp/htdocs/asd/php/Todolist.php");
$id = $_GET['idcompl'];

Todolist::complete($id);

header("Location: http://localhost/pags/todolist.php");
?>