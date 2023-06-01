<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/skrypty.js"></script>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>

    <?php
    require_once("klasy/Strona.php");
    $strona_akt = new Strona();
    //dołącz plik z ustawioną zmienną $tytul i $zawartosc


    
    $plik = "skrypty/glowna.php";
    if (file_exists($plik)) {
        require_once($plik);
        $strona_akt->ustaw_tytul($tytul);
        $strona_akt->ustaw_zawartosc($zawartosc);
        $strona_akt->wyswietl();
    }
    ?>


<!-- <div id='main'>
<button id='index'> Kontakt </button>
<button id='galeria'> Galeria </button>
<button id='formularz'> Formularz </button>
<button id='onas'> O nas </button>
</div> -->




</body>

</html>