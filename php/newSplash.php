<?php
    $splash = $_POST["splash"];
    if($splash!=""){
        file_put_contents("C:/xampp/htdocs/asd/misc/splashes.txt",$splash . PHP_EOL,FILE_APPEND);
    }
?>