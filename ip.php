<?php

// Your proxycheck.io API key
$apiKey = "160336-8915o3-794i5c-2y8800";

// IP address to check
$ip = $_SERVER['REMOTE_ADDR'];

// Construct the API URL
$url = "https://proxycheck.io/v2/$ip?key=$apiKey";

// Make a request to proxycheck.io API
$response = file_get_contents($url);

// Decode the JSON response
$data = json_decode($response, true);

// Check if the IP is flagged as a proxy
if ($data[$ip]['proxy'] == 'yes') {
    // Check if the IP is also considered bad based on its score
    if ($data[$ip]['score'] >= 75) {
        echo "You are using a VPN or Proxy and your IP is flagged as bad.";
    } else {
        echo "You are using a VPN or Proxy but your IP is not flagged as bad.";
    }
} else {
    echo "You are not using a VPN or Proxy.";
}
?>
