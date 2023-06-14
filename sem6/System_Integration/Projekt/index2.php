<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styles/style.css" />
    <script>
        if (!localStorage.getItem("token")) {
            window.location.replace("index.html");
        }
    </script>
</head>

<body>
    <div class="content" style="margin-top:3vh;min-height: 50vh;">


        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "is_db";
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Błąd łączenia z bazą danych: " . $conn->connect_error);
        }

        function przyski()
        {
            echo ' <form method="POST" class="functions">
            <input type="submit" name="wyswietldane" value="wyświetl dane" />
            <input type="submit" name="wyswietlzbazy" value="wyświetl z bazy" />
            <input type="submit" name="zamiendane" value="zamień dane" />
        </form>
        <form method="post" target="_blank" class="izolation">
            <input type="submit" name="commited" value="commited" />
            <input type="submit" name="uncommited" value="uncommited" />
            <input type="submit" name="serializable" value="serializable" />
            <input type="submit" name="reptable" value="reptable" />
        </form>';
        }

        function znajdz($conn1, $jakadana, $zjakiejbazy, $jakiedane, $ilerowne)
        {

            $sql = "SELECT $jakadana FROM $zjakiejbazy WHERE $jakiedane = '$ilerowne'";
            $result = $conn1->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo  "<label class='result'>" . $jakadana . ": " .
                        $row[$jakadana] . "</label><br>";
                }
            } else {
                echo "<label class='result'>0 wynik</label>";
            }
            $conn1->close();
        }


        function readznajdz($conn1, $jakadana, $zjakiejbazy, $jakiedane, $ilerowne)
        {
            $sql = "SELECT $jakadana FROM $zjakiejbazy WHERE $jakiedane = '$ilerowne'";
            $result = $conn1->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo  "<label class='result'>" . $jakadana . ": " .
                        $row[$jakadana] . "</label><br>";
                }
            } else {
                echo "<label class='result'>0 wynik</label>";
            }
        }


        function update($conn2, $jakadana, $zjakiejbazy, $nowa, $ilerowne)
        {
            $sql = "UPDATE $zjakiejbazy SET $jakadana = '$nowa' WHERE $jakadana = '$ilerowne'";
            $conn2->query($sql);
            echo "Tabela uczelnie zaktualizowana";
            $conn2->close();
        }

        function readCommitted($conn1, $jakadana, $zjakiejbazy, $jakiedane, $ilerowne)
        {
            $conn1->query("SET SESSION TRANSACTION ISOLATION LEVEL READ
    COMMITTED");
            $conn1->begin_transaction();
            echo "Przed snem<br>";
            readznajdz($conn1, $jakadana, $zjakiejbazy, $jakiedane, $ilerowne);

            sleep(10);

            echo "Po śnie<br>";
            readznajdz($conn1, $jakadana, $zjakiejbazy, $jakiedane, $ilerowne);
            $conn1->commit();
            $conn1->close();
        }

        function readUncommitted($conn1, $jakadana, $zjakiejbazy, $jakiedane, $ilerowne)
        {
            $conn1->query("SET SESSION TRANSACTION ISOLATION LEVEL READ
    UNCOMMITTED");
            $conn1->begin_transaction();
            echo "Przed snem<br>";
            readznajdz($conn1, $jakadana, $zjakiejbazy, $jakiedane, $ilerowne);

            sleep(10);

            echo "Po śnie<br>";
            readznajdz($conn1, $jakadana, $zjakiejbazy, $jakiedane, $ilerowne);
            $conn1->commit();
            $conn1->close();
        }

        function readSerializable($conn1, $jakadana, $zjakiejbazy, $jakiedane, $ilerowne)
        {
            $conn1->query("SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE");
            $conn1->begin_transaction();
            echo "Przed snem<br>";
            readznajdz($conn1, $jakadana, $zjakiejbazy, $jakiedane, $ilerowne);

            sleep(10);

            echo "Po śnie<br>";
            readznajdz($conn1, $jakadana, $zjakiejbazy, $jakiedane, $ilerowne);
            $conn1->commit();
            $conn1->close();
        }

        function readRepetable($conn1, $jakadana, $zjakiejbazy, $jakiedane, $ilerowne)
        {
            $conn1->begin_transaction();
            echo "Przed snem<br>";
            readznajdz($conn1, $jakadana, $zjakiejbazy, $jakiedane, $ilerowne);

            sleep(10);

            echo "Po śnie<br>";
            readznajdz($conn1, $jakadana, $zjakiejbazy, $jakiedane, $ilerowne);
            $conn1->commit();
            $conn1->close();
        }

        ?>
        <form method="post" action="main.html">
            <input type="submit" name="submit" value="Powrót do głownego menu">
        </form>


        <form method="get">
            <label class="dataSelect">Szukana dana:
                <input type="text" name="szukanadana" require />
            </label>
            <label class="dataSelect">Baza:
                <input type="text" name="bazy" value="" require />
            </label>
            <label class="dataSelect">Dana:
                <input type="text" name="dana" require />
            </label>
            <label class="dataSelect">Szukane:
                <input type="text" name="szukana" require />
            </label>
            <label class="dataSelect">Zamień na:
                <input type="text" name="zamien" />
            </label>
            <input type="submit" name="wybierzdane" value="wybierz dane" />
        </form>

        <?php
        //var_dump($_GET["bazy"]);
        if (($_GET["bazy"] ?? "" != NULL) && ($_GET["szukanadana"] ?? "" != NULL) && ($_GET["dana"] ?? "" != NULL) && ($_GET["szukana"] ?? "" != NULL)) {
            przyski();
        }
        if (isset($_POST['wyswietldane'])) {
            echo "Szukana dana " . $_GET["szukanadana"] . "<br> Baza " . $_GET["bazy"] . "<br> Dana " . $_GET["dana"] . "<br> Szukane " . $_GET["szukana"] . "<br> Zamien na " . $_GET["zamien"];
        }
        if (isset($_POST['wyswietlzbazy'])) {
            znajdz($conn, $_GET["szukanadana"], $_GET["bazy"], $_GET["dana"], $_GET["szukana"]);
        }

        if (isset($_POST['zamiendane'])) {
            update($conn, $_GET["szukanadana"], $_GET["bazy"], $_GET["zamien"], $_GET["szukana"]);
        }

        if (isset($_POST['commited'])) {
            echo "comited <br>";
            readCommitted($conn, $_GET["szukanadana"], $_GET["bazy"], $_GET["dana"], $_GET["szukana"]);
        }

        if (isset($_POST['uncommited'])) {
            echo "uncommited<br>";
            readUncommitted($conn, $_GET["szukanadana"], $_GET["bazy"], $_GET["dana"], $_GET["szukana"]);
        }

        if (isset($_POST['serializable'])) {
            echo "serializable<br>";
            readSerializable($conn, $_GET["szukanadana"], $_GET["bazy"], $_GET["dana"], $_GET["szukana"]);
        }

        if (isset($_POST['reptable'])) {
            echo "reptable<br>";
            readRepetable($conn, $_GET["szukanadana"], $_GET["bazy"], $_GET["dana"], $_GET["szukana"]);
        }

        ?>

</body>

</html>