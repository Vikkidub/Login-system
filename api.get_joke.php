<!-- Requesting joke from https://icanhazdadjoke.com/ -->


<?php

$url = 'https://icanhazdadjoke.com/';
$options = array(
    'http' => array(
        'header' => "Accept: application/json\r\n" .
            "User-Agent: Vikkidub (https://github.com/Vikkidub/Login-system, viktors@getacademy.no)\r\n"
    )
);
$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);
$data = json_decode($response);

if ($data !== null) {
    $joke = $data->joke;
    echo $joke;
} else {
    echo "Error fetching joke.";
}

