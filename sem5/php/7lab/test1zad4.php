<?php
include_once 'klasy/klasa.php';
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
    session_start();
    $user = new User("miszczu", "Jan Kowalski", "kowalski@somsiad.pl", "harnas");
    $_SESSION["user"] = serialize($user);
    
    echo "<h2>Session ID</h2>";
    echo session_id();
    echo "<h2>\$_SESSION</h2>";
    foreach ($_SESSION as $key => $val) {
        if ($key === "user")
            unserialize($val)->show();
        else
            echo "<p>$key = $val</p>";
    }
    echo "<h2>\$_COOKIE</h2>";
    foreach ($_COOKIE as $key => $val) {
        echo "<p>$key = $val</p>";
    }
    ?>
    <a href="test2zad4.php">Przejdź do strony 2</a>
</div>
</body>
</html>