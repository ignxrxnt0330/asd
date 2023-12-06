<?php

require('C:\xampp\htdocs\asd\pags\db_connection.php')

?>

<div id="insertar">
<form action="nuevoItem_tdl.php" method="post">
    <input type="text" id="titulo" name="titulo" placeholder="asd" autocomplete="off"><br>
    
    <input type="text" id="descripcion" name="descripcion" placeholder="asdasdasdasdasd" autocomplete="off"><br>

    <input type="text" id="fecha" name="fecha" placeholder="asd-asd-asd" autocomplete="off"><br>

    <input type="submit" value="Submit">
</form>

</div>
<div id="todolist_items">
<?php
include('../pags/db_connection.php')

        $sql = "SELECT count(*) as numItems  FROM todolist where completado=0";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
$items=$row['numItems'];
echo "$items items";
}
}

$sql = "SELECT *  FROM todolist where completado=0 order by fecha,id desc";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    $idcompl=$row['id'];
        echo "<a href='completar_tdl.php?idcompl=$idcompl'><div id=todolist_item>";
        echo "<h2>" . $row["titulo"] ."  ". $row["fecha"] . "</h2> <p>" . $row["descripcion"] ."</p>";
        echo "</div></a>";                    
    }
  } else {
    echo "No hay items que mostrar";
  }

?>
</div>

<!--- Items completados --->
<div id="completados">
<hr>
<input type="checkbox" id="cerrar">
   Completados
</input>
<?php
   $sql = "SELECT count(*) as numItems  FROM todolist where completado=1";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
       while($row = mysqli_fetch_assoc($result)) {
       $items=$row['numItems'];
       echo "$items items";
       }
   }
        $sql = "SELECT *  FROM todolist where completado=1 order by fecha" ;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
$iddesc=$row['id'];
    echo "<div id=todolist_item_completado><a href='descompletar_tdl.php?iddesc=$iddesc'>";
    echo "<h2>" . $row["titulo"] ."  ". $row["fecha"] . "</h2> <p>" . $row["descripcion"] ."</p>";
    echo "</a></div>";

    
}
} else {
echo "0 results";
}
?>
<div>
