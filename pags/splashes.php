<?php

$splashes = fopen("C:/xampp/htdocs/asd/assets/splashes.txt","r");
$splash = rand(1,365);
$num_lineas=0;
while(!feof($splashes)) {
    $linea = fgets($splashes); // Get the next line in the file
    $num_lineas++; // Increment the counter variable
    if($num_lineas==$splash){
        echo $linea;
    }
}

fclose($splashes);

?>