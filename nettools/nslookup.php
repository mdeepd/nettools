<!--
License: None
-->
<!DOCTYPE html>
<html>
<head>
    <title>NSLookup Tool</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>NSLookup a Domain</h2>
    <form method="post">
        <input type="text" name="domain" placeholder="Enter domain">
        <input type="submit" value="Lookup">
    </form>
    <pre>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $domain = escapeshellarg($_POST["domain"]);
        if (!empty($domain)) {
            echo shell_exec("nslookup " . $domain);
        }
    }
    ?>
    </pre>
    <a href="index.php">Back</a>
</body>
</html>
