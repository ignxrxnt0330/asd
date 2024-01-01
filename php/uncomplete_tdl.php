<?php
require("C:/xampp/htdocs/asd/php/Todolist.php");
$id = $_GET['iddesc'];

Todolist::uncomplete($id);

header("Location: http://localhost/pags/todolist.php");
?>