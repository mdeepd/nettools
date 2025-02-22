<!--
License: None
-->
<!DOCTYPE html>
<html>
<head>
    <title>Subnet Calculator</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>IPv4/IPv6 Subnet Calculator</h2>
    <form method="post">
        <input type="text" name="cidr" placeholder="Enter CIDR (e.g., 192.168.1.0/24)">
        <input type="submit" value="Calculate">
    </form>
    <pre>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cidr = escapeshellarg($_POST["cidr"]);
        if (!empty($cidr)) {
            echo shell_exec("ipcalc " . $cidr);
        }
    }
    ?>
    </pre>
    <a href="index.php">Back</a>
</body>
</html>
