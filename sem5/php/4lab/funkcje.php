<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function dodaj()
{
    echo "Dziala walidacja";
    walidacja();
}

function pokaz()
{
    $file = fopen("dane.txt", "r");
    while (!feof($file)) {
        echo fgets($file) . "<br>";
    }
    fclose($file);
}

function pokaz_zamowienie($parametr)
{
    $file_name = "dane.txt";
    $file = fopen($file_name, "r");
    while (!feof($file)) {
        $line1 = fgets($file); // pobierz linijke   
        $line = explode(";", $line1); // zamiana na tablice 
        foreach($line as $li) {
            $tmp = explode(":", $li); // zamiana na tablice -> name : kowalski
            $result[$tmp[0]] = $tmp[1];  //nazwana tablica pierwsza wartosc i druga wartosc tzn [0] = name [1] kowalski
        }
        $result["jezyki"] = explode(",", $result["jezyki"]); // ze stringa robimy tablice i szykamy w talbicy wg parametru
        if (in_array($parametr, $result["jezyki"])) {
            //print_r($result);
           // print_r($line1);
            echo $line1 . '<br/>';
        }
    }
}

function walidacja()
{

    $args = [
        'nazw' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó-]{1,25}$/']],
        'wiek' => FILTER_VALIDATE_INT,
        "mail" => FILTER_VALIDATE_EMAIL,
        'kraj' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'jezyki' => ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS, 'flags' => FILTER_REQUIRE_ARRAY],
        "zaplata" => [ "filter" => FILTER_VALIDATE_REGEXP, "options" => ["regexp" => "/^(eurocard|visa|przelew)$/"]
        ]

    ];

    $dane = filter_input_array(INPUT_POST, $args);
    var_dump($dane);

    $errors = "";
    foreach ($dane as $key => $val) {
        if ($val === false or $val === NULL) {
            $errors .= $key . " ";
        }
    }

    if ($errors === "") {
        dopliku("dane.txt", $dane);
    } else {
        echo "<br>Nie poprawnie dane: " . $errors;
    }
}


function dopliku($file_name, $dane)
{
    $file = fopen($file_name, "a");
    fwrite($file, "\nname:" . $dane['nazw'] . ";");
    fwrite($file, "age:" . $dane['wiek'] . ";");
    fwrite($file, "country:" . $dane['kraj'] . ";");
    fwrite($file, "mail:" . $dane['mail'] . ";");
    fwrite($file, "jezyki:");
    $licz = 0;
    foreach ($dane['jezyki'] as $jezyki) {
        ($licz == 0) ? fwrite($file, $jezyki) : fwrite($file, ",". $jezyki);
        $licz++;
    }
    fwrite($file, ";zaplata:" . $dane['zaplata']);
    fclose($file);
}


function statystyki()
{
    $counter = 0;
    $under18 = 0;
    $over49 = 0;
    $file_name = "dane.txt";
    $file = fopen($file_name, "r");
    
    while (!feof($file)) {
        $line = fgets($file);
        $line = explode(";", $line);
        $counter+=1;
        foreach($line as $li) {
            $tmp = explode(":", $li);
            $result[$tmp[0]] = $tmp[1];
        }

        $under18 += ($result["age"] < 18 )? 1:0;
        $over49 += ($result["age"] > 49 )? 1:0;
    }

    echo "<br>Liczba zamówień: $counter<br>";
    echo "Liczba zamówień osób w wieku <18 lat: $under18<br>";
    echo "Liczba zamówień osób w wieku >=50 lat: $over49<br>";

    fclose($file);
}
?>