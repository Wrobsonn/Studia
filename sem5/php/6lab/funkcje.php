<?php

function Form(){
echo'
<form method="POST">
<label for="nazw"> Nazwisko :</label> <input type="text" id="nazw" name="nazw" /> <br />
<label for="wiek">Wiek: </label><input type="number" id="wiek" name="wiek" /> <br />
<label for="kraj">Państwo </label>:
<select size="1" id="kraj" name="kraj">
    <option value="Polska">Polska</option>
    <option value="Niemcy">Niemcy</option>
    <option value="Czechy">Czechy</option>
</select>
<br />

<label for="mail"> e-mail :</label> <input type="text" id="mail" name="mail" /> <br />
<br />
<b>Zamawiam tutorial z języka:</b>
<br /><br />

<input name="jezyki[]" type="checkbox" value="PHP" />PHP
<input name="jezyki[]" type="checkbox" value="C" />C
<input name="jezyki[]" type="checkbox" value="CPP" />CPP
<input name="jezyki[]" type="checkbox" value="Java" />Java
<input name="jezyki[]" type="checkbox" value="XLS" />XLS
<input name="jezyki[]" type="checkbox" value="CSS" />CSS
<input name="jezyki[]" type="checkbox" value="JavaScript" />JavaScript
<input name="jezyki[]" type="checkbox" value="Python" />Python
<input name="jezyki[]" type="checkbox" value="C#" />C#

<br /><br />
<b>Sposób zapłaty:</b>
<br /><br />
<input type="radio" name="zaplata" id="eurocard" value="eurocard" /> <label for="eurocard">eurocard</label>
<input type="radio" name="zaplata" id="visa" value="visa" /> <label for="visa">visa</label>
<input type="radio" name="zaplata" id="przelew" value="przelewBankowy" /> <label for="przelewBankowy">przelew bankowy</label>
<br /><br />

<button type="reset">Wyczyść</button>
<button type="submit" name="submit" value="Zapisz">Zapisz</button>
<button type="submit" name="submit" value="Pokaz">Pokaz</button>
<button type="submit" name="submit" value="PHP">PHP</button>
<button type="submit" name="submit" value="CPP">CPP</button>
<button type="submit" name="submit" value="Java">Java</button>
<button type="submit" name="submit" value="Statystyki">Statystyki</button>


</form>';

}


function walidacja($bd)
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
        dodajdoBD($bd,$dane);
    } else {
        echo "<br>Nie poprawnie dane: " . $errors;
    }
}



function statystyki($bd)
{
    $counter = strip_tags($bd->select("select max(Id) from klienci", ["max(Id)"]));
    $under18 = strip_tags($bd->select("select count(*) from klienci where wiek < 18", ["count(*)"]));
    $over49 = strip_tags($bd->select("select count(*) from klienci where wiek > 49", ["count(*)"]));
    
    echo "<br>Liczba zamówień: $counter<br>";
    echo "Liczba zamówień osób w wieku <18 lat: $under18<br>";
    echo "Liczba zamówień osób w wieku >=50 lat: $over49<br>";

}


function dodajdoBD($bd,$dane){
        $query = "INSERT INTO `klienci`.`klienci`
        (
        `nazw`,
        `wiek`,
        `kraj`,
        `mail`,
        `jezyki`,
        `zaplata`)
        VALUES
        (";
        echo $query;
        $query .= "'".$dane['nazw']."',";
        $query .= $dane['wiek'].",";
        $query .= "'".$dane['kraj']."',";
        $query .= "'".$dane['mail']."',";
        $query .= "'".implode(",", $dane['jezyki'])."',";
        $query .= "'".$dane['zaplata']."');";
        var_dump($query);
        if($bd->insert($query)) {
            echo "Zapisano";
        } else {
            echo "Nie zapisano";
        }
    }
