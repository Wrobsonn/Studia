<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles/style.css" />
</head>

<body>
    <div class="content" style="margin-top:3vh;">

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new mysqli($servername, $username, $password);

        if ($conn->connect_error) {
            die("Błąd łączenia z bazą danych: " . $conn->connect_error);
        }

        // Tworzenie bazy danych
        $sql = "CREATE DATABASE is_db";
        if ($conn->query($sql) === TRUE) {
            echo "<h3 class='info'>Baza danych została utworzona pomyślnie.</h3>";
        } else {
            echo "<h3 class='errorinfo'>Błąd podczas tworzenia bazy danych: <label>" . $conn->error . "</label></h3>";
        }


        $conn->close();



        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "is_db";
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Błąd łączenia z bazą danych: " . $conn->connect_error);
        }


        $sql = "CREATE TABLE `ceny` (
    kwartal VARCHAR(35) NOT NULL,
    Bialystok DOUBLE NOT NULL,
    Bydgoszcz double NOT NULL,
    Gdansk double NOT NULL,
    Gdynia double NOT NULL,
    Katowice double NOT NULL,
    Kielce double NOT NULL,
    Krakow double NOT NULL,
    Lublin double NOT NULL,
    Lodz double NOT NULL,
    Olsztyn double NOT NULL,
    Opole double NOT NULL,
    Poznan double NOT NULL,
    Rzeszow double NOT NULL,
    Szczecin double NOT NULL,
    Warszawa double NOT NULL,
    Wroclaw double NOT NULL,
    ZielonaGora double NOT NULL
  )";


        if ($conn->query($sql) === TRUE) {
            echo "<h3 class='info'>Tabela ceny została utworzona pomyślnie.</h3>";
        } else {
            echo "<h3 class='errorinfo'>Błąd podczas tworzenia tabeli ceny: <label>" . $conn->error . "</label></h3>";
        }


        $sql = "CREATE TABLE `users` (
    `id` int(11) NOT NULL,
    `login` varchar(35) NOT NULL,
    `password` varchar(256) NOT NULL
  )";

        if ($conn->query($sql) === TRUE) {
            echo "<h3 class='info'>Tabela users została utworzona pomyślnie.</h3>";
        } else {
            echo "<h3 class='errorinfo'>Błąd podczas tworzenia tabeli users: <label>" . $conn->error . "</label></h3>";
        }

        $sql = "CREATE TABLE `iloscmieszkan` (
    Rok VARCHAR(35) NOT NULL,
    Bialystok DOUBLE NOT NULL,
    Bydgoszcz double NOT NULL,
    Gdansk double NOT NULL,
    Gdynia double NOT NULL,
    Katowice double NOT NULL,
    Kielce double NOT NULL,
    Krakow double NOT NULL,
    Lublin double NOT NULL,
    Lodz double NOT NULL,
    Olsztyn double NOT NULL,
    Opole double NOT NULL,
    Poznan double NOT NULL,
    Rzeszow double NOT NULL,
    Szczecin double NOT NULL,
    Warszawa double NOT NULL,
    Wroclaw double NOT NULL,
    ZielonaGora double NOT NULL
  )";

        if ($conn->query($sql) === TRUE) {
            echo "<h3 class='info'>Tabela mieszkania została utworzona pomyślnie.</h3>";
        } else {
            echo "<h3 class='errorinfo'>Błąd podczas tworzenia tabeli mieszkań: <label>" . $conn->error . "</label></h3>";
        }


        $sql = "CREATE TABLE `liczbaludnoscinakmkwadrat` (
    Rok VARCHAR(35) NOT NULL,
    Bialystok DOUBLE NOT NULL,
    Bydgoszcz double NOT NULL,
    Gdansk double NOT NULL,
    Gdynia double NOT NULL,
    Katowice double NOT NULL,
    Kielce double NOT NULL,
    Krakow double NOT NULL,
    Lublin double NOT NULL,
    Lodz double NOT NULL,
    Olsztyn double NOT NULL,
    Opole double NOT NULL,
    Poznan double NOT NULL,
    Rzeszow double NOT NULL,
    Szczecin double NOT NULL,
    Warszawa double NOT NULL,
    Wroclaw double NOT NULL,
    ZielonaGora double NOT NULL
  )";

        if ($conn->query($sql) === TRUE) {
            echo "<h3 class='info'>Tabela ludnosci na metr kwadratowy została utworzona pomyślnie.</h3>";
        } else {
            echo "<h3 class='errorinfo'>Błąd podczas tworzenia tabeli ludnosci na metr kwadratowy: <label>" . $conn->error . "</label></h3>";
        }


        $sql = "CREATE TABLE `mieszkancy` (
    Rok VARCHAR(35) NOT NULL,
    Bialystok DOUBLE NOT NULL,
    Bydgoszcz double NOT NULL,
    Gdansk double NOT NULL,
    Gdynia double NOT NULL,
    Katowice double NOT NULL,
    Kielce double NOT NULL,
    Krakow double NOT NULL,
    Lublin double NOT NULL,
    Lodz double NOT NULL,
    Olsztyn double NOT NULL,
    Opole double NOT NULL,
    Poznan double NOT NULL,
    Rzeszow double NOT NULL,
    Szczecin double NOT NULL,
    Warszawa double NOT NULL,
    Wroclaw double NOT NULL,
    ZielonaGora double NOT NULL
  )";

        if ($conn->query($sql) === TRUE) {
            echo "<h3 class='info'>Tabela mieszkancy została utworzona pomyślnie.</h3>";
        } else {
            echo "<h3 class='errorinfo'>Błąd podczas tworzenia tabeli mieszkancy: <label>" . $conn->error . "</label></h3>";
        }


        $sql = "CREATE TABLE `mieszkaniec_na_mieszkanie` (
    Rok VARCHAR(35) NOT NULL,
    Bialystok DOUBLE NOT NULL,
    Bydgoszcz double NOT NULL,
    Gdansk double NOT NULL,
    Gdynia double NOT NULL,
    Katowice double NOT NULL,
    Kielce double NOT NULL,
    Krakow double NOT NULL,
    Lublin double NOT NULL,
    Lodz double NOT NULL,
    Olsztyn double NOT NULL,
    Opole double NOT NULL,
    Poznan double NOT NULL,
    Rzeszow double NOT NULL,
    Szczecin double NOT NULL,
    Warszawa double NOT NULL,
    Wroclaw double NOT NULL,
    ZielonaGora double NOT NULL
  )";

        if ($conn->query($sql) === TRUE) {
            echo "<h3 class='info'>Tabela mieszkaniec na mieszkanie została utworzona pomyślnie.</h3>";
        } else {
            echo "<h3 class='errorinfo'>Błąd podczas tworzenia tabeli mieszkaniec na mieszkanie: <label>" . $conn->error . "</label></h3>";
        }


        $sql = "CREATE TABLE `powierzchnia` (
    Rok VARCHAR(35) NOT NULL,
    Bialystok DOUBLE NOT NULL,
    Bydgoszcz double NOT NULL,
    Gdansk double NOT NULL,
    Gdynia double NOT NULL,
    Katowice double NOT NULL,
    Kielce double NOT NULL,
    Krakow double NOT NULL,
    Lublin double NOT NULL,
    Lodz double NOT NULL,
    Olsztyn double NOT NULL,
    Opole double NOT NULL,
    Poznan double NOT NULL,
    Rzeszow double NOT NULL,
    Szczecin double NOT NULL,
    Warszawa double NOT NULL,
    Wroclaw double NOT NULL,
    ZielonaGora double NOT NULL
  )";

        if ($conn->query($sql) === TRUE) {
            echo "<h3 class='info'>Tabela powierzchnia została utworzona pomyślnie.</h3>";
        } else {
            echo "<h3 class='errorinfo'>Błąd podczas tworzenia tabeli powierzchnia: <label>" . $conn->error . "</label></h3>";
        }

        $sql = "CREATE TABLE `stopyprocentowe` (
    kwartal VARCHAR(35) NOT NULL,
    stopa FLOAT NOT NULL )";

        if ($conn->query($sql) === TRUE) {
            echo "<h3 class='info'>Tabela stopy procentowe została utworzona pomyślnie.</h3>";
        } else {
            echo "<h3 class='errorinfo'>Błąd podczas tworzenia tabeli stopy procentowe: <label>" . $conn->error . "</label></h3>";
        }

        $sql = "CREATE TABLE `uczelnie` (
    Miasto VARCHAR(35) NOT NULL,
    Uczelnie INT NOT NULL )";

        if ($conn->query($sql) === TRUE) {
            echo "<h3 class='info'>Tabela uczelnie została utworzona pomyślnie.</h3>";
        } else {
            echo "<h3 class='errorinfo'>Błąd podczas tworzenia tabeli uczelnie: <label>" . $conn->error . "</label></h3>";
        }

        ?>

        <form method=" post" action="index.html">
            <input type="submit" name="submit" value="Powrót do głownego menu">
        </form>
    </div>
</body>

</html>