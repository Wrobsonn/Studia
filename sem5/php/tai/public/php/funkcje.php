<?php

function Form(){
echo'
<section class="page-section" id="Zamowienie">
    <div class="container px-4 px-lg-5 h-100 justify-content-center">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Zamówienie</h2>
                <hr class="divider" />
                <p class="text-muted mb-5"> Co byś dobrego zjadł</p>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">
                <form class="form-horizontal" id="contactForm">
                    <fieldset>
                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="ciastoSelect">Ciasto:</label>
                            <div class="col-md-4">
                                <select id="ciastoSelect" name="ciastoSelect" class="form-control">
                                    <option value="cienkie">Cienkie</option>
                                    <option value="grube">Grube</option>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="miesoSelect">Mięso:</label>
                            <div class="col-md-4">
                                <select id="miesoSelect" name="miesoSelect" class="form-control">
                                    <option value="kurczak">Kurczak</option>
                                    <option value="baranina">Baranina</option>
                                    <option value="mieszane">Mieszane</option>
                                </select>
                            </div>
                        </div>

                        <!-- Multiple Checkboxes -->
                        <div class="form-group needs-validation">
                            Sosy:
                            <div class="col-md-4">
                                <div class="checkbox">
                                    <label for="sauceCheckbox-0">
                                        <input type="checkbox" class="sauceCheckbox" name="sauceCheckbox" id="sauceCheckbox-0" value="czosnek">
                                        Czosnkowy
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="sauceCheckbox-1">
                                        <input type="checkbox" class="sauceCheckbox" name="sauceCheckbox" id="sauceCheckbox-1" value="ostry">
                                        Ostry
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="sauceCheckbox-2">
                                        <input type="checkbox" class="sauceCheckbox" name="sauceCheckbox" id="sauceCheckbox-2" value="ketchup">
                                        Ketchup
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Multiple Radios (inline) -->
                        <div class="form-group needs-validation">
                            Sposób zapłaty:
                            <div class="col-md-4">
                                <label class="radio-inline" for="paymentRadio-0">
                                    <input type="radio" class="paymentRadio" name="paymentRadio" id="paymentRadio-0" value="blik" checked="checked">
                                    Blik
                                </label>
                                <label class="radio-inline" for="paymentRadio-1">
                                    <input type="radio" class="paymentRadio" name="paymentRadio" id="paymentRadio-1" value="karta">
                                    Karta
                                </label>
                                <label class="radio-inline" for="paymentRadio-2">
                                    <input type="radio" class="paymentRadio" name="paymentRadio" id="paymentRadio-2" value="gotowka">
                                    Gotówka
                                </label>
                            </div>
                        </div>

                        <!-- Textarea -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="uwagiText">Uwagi:</label>
                            <div class="col-md-4">
                                <textarea class="form-control" id="uwagiText" name="uwagiText">Dodatkowe uwagi</textarea>
                            </div>
                        </div>

                    </fieldset>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="orderButton"></label>
                        <div class="col-md-4">
                            <button id="orderButton" name="orderButton" class="btn btn-primary">Zamów</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>';

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
