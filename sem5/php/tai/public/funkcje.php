<?php

function Form(){
echo'
            <form class="form-horizontal" id="contactForm" method="GET">
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
                            <button type="submit" value="orderButton" id="orderButton" name="orderButton" class="btn btn-primary">Zamów</button>
                        </div>
                    </div>

                </form>';

}


function walidacja($bd)
{



    $args = [
        'ciastoSelect' => [ "filter" => FILTER_VALIDATE_REGEXP, "options" => ["regexp" => "/^(cienkie|grube)$/"]],
        'miesoSelect' => [ "filter" => FILTER_VALIDATE_REGEXP, "options" => ["regexp" => "/^(kurczak|baranina|mieszane)$/"]],
        'sauceCheckbox'=>    FILTER_SANITIZE_STRING,     
        'paymentRadio' => [ "filter" => FILTER_VALIDATE_REGEXP, "options" => ["regexp" => "/^(blik|gotowka|karta)$/"]],
        'uwagiText' => FILTER_SANITIZE_STRING
    ];

    $dane = filter_input_array(INPUT_GET, $args);
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



function dodajdoBD($bd,$dane){
        $query = "INSERT INTO `lab12`.`orders`
        (
       
        `Ciasto`,
        `Mieso`,
        `Sosy`,
        `Paymant`,
        `Uwagi`)
        VALUES
        (";

        echo $query;
    
        $query .= "'".$dane['ciastoSelect']."',";
        $query .= "'".$dane['miesoSelect']."',";
        $query .= "'".$dane['sauceCheckbox']."',";
        $query .= "'".$dane['paymentRadio']."',";
        $query .= "'".$dane['uwagiText']."');";
        var_dump($query);
        if($bd->insert($query)) {
            echo "Zapisano";
        } else {
            echo "Nie zapisano";
        }
    }
