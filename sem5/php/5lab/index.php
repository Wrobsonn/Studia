<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    
    <?php
    include_once('klasy/klasa.php');
    include_once('klasy/RegistrationForm.php');
    (User::getAllUsers("user.json"));
    $rf = new RegistrationForm(); //wyświetla formularz rejestracji
    if (filter_input(INPUT_POST, 'submit',
   FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
    $user = $rf->checkUser(); //sprawdza poprawność danych
    if ($user === NULL)
    echo "<p>Niepoprawne dane rejestracji.</p>";
    else{
    echo "<p>Poprawne dane rejestracji:</p>";
    $user->show();
    $user->save("user.json");
    }
    }
    ?>




</body>

</html>