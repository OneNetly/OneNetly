<?php

// Replace with your actual list of ProxyCheck.io API keys
$apiKeys = ['160336-8915o3-794i5c-2y8800', '8nd720-8w8x76-843872-y21h69', '813532-804m05-008w3s-1k76q6'];
$apiKeyIndex = 0;

function getNextApiKey() {
    global $apiKeys, $apiKeyIndex;
    
    $apiKey = $apiKeys[$apiKeyIndex];
    $apiKeyIndex = ($apiKeyIndex + 1) % count($apiKeys); // Rotate to the next API key

    return $apiKey;
}

function isProxyOrVpn($ip) {
    // Get the next available API key
    $apiKey = getNextApiKey();

    // Make a request to ProxyCheck.io API
    $url = "http://proxycheck.io/v2/$ip?key=$apiKey&vpn=1";
    $response = file_get_contents($url);

    if ($response === false) {
        // Handle API request failure
        return false;
    }

    // Decode the JSON response
    $data = json_decode($response, true);

    // Check if the IP is a proxy, VPN, or Tor exit
    return isset($data[$ip]) && ($data[$ip]['proxy'] == 'yes' || $data[$ip]['vpn'] == 'yes' || $data[$ip]['tor'] == 'yes');
}

function isHostingIp($ip) {
    // Add your own logic for checking if the IP belongs to a hosting provider
    // This is a simple example; you may need a more comprehensive solution based on your requirements.
    $hostingIps = ['1.2.3.4', '5.6.7.8'];

    return in_array($ip, $hostingIps);
}

function isSuspiciousIp($ip) {
    // Implement your own logic for checking suspicious IPs
    // This is a simple example; you may need a more comprehensive solution based on your requirements.
    $suspiciousIps = ['1.2.3.4', '5.6.7.8'];

    return in_array($ip, $suspiciousIps);
}

// Get the user's IP address
$userIp = $_SERVER['REMOTE_ADDR'];

if (isSuspiciousIp($userIp)) {
    echo 'Suspicious IP detected. Access denied.';
} elseif (isProxyOrVpn($userIp)) {
    echo 'Proxy, VPN, or Tor exit detected. Please disable it.';
} elseif (isHostingIp($userIp)) {
    echo 'Hosting provider IP detected. Please use a personal IP.';
} else {
    echo 'No proxy, VPN, Tor exit, or hosting provider IP detected. You can proceed.';
    // Continue with your regular logic.
}

?>
