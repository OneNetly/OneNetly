<?php

// Your proxycheck.io API key
$apiKey = "160336-8915o3-794i5c-2y8800";

// IP address to check
$ip = "37.60.48.2";

// Construct the API URL with all features
$url = "https://proxycheck.io/v2/$ip?key=$apiKey&vpn=1&asn=1&risk=1&port=1&seen=1&days=7&tag=msg";

// Make a request to proxycheck.io API
$response = file_get_contents($url);

// Decode the JSON response
$data = json_decode($response, true);

// Check if the IP is flagged as a proxy
if ($data[$ip]['proxy'] == 'yes') {
    // Check if the IP is also considered bad based on its score
    if ($data[$ip]['score'] >= 50) {
        echo "You are using a VPN or Proxy and your IP is flagged as bad.";
    } else {
        echo "You are using a VPN or Proxy but your IP is not flagged as bad.";
    }
    // Print additional details
    echo "\nASN: " . $data[$ip]['asn'];
    echo "\nRisk: " . $data[$ip]['risk'];
    echo "\nPort: " . $data[$ip]['port'];
    echo "\nLast Seen: " . $data[$ip]['last_seen'];
    echo "\nCustom Tag: " . $data[$ip]['msg']; // Assuming 'msg' is the custom tag name
} else {
    echo "You are not using a VPN or Proxy.";
}
?>
