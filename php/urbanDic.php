<?php
// API endpoint URL
$url = 'https://api.urbandictionary.com/v0/words_of_the_day';

// Make the API request and retrieve the response
$response = file_get_contents($url);

// Convert the JSON response to an associative array
$data = json_decode($response, true);

// def pilla la definicion
$def = $data['list'][0]['definition'];
session_start();

$_SESSION['definition'] = $def;
?>