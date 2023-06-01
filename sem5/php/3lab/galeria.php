<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        function galeria($rows, $cols) {
            $k = 1;
            for ($i = 0; $i < $rows; $i++) {

                for ($j = 0; $j < $cols; $j++) {
                    $nazwa = "obraz" . "$k";
                    $k++;
                    print("<img src='obrazki1/$nazwa.JPG' alt='$nazwa' />");
                }
                echo"<br>";
            }
        }

        galeria(4, 2);
        ?>
    </body>
</html>
