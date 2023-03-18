<?php

require("db_connection.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=icon type="image/png" href="../imgs/favicon.png">
    <link rel="stylesheet" type="text/css" href="../css/braindump.css">
    <title>Brain dump</title>
 
    <?php
        include("../templates/asd.php");
    ?>

    <div id="asd">

    <form>

        

    </form>

    <?php
            $sql = "SELECT *  FROM braindump";
            $result = mysqli_query($conn, $sql);
            echo "<ul>";
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                  if($row["completado"]==0){
                      echo "<li id=braindump_item>";
                      echo "<p><input type=checkbox id=boton_completar></input>" . $row["texto"] . "</p>";
                      echo "</li>";
                    }
                    
                }
              } else {
                echo "brain dump is empty";
              }
            
              mysqli_close($conn);
              echo "</ul>";
        ?>
    </div>
    </div>

</body>
</html>