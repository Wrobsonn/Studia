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


    <div>
        <h2>Dane odebrane z formularza:</h2>
        <?php
        if (isset($_REQUEST['nazw']) && ($_REQUEST['nazw'] != "")) {
            $nazwisko = htmlspecialchars(trim($_REQUEST['nazw']));

            echo "Nazwisko: $nazwisko <br />";
        } else echo "Nie wpisano nazwiska <br />";

        if (isset($_REQUEST['wiek']) && ($_REQUEST['wiek'] != "")) {
            $lata = htmlspecialchars(trim($_REQUEST['wiek']));

            echo "wiek: $lata <br />";
        } else echo "Nie wpisano wieku <br />";

        if (isset($_REQUEST['email']) && ($_REQUEST['email'] != "")) {
            $mail = htmlspecialchars(trim($_REQUEST['email']));

            echo "Email: $mail <br />";
        } else echo "Nie wpisano emailu <br />";

        if (isset($_REQUEST['kraj']) && ($_REQUEST['kraj'] != "")) {
            $panstwo = htmlspecialchars(trim($_REQUEST['kraj']));

            echo "panstwo: $panstwo <br />";
        } else echo "Nie wpisano panstwa <br />";



        if (isset($_REQUEST['zaplata']) && ($_REQUEST['zaplata'] != "")) {
            $kasa = htmlspecialchars(trim($_REQUEST['zaplata']));

            echo "zaplata: $kasa <br />";
        } else echo "Nie wpisano panstwa <br />";


        if (isset($_REQUEST['jezyki'])) {
            $jezyki = join(",", $_REQUEST['jezyki']);
            echo 'wybrano tutoriale ' . $jezyki . '<br/>';
        }else
            echo 'nie wybrano tutoriala <br />';
        ?>
    </div>

</body>

</html>