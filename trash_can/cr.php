<?php
$url="https://api.clashroyale.com/v1/players/%23GL8JGRCV";
$response = file_get_contents($url);

$data = json_decode($response, true);

echo $data['name']

?>