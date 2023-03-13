<?php

require("db_connection.php");


  require("../templates/asd.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=icon type="image/png" href="../imgs/favicon.png">
    <link rel="stylesheet" type="text/css" href="../css/style_index.css">
    <title>To-do list</title>
</head>

    <div id="asd">
        <?php
            $sql = "SELECT titulo,descripcion ,completado  FROM todolist";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                  echo "titulo: " . $row["titulo"]. " - descripcion: " . $row["descripcion"]. " - completado: " . $row["completado"]. "<br>";
                }
              } else {
                echo "0 results";
              }
            
              mysqli_close($conn);
        ?>
    </div>
    </div>

</body>
</html>