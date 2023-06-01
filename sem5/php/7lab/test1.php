<?php
session_start();
$_SESSION['username'] = 'kubus';
$_SESSION['fullname'] = 'Kubus Puchatek';
$_SESSION['email'] = 'kubus@stumilowylas.pl';
$_SESSION['status'] = 'ADMIN';
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
<div>
    <?php
    echo "<h2>Session ID</h2>";
    echo session_id();
    echo "<h2>\$_SESSION</h2>";
    foreach ($_SESSION as $key => $val) {
        echo "<p>$key = $val</p>";
    }
    echo "<h2>\$_COOKIE</h2>";
    foreach ($_COOKIE as $key => $val) {
        echo "<p>$key = $val</p>";
    }
    ?>
    <a href="test2.php">Przejdź do strony 2</a>
</div>
</body>
</html>