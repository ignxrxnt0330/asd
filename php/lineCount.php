<?php

if(isset($_COOKIE["lineCount"])){
    $lc = $_COOKIE["lineCount"] . " lines of code";
}
else{
    exec("C:/Python311/python.exe C:/xampp/htdocs/asd/py/lineCount.py  2>&1",$lineCount,$exitCode);
    if($exitCode==0){
            setcookie("lineCount",implode($lineCount),time()+600,"/pags/index.php");
            $lc=implode($lineCount) . " lines of code";// the output is an array, implode() converts it into an String
    }
    else{
        $lc = "Error counting lines, exit code $exitCode";
    }
}

echo "<div class=lineCount>" . $lc . "</div>";

    

?>