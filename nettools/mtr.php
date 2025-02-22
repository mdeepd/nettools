<!--
License: None
-->
<!DOCTYPE html>
<html>
<head>
    <title>MTR Tool</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>MTR a Host</h2>
    <form method="post">
        <input type="text" name="host" placeholder="Enter hostname or IP">
        <input type="submit" value="Run MTR">
    </form>
    <pre>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $host = escapeshellarg($_POST["host"]);
        if (!empty($host)) {
            echo shell_exec("mtr --report " . $host);
        }
    }
    ?>
    </pre>
    <a href="index.php">Back</a>
</body>
</html>
