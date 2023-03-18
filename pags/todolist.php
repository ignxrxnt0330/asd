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
    <link rel="stylesheet" type="text/css" href="../css/todolist.css">
    <title>To-do list</title>

    <?php
        include("../templates/asd.php");
    ?>

    <div id="asd">
        <div id="menu">
            <button>Clear completed</button>
        </div>
        <?php
            $sql = "SELECT *  FROM todolist";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                  
                echo "<div id=todolist_item>";
                echo "<h2>" . $row["titulo"] . "</h2> <p>" . $row["fecha"] . "</p>";
                echo "<p>" . $row["descripcion"] . "</p>";
                echo "</div>";
                    
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