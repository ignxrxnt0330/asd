<?php

    $splashes = file("C:/xampp/htdocs/asd/misc/splashes.txt", FILE_IGNORE_NEW_LINES); //abre el fichero ignorando los \n
    
    if ($splashes === false) {
    die("Error"); //no se ha leido correctamente
}

$splash = rand(0, count($splashes) - 1);
/*
// checks if the script is being executed from an ajax request, so it can answer accodrdingly
// the ajax request gets the data to be fetched from the echo, whilst when you inlcude the php script it does from the return
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    echo json_encode(['splash' => $splash]);// encodes the value of the splashes array to JSON
    //creates a data object and sets a property by the name of 'splash' and $splash as value 

} else {
    return  $splashes[$splash];
}
*/
echo json_encode(['splash' => $splashes[$splash]]);
?>