<?php
include_once ("klasy/klasa.php");
include_once ("klasy/Baza.php");
include_once ("klasy/RegistrationForm.php");
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    
    <?php
    $user = new User("","","","");
    $rf = new RegistrationForm(); //wyświetla formularz rejestracji
    $db = new Baza("localhost", "root", "", "klienci");
    if (filter_input(INPUT_POST, 'submit',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
    $user = $rf->checkUser($db); //sprawdza poprawność danych
    if ($user === NULL)
    echo "<p>Niepoprawne dane rejestracji.</p>";
    else{
    echo "<p>Poprawne dane rejestracji:</p>";
    $user->saveDB($db);
    }

    
    }
    echo $db->select("select * from users ", ["id", "userName", "fullName", "email", "passwd", "status", "date"]);
    ?>




</body>

</html>