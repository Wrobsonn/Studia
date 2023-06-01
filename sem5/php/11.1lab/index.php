<?php
    require_once("klasy/Strona.php");
    require_once("klasy/Baza.php");
    $strona_akt = new Strona();
    //dołącz plik z ustawioną zmienną $tytul i $zawartosc
    $plik = "skrypty/glowna.php";
    if (file_exists($plik)) {
        require_once($plik);
        $strona_akt->ustaw_tytul($tytul);
        $strona_akt->ustaw_zawartosc($zawartosc);
        $strona_akt->wyswietl();
    }

    if(filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
        $strona_akt->ustaw_zawartosc("Pomyslnie dodano do bazy danych.");
    }