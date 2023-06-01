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
            <form method="GET" action="pliki.php">
                <table>
                    <tr>
                        <td>Nazwisko: <input name="nazw" /> </td>

                    </tr>
                    <tr>
                        <td>Wiek:
                            <input name="wiek" />
                        </td>

                    </tr>
                    <tr>
                        <td>Państwo:
                            <select name="kraj">
                                <option value="Polska">Polska</option>
                                <option value="Wielka Brytania">Wielka Brytania</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Adres e-mail:
                            <input name="email" />
                        </td>

                    </tr>
                </table>
                <h4>Zamawiam tutorial z języka:</h4>
                <p><input  name="jezyki[]" type="checkbox" value="PHP" />PHP
                    <input name="jezyki[]" type="checkbox" value="C" />C
                    <input name="jezyki[]" type="checkbox" value="C++" />C++
                    <input name="jezyki[]" type="checkbox" value="Java" />Java
                    <input name="jezyki[]" type="checkbox" value="XLS" />XLS
                    <input name="jezyki[]" type="checkbox" value="CSS" />CSS
                    <input name="jezyki[]" type="checkbox" value="bash" />bash
                    <input name="jezyki[]" type="checkbox" value="Python" />Python
                    <input name="jezyki[]" type="checkbox" value="C#" />C#

                </p>
                <h4>Sposób zapłaty:</h4>
                <p><input name="zaplata" id="zaplata" type="radio" value="euro" />eurocard
                    <input name="zaplata" type="radio" value="visa" />visa<br />
                    <input name="zaplata" type="radio" value="przelew" />przelew bankowy
                    <br />

                    <input type="submit" name="submit" value="Wyczyść" />
                    <input type="submit" name="submit" value="Zapisz" />
                    <input type="submit" name="submit" value="Pokaż" />
                    <input type="submit" name="submit" value="PHP" />
                    <input type="submit" name="submit" value="CPP" />
                    <input type="submit" name="submit" value="Java" />

                </p>
            </form>

        </div>
        <div id="stopka"> &copy;JW </div>
    </div>
    <?php
    
    function dodaj()
    {
        echo "dziala dodaj<br>";
        $dane = "";
        if (isset($_REQUEST["nazw"])) {
            $dane .= htmlspecialchars($_REQUEST['nazw']) . " ";
        }
        if (isset($_REQUEST["wiek"])) {
            $dane .= htmlspecialchars($_REQUEST['wiek']) . " ";
        }
        if (isset($_REQUEST["kraj"])) {
            $dane .= htmlspecialchars($_REQUEST['kraj']) . " ";
        }
        if (isset($_REQUEST["email"])) {
            $dane .= htmlspecialchars($_REQUEST['email']) . " ";
        }
        if (isset($_REQUEST['jezyki'])) {
            $jezyki = join(",", $_REQUEST['jezyki']);
            $dane .= htmlspecialchars($jezyki) . ",";
        }
        if (isset($_REQUEST["zaplata"])) {
            $dane .= htmlspecialchars($_REQUEST['zaplata']);
        }
        $dane.=PHP_EOL;
        $fp = fopen("dane.txt", "a");
        fputs($fp, $dane);
        fclose($fp);
    }
    function pokaz()
    {
        echo " dziala pokaz<br>";
        $fp = fopen("dane.txt", "r");
        echo nl2br(fread(fopen("dane.txt", "r"), filesize("dane.txt")));
        fclose($fp);
    }
    function pokaz_zamowienie($tut)
{
    echo " dziala pokaz zamowienie<br>";
    $fp = fopen("dane.txt", "r");
    while (!feof($fp)) {
        $linia = fgets($fp);
        if (strstr($linia, $fp) !== False)
            echo $linia;
        fclose($fp);
    }
}
    //Skrypt właściwy do obsługi akcji (żądań):
    if (isset($_REQUEST["submit"])) { //jeśli kliknięto przycisk o name=submit
        $akcja = $_REQUEST["submit"]; //odczytaj jego value
        switch ($akcja) {
            case "Zapisz":
                dodaj();
                break;
            case "Pokaż":
                pokaz();
                break;
            case "Java":
                pokaz_zamowienie("Java");
                break;
                //pozostałe przypadki
        }
    }
    ?>
</body>

</html>