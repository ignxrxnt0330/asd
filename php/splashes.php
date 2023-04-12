<?php

$splashes = fopen("C:/xampp/htdocs/asd/misc/splashes.txt","r");

$splash = rand(1,375);
$num_lineas=0;
while(!feof($splashes)) {
    $linea = fgets($splashes); // Get the next line in the file
    $num_lineas++; // Increment the counter variable
    if($num_lineas==$splash){
        echo "<div id='splash'>";
        echo $linea;
        echo "</div>";
        break;
    }
}

fclose($splashes);

?>