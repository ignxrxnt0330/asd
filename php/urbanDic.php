<?php
// API endpoint URL
$url = 'https://api.urbandictionary.com/v0/words_of_the_day';

// Make the API request and retrieve the response
$response = file_get_contents($url);

// Convert the JSON response to an associative array
$data = json_decode($response, true);

// Get the first definition from the array
$definition = $data['list'][0]['definition'];

// Output the definition
echo $definition;
?>