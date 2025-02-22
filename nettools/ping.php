<!--
License: None
-->
<!DOCTYPE html>
<html>
<head>
    <title>Ping Tool</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Ping a Host</h2>
    <form method="post">
        <input type="text" name="host" placeholder="Enter hostname or IP">
        <input type="submit" value="Ping">
    </form>
    <pre>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $host = escapeshellarg($_POST["host"]);
        if (!empty($host)) {
            echo shell_exec("ping -c 4 " . $host);
        }
    }
    ?>
    </pre>
    <a href="index.php">Back</a>
</body>
</html>
