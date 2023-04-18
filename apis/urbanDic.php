<?php

if (isset($_COOKIE['word'])) {
    $cookieExpiration = $_COOKIE['word'];
    if (time() > $cookieExpiration) {
        // API endpoint URL
$url = 'https://api.urbandictionary.com/v0/words_of_the_day';

// Make the API request and retrieve the response
$response = file_get_contents($url);

// Convert the JSON response to an associative array
$data = json_decode($response, true);

// pilla los datos de la api y los mete en cookies que duran 6h, para que se vaya actualizando

setcookie('word', $data['list'][0]['word'], time() + 16300, '/');
setcookie('def', $data['list'][0]['definition'], time() + 16300, '/');
setcookie('thumbs_up', $data['list'][0]['thumbs_up'], time() + 16300, '/');
setcookie('thumbs_down', $data['list'][0]['thumbs_down'], time() + 16300, '/');
setcookie('link', $data['list'][0]['permalink'], time() + 16300, '/');
}
}

echo "<a href='" . $_COOKIE['link'] . "' id='word' target='_blank'>" . $_COOKIE['word'] . "</a> \n";
echo $_COOKIE['def']; 
echo " <span id=thumbs> <span id=thumbs_up>". $_COOKIE['thumbs_up'] . "</span>   <span id=thumbs_down>" . 
                                             $_COOKIE['thumbs_down'] . "</span> </span>";
?>