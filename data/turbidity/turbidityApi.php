<?php


$url = 'https://thingspeak.com/channels/2228069/field/3.json';

// Create a new cURL resource
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);

// Execute the cURL request and get the response
$response = curl_exec($ch);

// Close cURL resource
curl_close($ch);

header('Content-Type: application/json');

// Output the JSON-encoded data
echo json_encode($response);


?>