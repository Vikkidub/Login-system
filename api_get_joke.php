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

if ($response === false) {
    echo "Error fetching joke. Check your network connection or try again later.";
} else {
    $data = json_decode($response);

    if ($data !== null && isset($data->joke)) {
        $joke = $data->joke;
        header("Location: dashboard.php?joke=" . urlencode($joke));
        exit;
    } else {
        echo "Error parsing joke data.";
    }
}
