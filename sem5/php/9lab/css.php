<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div>
        <form action="css.php" method="post">
            <textarea name="tekst"></textarea><br />
            <input type="submit" name="wyslij" value="Wyślij" />
        </form>
        <div>
            <?php
             if (filter_input(INPUT_POST, 'wyslij')) {
                echo "<h3>Original</h3>";
                echo $_POST['tekst'];
                echo "<br><h3>htmlspecialchars()</h3>";
                echo htmlspecialchars($_POST['tekst']);
                echo "<br><h3>strip_tags()</h3>";
                echo strip_tags($_POST['tekst']);
                echo "<br><h3>FILTER_SANITIZE_FULL_SPECIAL_CHARS</h3>";
                echo filter_input(INPUT_POST, 'tekst', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                echo "<br><h3>FILTER_SANITIZE_STRING</h3>";
                echo filter_input(INPUT_POST, 'tekst', FILTER_SANITIZE_STRING);}
            ?>
        </div>
    </div>

</body>

</html>