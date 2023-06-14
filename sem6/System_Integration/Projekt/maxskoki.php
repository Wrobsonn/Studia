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
    <div class="content" style="margin-top:3vh;min-height:85vh;">

        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "is_db";
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Błąd łączenia z bazą danych: " . $conn->connect_error);
        }


        function porownajceny($x, $y)
        {
            return $x - $y;
        }


        function wyswietl($dana, $conn)
        {
            $kwartal = array();
            $miasto = array();

            $sql = "SELECT * FROM `ceny`";

            $wynik = $conn->query($sql);

            for ($i = 0; $i < $wynik->num_rows; $i++) {
                $wynik2 = $wynik->fetch_assoc();
                array_push($kwartal, $wynik2["kwartal"]);
                array_push($miasto, $wynik2["$dana"]);
            }

            echo "<div class='diffs'>";
            for ($i = 1; $i < $wynik->num_rows; $i++) {

                if (porownajceny($miasto[$i], $miasto[$i - 1]) > 500) {
                    echo "<p>" . $kwartal[$i] . " - $dana" . "</p>";
                }
            }
            echo "</div>";
        }


        function przycisk()
        {
            echo '<form method="POST">
            <input type="submit" name="wyswietlwynik" value="Wyświetl wynik" />

        </form>

        <button onclick="draw()">narysuj wykres</button>';
        }

        ?>
        <script>
            function draw() {
                <?php
                $dataPoints = array();
                $sql = "SELECT * FROM `ceny`";

                $wynik = $conn->query($sql);
                for ($i = 0; $i < $wynik->num_rows; $i++) {
                    $wynik2 = $wynik->fetch_assoc();
                    $dataPoints[] = array(
                        "y" => $wynik2[$_GET["dana"]],
                        "label" => $wynik2["kwartal"]

                    );
                }

                ?>

                var chart = new CanvasJS.Chart("chartContainer", {
                    title: {
                        text: <?php echo json_encode($_GET["dana"], JSON_NUMERIC_CHECK) ?>
                    },
                    axisY: {
                        title: "Cena w złotówce za m^2",
                        titleFontSize: 24,
                        prefix: "PLN"
                    },
                    data: [{
                        type: "line",
                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart.render();

            }
        </script>



        <form method="post" action="main.html">
            <input type="submit" name="submit" value="Przejdz do głownego menu">
        </form>

        <form method="get">
            <label>Dana:
                <input type="text" id="dana" name="dana" />
            </label>
            <input type="submit" name="wybierzdane" value="Wybierz dane" />

        </form>
        <div class="submits">
            <?php
            if ($_GET["dana"] ?? "" != NULL) {
                przycisk();
            }
            ?>
        </div>
        <?php
        if (isset($_POST['wyswietlwynik'])) {
            wyswietl($_GET["dana"], $conn);
        }
        ?>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    </div>
</body>

</html>