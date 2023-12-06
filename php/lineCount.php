<?php

$folder = "C:/xampp/htdocs/asd";
$file = glob($folder); // pilla los files individuales del folder
$lines=0;

foreach ($file as $file2){
  $ffile = file($file2);
  $ffile_lines=count($ffile);

  $lines+=$ffile_lines;
}

?>