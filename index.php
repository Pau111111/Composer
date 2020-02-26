<?php
require './vendor/autoload.php';

use GuzzleHttp\Client;


$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://reqres.in/api/users?page=2',
    // You can set any number of default request options.
    'timeout'  => 5.0,
]);

// $client2 = new GuzzleHttp\Client(['base_uri' => 'https://reqres.in/api/users?page=2']);


// // Send a request to https://foo.com/api/test
// $response = $client->request('GET', 'test');
// // Send a request to https://foo.com/root
// $response = $client->request('GET', '/root');

echo "HEY!"
?>