<?php

// Your proxycheck.io API key
$apiKey = "160336-8915o3-794i5c-2y8800";

// IP address to check
$ip = $_SERVER['REMOTE_ADDR'];

// Construct the API URL
$url = "https://proxycheck.io/v2/$ip?key=$apiKey";

// Initialize cURL session
$curl = curl_init();

// Set cURL options
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CONNECTTIMEOUT => 10, // Timeout for connection establishment (seconds)
    CURLOPT_TIMEOUT => 30, // Total timeout for the cURL request (seconds)
    CURLOPT_FOLLOWLOCATION => true, // Follow redirects
    CURLOPT_MAXREDIRS => 3, // Maximum number of redirects to follow
    CURLOPT_SSL_VERIFYHOST => 2, // Verify the SSL certificate's host name
    CURLOPT_SSL_VERIFYPEER => true, // Verify the SSL certificate
    CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', // User agent string
));

// Execute cURL request
$response = curl_exec($curl);

// Check for errors
if ($response === false) {
    echo "Error occurred: " . curl_error($curl);
    // Handle error accordingly
} else {
    // Decode the JSON response
    $data = json_decode($response, true);

    // Check if the IP is flagged as a proxy
    if ($data[$ip]['proxy'] == 'yes') {
        echo "You are using a VPN or Proxy.";
    } else {
        echo "You are not using a VPN or Proxy.";
    }
}

// Close cURL session
curl_close($curl);
?>
