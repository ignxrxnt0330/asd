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
        include("../templates/asd.php");
    ?>
    
    <div id="asd">
        <div id="insertar">
            <form action="../php/nuevoItem_tdl.php" method="post">
                <input type="text"  name="titulo" placeholder="asd" autocomplete="off"><br>
                
                <input type="text"  name="descripcion" placeholder="asdasdasdasdasd" autofocus autocomplete="off"><br>

                <input type="text" id="fecha" name="fecha" placeholder="asd-asd-asd" autocomplete="off"><br>

                <input type="submit" value="Submit">
            </form>
            
        </div>
        <div id="todolist_items">
            <?php
            echo count($todolist) . " items";

            
            if (count($todolist)>0) {
                    foreach ($todolist as $item){
                    echo "<a href='../php/completar_tdl.php?idcompl=$item->id'><div id=todolist_item>";
                    echo "<h2>" . $item->titulo ."  ". $item->fecha . "</h2> <p>" . $item->descripcion ."</p>";
                    echo "</div></a>";                    
                    }
                }
               else {
                echo "No hay items que mostrar";
              }
            
            ?>
            </div>
        
            <!--- Items completados --->
        <div id="completados">
            <hr>
            <input type="checkbox" id="cerrar">
               Completados - <?=count($compl)?>
            </input>
            <?php

        if (count($compl)) {
            foreach($compl as $item) {
                echo "<div id=todolist_item_completado><a href='../php/descompletar_tdl.php?iddesc=$item->id'>";
                echo "<h2>" . $item->titulo ."  ". $item->fecha . "</h2> <p>" . $item->descripcion ."</p>";
                echo "</a></div>";
            }
            } else {
            echo "0 results";
            }
            ?>
        <div>
    </div>

</body>
</html>