<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
<div>
    <?php
    session_start();
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

    if (isset($_COOKIE[session_name()])) {
       setcookie(session_name(), '', time() - 42000, '/');
    }
    session_destroy();
    ?>
    <a href="test1.php">Przejdź do strony 1</a>
</div>
</body>
</html>