<?php

$splashes = file("C:/xampp/htdocs/asd/misc/splashes.txt", FILE_IGNORE_NEW_LINES); //abre el fichero ignorando los \n

if ($splashes === false) {
    die("Error"); //no se ha leido correctamente
}

$splash = rand(0, count($splashes) - 1);

echo "<div class='splash'>";
echo $splashes[$splash];
echo "</div>";

?>