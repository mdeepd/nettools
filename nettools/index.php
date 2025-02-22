<!--
License: None
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Network Diagnostic Tools</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <h1>Network Diagnostic Tools</h1>
        <p>Welcome to the Network Diagnostic Webpage. Here, you can analyze network connectivity, trace routes, look up domain information, and calculate subnets. Click on any tool below to get started.</p>
        
        <div class="menu">
            <div class="card">
                <h2>Ping</h2>
                <p>Test network connectivity by sending ICMP echo requests to a host.</p>
                <a href="ping.php">Use Ping</a>
            </div>

            <div class="card">
                <h2>Traceroute</h2>
                <p>Trace the path packets take to a destination host.</p>
                <a href="traceroute.php">Use Traceroute</a>
            </div>

            <div class="card">
                <h2>NSLookup</h2>
                <p>Query domain name system (DNS) records for a given hostname.</p>
                <a href="nslookup.php">Use NSLookup</a>
            </div>

            <div class="card">
                <h2>MTR</h2>
                <p>Combine ping and traceroute for real-time network analysis.</p>
                <a href="mtr.php">Use MTR</a>
            </div>

            <div class="card">
                <h2>Subnet Calculator</h2>
                <p>Calculate IPv4 or IPv6 subnet details based on CIDR notation.</p>
                <a href="subnet.php">Use Subnet Calculator</a>
            </div>

            <div class="card">
                <h2>WHOIS Lookup</h2>
                <p>Get domain registration and ownership details using WHOIS lookup.</p>
                <a href="whois.php">Use WHOIS Lookup</a>
            </div>
        </div>
    </div>
</body>
</html>
