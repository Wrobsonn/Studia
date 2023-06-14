<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles/style.css" />
    <script>
        if (!localStorage.getItem("token")) {
            window.location.replace("index.html");
        }
    </script>
</head>

<body>
    <div class="content">

        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "is_db";
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Błąd łączenia z bazą danych: " . $conn->connect_error);
        }

        $sql = "DELETE FROM `is_db`.`ceny`";
        $conn->query($sql);
        $sql = "DELETE FROM `is_db`.`iloscmieszkan`";
        $conn->query($sql);
        $sql = "DELETE FROM `is_db`.`liczbaludnoscinakmkwadrat`";
        $conn->query($sql);
        $sql = "DELETE FROM `is_db`.`mieszkancy`";
        $conn->query($sql);
        $sql = "DELETE FROM `is_db`.`mieszkaniec_na_mieszkanie`";
        $conn->query($sql);
        $sql = "DELETE FROM `is_db`.`powierzchnia`";
        $conn->query($sql);
        $sql = "DELETE FROM `is_db`.`stopyprocentowe`";
        $conn->query($sql);
        $sql = "DELETE FROM `is_db`.`uczelnie`";
        $conn->query($sql);


        $jsondata = file_get_contents('dane/iloscMieszkan.json');


        $data = json_decode($jsondata, true);
        foreach ($data as $cos) {
            $Kwartal = $cos['Nazwa'];
            $Bialystok = round($cos['Białystok'], 0);
            $Bydgoszcz = round($cos['Bydgoszcz'], 0);
            $Gdansk = round($cos['Gdańsk'], 0);
            $Gdynia = round($cos['Gdynia'], 0);
            $Katowice = round($cos['Katowice'], 0);
            $Kielce = round($cos['Kielce'], 0);
            $Krakow = round($cos['Kraków'], 0);
            $Lublin = round($cos['Lublin'], 0);
            $Lodz = round($cos['Łódź'], 0);
            $Olsztyn = round($cos['Olsztyn'], 0);
            $Opole = round($cos['Opole'], 0);
            $Poznan = round($cos['Poznań'], 0);
            $Rzeszow = round($cos['Rzeszów'], 0);
            $Szczecin = round($cos['Szczecin'], 0);
            $Warszawa = round($cos['Warszawa'], 0);
            $Wroclaw = round($cos['Wrocław'], 0);
            $ZielonaGora = round($cos['Zielona Góra'], 0);

            $sql = "INSERT INTO iloscMieszkan (Rok, Bialystok, Bydgoszcz, Gdansk, Gdynia, Katowice, Kielce, Krakow, Lublin, Lodz, Olsztyn, Opole, Poznan, Rzeszow, Szczecin, Warszawa, Wroclaw, ZielonaGora) VALUES('$Kwartal', '$Bialystok', '$Bydgoszcz', '$Gdansk', '$Gdynia', '$Katowice', '$Kielce', '$Krakow', '$Lublin', '$Lodz', '$Olsztyn', '$Opole', '$Poznan', '$Rzeszow', '$Szczecin', '$Warszawa', '$Wroclaw', '$ZielonaGora')";
            $conn->query($sql);
        }

        $jsondata = file_get_contents('dane/domy.json');


        $data = json_decode($jsondata, true);
        foreach ($data as $cos) {
            $Kwartal = $cos['Kwartał'];
            $Bialystok = round($cos['Białystok'], 0);
            $Bydgoszcz = round($cos['Bydgoszcz'], 0);
            $Gdansk = round($cos['Gdańsk'], 0);
            $Gdynia = round($cos['Gdynia'], 0);
            $Katowice = round($cos['Katowice'], 0);
            $Kielce = round($cos['Kielce'], 0);
            $Krakow = round($cos['Kraków'], 0);
            $Lublin = round($cos['Lublin'], 0);
            $Lodz = round($cos['Łódź'], 0);
            $Olsztyn = round($cos['Olsztyn'], 0);
            $Opole = round($cos['Opole'], 0);
            $Poznan = round($cos['Poznań'], 0);
            $Rzeszow = round($cos['Rzeszów'], 0);
            $Szczecin = round($cos['Szczecin'], 0);
            $Warszawa = round($cos['Warszawa'], 0);
            $Wroclaw = round($cos['Wrocław'], 0);
            $ZielonaGora = round($cos['Zielona Góra'], 0);

            $sql = "INSERT INTO ceny (Kwartal, Bialystok, Bydgoszcz, Gdansk, Gdynia, Katowice, Kielce, Krakow, Lublin, Lodz, Olsztyn, Opole, Poznan, Rzeszow, Szczecin, Warszawa, Wroclaw, ZielonaGora) VALUES('$Kwartal', '$Bialystok', '$Bydgoszcz', '$Gdansk', '$Gdynia', '$Katowice', '$Kielce', '$Krakow', '$Lublin', '$Lodz', '$Olsztyn', '$Opole', '$Poznan', '$Rzeszow', '$Szczecin', '$Warszawa', '$Wroclaw', '$ZielonaGora')";
            $conn->query($sql);
        }


        $jsondata = file_get_contents('dane/ludnoscnametr.json');

        $data = json_decode($jsondata, true);
        foreach ($data["liczbaludnoscinakmkwadrat"] as $cos) {
            $Rok = $cos['Rok'];
            $Bialystok = round($cos['Białystok'], 0);
            $Bydgoszcz = round($cos['Bydgoszcz'], 0);
            $Gdansk = round($cos['Gdańsk'], 0);
            $Gdynia = round($cos['Gdynia'], 0);
            $Katowice = round($cos['Katowice'], 0);
            $Kielce = round($cos['Kielce'], 0);
            $Krakow = round($cos['Kraków'], 0);
            $Lublin = round($cos['Lublin'], 0);
            $Lodz = round($cos['Łódź'], 0);
            $Olsztyn = round($cos['Olsztyn'], 0);
            $Opole = round($cos['Opole'], 0);
            $Poznan = round($cos['Poznań'], 0);
            $Rzeszow = round($cos['Rzeszów'], 0);
            $Szczecin = round($cos['Szczecin'], 0);
            $Warszawa = round($cos['Warszawa'], 0);
            $Wroclaw = round($cos['Wrocław'], 0);
            $ZielonaGora = round($cos['Zielona Góra'], 0);

            $sql = "INSERT INTO liczbaludnoscinakmkwadrat (Rok, Bialystok, Bydgoszcz, Gdansk, Gdynia, Katowice, Kielce, Krakow, Lublin, Lodz, Olsztyn, Opole, Poznan, Rzeszow, Szczecin, Warszawa, Wroclaw, ZielonaGora) VALUES('$Rok', '$Bialystok', '$Bydgoszcz', '$Gdansk', '$Gdynia', '$Katowice', '$Kielce', '$Krakow', '$Lublin', '$Lodz', '$Olsztyn', '$Opole', '$Poznan', '$Rzeszow', '$Szczecin', '$Warszawa', '$Wroclaw', '$ZielonaGora')";
            $conn->query($sql);
        }

        $jsondata = file_get_contents('dane/mieszkancy.json');

        $data = json_decode($jsondata, true);

        foreach ($data["Mieszkancy"] as $cos) {

            $Rok = $cos['Rok'];
            $Bialystok = round($cos['Białystok'], 0);
            $Bydgoszcz = round($cos['Bydgoszcz'], 0);
            $Gdansk = round($cos['Gdańsk'], 0);
            $Gdynia = round($cos['Gdynia'], 0);
            $Katowice = round($cos['Katowice'], 0);
            $Kielce = round($cos['Kielce'], 0);
            $Krakow = round($cos['Kraków'], 0);
            $Lublin = round($cos['Lublin'], 0);
            $Lodz = round($cos['Łódź'], 0);
            $Olsztyn = round($cos['Olsztyn'], 0);
            $Opole = round($cos['Opole'], 0);
            $Poznan = round($cos['Poznań'], 0);
            $Rzeszow = round($cos['Rzeszów'], 0);
            $Szczecin = round($cos['Szczecin'], 0);
            $Warszawa = round($cos['Warszawa'], 0);
            $Wroclaw = round($cos['Wrocław'], 0);
            $ZielonaGora = round($cos['Zielona Góra'], 0);

            $sql = "INSERT INTO mieszkancy (Rok, Bialystok, Bydgoszcz, Gdansk, Gdynia, Katowice, Kielce, Krakow, Lublin, Lodz, Olsztyn, Opole, Poznan, Rzeszow, Szczecin, Warszawa, Wroclaw, ZielonaGora) VALUES('$Rok', '$Bialystok', '$Bydgoszcz', '$Gdansk', '$Gdynia', '$Katowice', '$Kielce', '$Krakow', '$Lublin', '$Lodz', '$Olsztyn', '$Opole', '$Poznan', '$Rzeszow', '$Szczecin', '$Warszawa', '$Wroclaw', '$ZielonaGora')";
            $conn->query($sql);
        }


        $jsondata = file_get_contents('dane/powierzchnia.json');

        $data = json_decode($jsondata, true);
        foreach ($data["Powierzchnia"] as $cos) {
            $Rok = $cos['Rok'];
            $Bialystok = round($cos['Białystok'], 0);
            $Bydgoszcz = round($cos['Bydgoszcz'], 0);
            $Gdansk = round($cos['Gdańsk'], 0);
            $Gdynia = round($cos['Gdynia'], 0);
            $Katowice = round($cos['Katowice'], 0);
            $Kielce = round($cos['Kielce'], 0);
            $Krakow = round($cos['Kraków'], 0);
            $Lublin = round($cos['Lublin'], 0);
            $Lodz = round($cos['Łódź'], 0);
            $Olsztyn = round($cos['Olsztyn'], 0);
            $Opole = round($cos['Opole'], 0);
            $Poznan = round($cos['Poznań'], 0);
            $Rzeszow = round($cos['Rzeszów'], 0);
            $Szczecin = round($cos['Szczecin'], 0);
            $Warszawa = round($cos['Warszawa'], 0);
            $Wroclaw = round($cos['Wrocław'], 0);
            $ZielonaGora = round($cos['Zielona Góra'], 0);

            $sql = "INSERT INTO powierzchnia (Rok, Bialystok, Bydgoszcz, Gdansk, Gdynia, Katowice, Kielce, Krakow, Lublin, Lodz, Olsztyn, Opole, Poznan, Rzeszow, Szczecin, Warszawa, Wroclaw, ZielonaGora) VALUES('$Rok', '$Bialystok', '$Bydgoszcz', '$Gdansk', '$Gdynia', '$Katowice', '$Kielce', '$Krakow', '$Lublin', '$Lodz', '$Olsztyn', '$Opole', '$Poznan', '$Rzeszow', '$Szczecin', '$Warszawa', '$Wroclaw', '$ZielonaGora')";
            $conn->query($sql);
        }

        $jsondata = file_get_contents('dane/mieszkaniec_na_mieszkanie.json');
        $data = json_decode($jsondata, true);

        foreach ($data as $cos) {
            $Rok = $cos['Rok'];
            $Bialystok = str_replace(',', ".", $cos['Białystok']);
            $Bydgoszcz = str_replace(',', ".", $cos['Bydgoszcz']);
            $Gdansk = str_replace(',', ".", $cos['Gdańsk']);
            $Gdynia = str_replace(',', ".", $cos['Gdynia']);
            $Katowice = str_replace(',', ".", $cos['Katowice']);
            $Kielce = str_replace(',', ".", $cos['Kielce']);
            $Krakow = str_replace(',', ".", $cos['Kraków']);
            $Lublin = str_replace(',', ".", $cos['Lublin']);
            $Lodz = str_replace(',', ".", $cos['Łódź']);
            $Olsztyn = str_replace(',', ".", $cos['Olsztyn']);
            $Opole = str_replace(',', ".", $cos['Opole']);
            $Poznan = str_replace(',', ".", $cos['Poznań']);
            $Rzeszow = str_replace(',', ".", $cos['Rzeszów']);
            $Szczecin = str_replace(',', ".", $cos['Szczecin']);
            $Warszawa = str_replace(',', ".", $cos['Warszawa']);
            $Wroclaw = str_replace(',', ".", $cos['Wrocław']);
            $ZielonaGora = str_replace(',', ".", $cos['Zielona Góra']);

            $sql = "INSERT INTO mieszkaniec_na_mieszkanie (Rok, Bialystok, Bydgoszcz, Gdansk, Gdynia, Katowice, Kielce, Krakow, Lublin, Lodz, Olsztyn, Opole, Poznan, Rzeszow, Szczecin, Warszawa, Wroclaw, ZielonaGora) VALUES('$Rok', '$Bialystok', '$Bydgoszcz', '$Gdansk', '$Gdynia', '$Katowice', '$Kielce', '$Krakow', '$Lublin', '$Lodz', '$Olsztyn', '$Opole', '$Poznan', '$Rzeszow', '$Szczecin', '$Warszawa', '$Wroclaw', '$ZielonaGora')";
            $conn->query($sql);
        }

        $jsondata = file_get_contents('dane/iloscUczelni.json');

        $data = json_decode($jsondata, true);
        foreach ($data as $cos) {
            $Key = $cos['Nazwa'];
            $Value = $cos['ilość uczelni'];
            $sql = "INSERT INTO uczelnie (Miasto, Uczelnie) VALUES('$Key', '$Value')";
            $conn->query($sql);
        }


        function curdate()
        {
            return date('Y-m-d');
        }

        function getQuarterByMonth($monthNumber)
        {
            $zmienna = floor(($monthNumber - 1) / 3) + 1;
            $tab = ["I", "II", "III", "IV"];
            return $tab[$zmienna - 1];
        }

        $stopy_file = fopen("dane/stopy.xml", "r") or die("Nie można otworzyć pliku!");
        $stopy_imp = fgets($stopy_file);
        fclose($stopy_file);

        $stopy_xml = new SimpleXMLElement($stopy_imp);



        $end_date = strtotime('2023-02-01');

        $current_date = strtotime('2013-01-01');

        while ($current_date <= $end_date) {
            $formatted_date = date('Y-m-d', $current_date);

            for ($i = 0; $i < count($stopy_xml->pozycje); $i++) {
                $data = strtotime($stopy_xml->pozycje[$i]->attributes()->obowiazuje_od);
                $data_next = (isset($stopy_xml->pozycje[$i + 1])) ? strtotime($stopy_xml->pozycje[$i + 1]->attributes()->obowiazuje_od) : strtotime(curdate());
                if ($current_date >= $data && $current_date <= $data_next) {
                    $Kwartal = getQuarterByMonth(date("m", $current_date)) . " " . date("Y", $current_date);
                    $Stopa = $stopy_xml->pozycje[$i]->pozycja[0]->attributes()->oprocentowanie;
                    $Stopa =   str_replace(',', ".", $Stopa);
                    $sql = "INSERT INTO stopyprocentowe (kwartal, stopa) VALUES('$Kwartal', $Stopa)";
                    $conn->query($sql);
                }
            }

            $current_date = strtotime('+3 month', $current_date);
        }

        echo "<h1>Pomyślnie wczytano dane do bazy<h1>";
        ?>

        <form method="post" action="main.html">
            <input type="submit" name="submit" value="Przejdz do głownego menu">
        </form>
    </div>
</body>

</html>