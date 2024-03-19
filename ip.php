<?php
// Your proxycheck.io API key
$apiKey = "160336-8915o3-794i5c-2y8800";

// IP address to check
$ip = $_SERVER['REMOTE_ADDR'];

// User Agent string
$userAgent = $_SERVER['HTTP_USER_AGENT'];

// Construct the API URL
$url = "https://proxycheck.io/v2/$ip?key=$apiKey&&vpn=1";

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
        echo "IP Address: $ip - You are using a VPN or Proxy.";
    } else {
        echo "IP Address: $ip - You are not using a VPN or Proxy.";
    }
}

// Close cURL session
curl_close($curl);
?>