<?php

// Your proxycheck.io API key
$apiKey = "160336-8915o3-794i5c-2y8800";

// User's IP address
$userIP = $_SERVER['REMOTE_ADDR'];

// Construct the API URL with the user's IP address and API key
$url = "https://proxycheck.io/v2/$userIP?key=$apiKey&vpn=1&risk=1";

// Make a request to proxycheck.io API
$response = file_get_contents($url);

// Decode the JSON response
$data = json_decode($response, true);

// Check if the user's IP is found in the response
if (isset($data[$userIP])) {
    // Check if the IP is flagged as a proxy
    if ($data[$userIP]['proxy'] == 'yes') {
        // Check the risk score
        if ($data[$userIP]['risk'] >= 50) {
            echo "You are using a VPN or Proxy and your IP is flagged as bad.";
        } else {
            echo "You are using a VPN or Proxy but your IP is not flagged as bad.";
        }
        // Print additional details
        echo "\nType: " . $data[$userIP]['type'];
        echo "\nProvider: " . $data[$userIP]['provider'];
        echo "\nOrganisation: " . $data[$userIP]['organisation'];
        echo "\nRisk: " . $data[$userIP]['risk'];
    } else {
        echo "You are not using a VPN or Proxy.";
    }
} else {
    echo "Unable to retrieve information for your IP address.";
}
?>

