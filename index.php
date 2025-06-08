<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2><?= json_encode("IS ALIVE"); ?></h2>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $host = getenv('DB_HOST');
    $db   = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $pass = getenv('DB_PASS');
    $mysqli = new mysqli($host, $user, $pass, $db, 3306);
    if ($mysqli->connect_errno) {
        echo "Error: " . $mysqli->connect_error;
        exit();
    }
    echo "Success!";
    ?>
    <p>MySQL:<?= json_encode($result); ?></p>
</body>

</html>