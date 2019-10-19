<?php 
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'http://omdbapi.com', [
    'query' => [
        'apikey' => 'dca61bcc',
        's' => 'avengers'
    ]
]);

echo $response->getBody()->getContents();

?>