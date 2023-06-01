<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $n=4567;
        $x=10.123456789;
        echo "<h2>Pierwszy skrypt PHP</h2>";
        echo "Domyślny format: n= $n x=$x <br>";
        echo "Zaokrąglenie do liczby całkowitej x=".round($x,3)."<br>";
        echo "x=".round($x,0);
        ?>
    </body>
</html>
