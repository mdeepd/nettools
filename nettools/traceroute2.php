<!--
License: None
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traceroute</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Traceroute Tool</h2>
        <p>Select a server location and enter a hostname or IP address to trace the route.</p>

        <form method="post">
            <label for="server">Select Server Location:</label>
            <select name="server" required>
                <option value="local">India - Kochi</option>
                <option value="server1">US - New York</option>
                <option value="server2">Germany - Frankfurt</option>
            </select>
              <div><br></div>
            <input type="text" name="host" placeholder="Enter hostname or IP" required>
          <div><br></div>
            <input type="submit" value="Run Traceroute">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $host = escapeshellarg($_POST["host"]);
            $server = $_POST["server"];

            // Define remote servers
            $servers = [
                "local" => "localhost",
                "server1" => "root@159.223.106.179",  // Replace with actual IP
                "server2" => "user@192.168.1.102"   // Replace with actual IP
            ];

            if (!empty($host) && isset($servers[$server])) {
                if ($server == "local") {
                    // Run traceroute on the main server
                    $output = shell_exec("traceroute $host 2>&1");
                } else {
                    // Run traceroute on a remote server via SSH
                    $remote_server = $servers[$server];
                    $output = shell_exec("ssh -i /var/www/.ssh/id_rsa -o StrictHostKeyChecking=no $remote_server 'traceroute $host' 2>&1");
                }

                // Save output to a file
                $filename = "reports/traceroute_" . time() . ".txt";
                file_put_contents($filename, $output);
                
                // Display the output
                echo '<pre class="traceroute-output">' . htmlspecialchars($output) . '</pre>';
                echo '<a class="download-btn" href="' . $filename . '" download>Download Report</a>';
            }
        }
        ?>

        <a class="back-link" href="index.php">← Back to Home</a>
    </div>
</body>
</html>
