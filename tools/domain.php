<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domain WHOIS Lookup</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md md:w-96 w-full">
        <h2 class="text-3xl font-extrabold mb-6 text-gray-800">Domain WHOIS Lookup</h2>
        
        <?php
        require_once("../config.php");

        // Check if a domain is provided in the URL
        if (isset($_GET['domain'])) {
            $domain = $_GET['domain'];

            // Check if the domain is already in the database
            $checkDomainQuery = "SELECT * FROM domains WHERE domain_name = '$domain'";
            $result = $conn->query($checkDomainQuery);

            if ($result->num_rows > 0) {
                // Domain already in the database, do not create a new record
                echo '<p class="text-green-500 mt-4">Domain already in the database.</p>';
            } else {
                // Domain not in the database, proceed with WHOIS lookup
                $whois_data = get_domain_whois($domain);

                if ($whois_data) {
                    // Save the domain name to your database
                    $saveDomainQuery = "INSERT INTO domains (domain_name) VALUES ('$domain')";
                    $conn->query($saveDomainQuery);

                    // Display WHOIS information
                    echo '<div class="mt-4 bg-gray-100 p-4 rounded">';
                    echo '<pre>' . htmlspecialchars($whois_data) . '</pre>';
                    echo '</div>';
                } else {
                    echo '<p class="text-red-500 mt-4">Error fetching WHOIS information.</p>';
                }
            }
        } else {
            // Display the form for manual domain entry
            echo '<form method="post" action="/whois" class="space-y-4">';
            echo '<div>';
            echo '<label for="domain" class="block text-sm font-medium text-gray-600">Domain:</label>';
            echo '<input type="text" name="domain" required class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" value="' . (isset($_POST['domain']) ? $_POST['domain'] : '') . '">';
            echo '</div>';
            echo '<button type="submit" class="w-full bg-indigo-500 text-white py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring focus:border-indigo-300">Lookup</button>';
            echo '</form>';
        }

        function get_domain_whois($domain) {
            // Define WHOIS server based on domain extension
            $whois_servers = [
                'com' => 'whois.verisign-grs.com',
                'net' => 'whois.verisign-grs.com',
                'org' => 'whois.pir.org',
                // Add more domain extensions as needed
            ];

            $domain_parts = explode('.', $domain);
            $extension = strtolower(end($domain_parts));

            // Check if the WHOIS server is defined for the domain extension
            if (isset($whois_servers[$extension])) {
                $whois_server = $whois_servers[$extension];
                $port = 43;

                // Open a socket connection to the WHOIS server
                if ($fp = fsockopen($whois_server, $port, $errno, $errstr, 30)) {
                    // Send the domain query
                    fputs($fp, $domain . "\r\n");

                    // Read and collect the WHOIS response
                    $response = '';
                    while (!feof($fp)) {
                        $response .= fgets($fp, 128);
                    }

                    fclose($fp);

                    return $response;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        ?>

    </div>
</body>
</html>
