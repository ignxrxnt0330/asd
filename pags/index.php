
<?php
        include("C:/xampp/htdocs/asd/php/splashes.php");
        $splash = getSplash();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=icon type="image/png" href="../imgs/favicon.png">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <title><?=$splash?></title>
 
    <?php
    include("../templates/asd.php");
    ?>

    <div id="asd">
        <?php
        echo "<div class='splash'>";
        echo $splash;
        echo "</div>";

        include("C:/xampp/htdocs/asd/php/lineCount.php");
        ?>
    </div>

</body>
</html>