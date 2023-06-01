<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    include_once("funkcje.php");
    include_once 'klasy/Baza.php';
    Form();
    $bd = new Baza("localhost", "root", "", "klienci");
    if (filter_input(INPUT_POST, "submit")) {
        $akcja = filter_input(INPUT_POST, "submit");
        switch ($akcja) {
            case "Zapisz":
                walidacja($bd);
                break;
            case "Pokaz":
                echo $bd->select("select nazw,jezyki from klienci", ["nazw", "jezyki"]);
                break;
            case "PHP":
                echo $bd->select("select * from klienci WHERE jezyki LIKE '%PHP%'", ["Id", "nazw", "wiek", "kraj", "mail", "jezyki", "zaplata"]);
                break;
            case "CPP":
                echo $bd->select("select * from klienci where klienci.jezyki like '%CPP%'", ["Id", "nazw", "wiek", "kraj", "mail", "jezyki", "zaplata"]);
                break;
            case "Java":
                echo $bd->select("select * from klienci where jezyki like '%Java%'", ["Id", "nazw", "wiek", "kraj", "mail", "jezyki", "zaplata"]);
                break;
            case "Statystyki":
                statystyki($bd);
                break;
        }
    }
    ?>

</body>

</html>