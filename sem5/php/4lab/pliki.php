<!DOCTYPE html>
<html lang="pl">

<head>
    <title> Formularze </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<body>
    <div id="kontener">
        <div id="baner">
            <h1>Formularz</h1>
        </div>

        <div id="tresc">
            <form method="POST" action="pliki.php">
                <label for="nazw"> Nazwisko :</label> <input type="text" id="nazw" name="nazw" /> <br />
                <label for="wiek">Wiek: </label><input type="number" id="wiek" name="wiek" /> <br />
                <label for="kraj">Państwo </label>:
                <select size="1" id="kraj" name="kraj">
                    <option value="UK">Zjednoczone Królestwo Wielkiej Brytanii </option>
                    <option value="Polska">Polska</option>
                    <option value="Niemcy">Niemcy</option>
                </select>
                <br />

                <label for="mail"> e-mail :</label> <input type="text" id="mail" name="mail" /> <br />
                <br />
                <b>Zamawiam tutorial z języka:</b>
                <br /><br />

                <input name="jezyki[]" type="checkbox" value="Php" />PHP
                <input name="jezyki[]" type="checkbox" value="C" />C
                <input name="jezyki[]" type="checkbox" value="Cpp" />C++
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
                <input type="radio" name="zaplata" id="przelew" value="przelewBankowy" /> <label for="przelew">przelew bankowy</label>
                <br /><br />

                <button type="reset">Wyczyść</button>
                <button type="submit" name="submit" value="Zapisz">Zapisz</button>
                <button type="submit" name="submit" value="Pokaz">Pokaz</button>
                <button type="submit" name="submit" value="Php">PHP</button>
                <button type="submit" name="submit" value="Cpp">CPP</button>
                <button type="submit" name="submit" value="Java">Java</button>
                <button type="submit" name="submit" value="Statystyki">Statystyki</button>


            </form>

        </div>
        <div id="stopka"> &copy;JW </div>
    </div>
    <?php

    include_once "funkcje.php";
    if (filter_input(INPUT_POST, "submit")) {
        $akcja = filter_input(INPUT_POST, "submit");
        switch ($akcja) {
            case "Zapisz":
                dodaj();
                break;
            case "Pokaz":
                pokaz();
                break;
            case "Java":
                pokaz_zamowienie("Java");
                break;
            case "Php":
                pokaz_zamowienie("Php");
                break;
            case "Cpp":
                pokaz_zamowienie("Cpp");
                break;
            case "Statystyki":
                statystyki();
                break;
        }
    }
    ?>
</body>

</html>