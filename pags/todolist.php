<?php

require("../php/Todolist.php");

$todolist = Todolist::getTodolist();
$compl = Todolist::getCompl();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=icon type="image/png" href="../imgs/favicon.png">
    <link rel="stylesheet" type="text/css" href="../css/todolist.css">
    <title>To-do list</title>

    <?php
    include("../include/asd.php");
    ?>

    <div id="asd">
        <div id="insertar">
            <form action="../php/new_item_tdl.php" method="post">
                <input type="text" name="titulo" placeholder="asd" autocomplete="off"><br>

                <input type="text" name="descripcion" placeholder="asdasdasdasdasd" autofocus autocomplete="off"><br>

                <input type="text" id="fecha" name="fecha" placeholder="asd-asd-asd" autocomplete="off"><br>

                <input type="submit" value="Submit">
            </form>
        </div>

        <div id="todolist_items">
            <?php Todolist::create_items(); ?>
        </div>

        <!--- Complete items --->
        <div id="complete">
            <hr>
            <input type="checkbox" id="cerrar"/>
            <?php Todolist::create_compl(); ?>
            <div>
            </div>

            </body>

</html>