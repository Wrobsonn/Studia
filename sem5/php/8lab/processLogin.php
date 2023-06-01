<?php
include_once ("klasy/klasa.php");
include_once ("klasy/Baza.php");
include_once ("klasy/UserMenager.php");
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
<?php
$um = new UserManager();
$db = new Baza("localhost", "root", "", "klienci");
 if (filter_input(INPUT_GET, "akcja")=="wyloguj") {
 $um->logout($db);
 }
 //kliknięto przycisk submit z name = zaloguj
 if (filter_input(INPUT_POST, "zaloguj")) {
 $userId=$um->login($db); //sprawdź parametry logowania
 if ($userId > 0) {
 //echo "<p>Poprawne logowanie.<br />";
 //echo "Zalogowany użytkownik o id=$userId <br />";
 
 //echo "<a href='processLogin.php?akcja=wyloguj' >
//Wyloguj</a> </p>";
header("location:testLogin.php"); 
} else {
 echo "<p>Błędna nazwa użytkownika lub hasło</p>";
 $um->loginForm(); //Pokaż formularz logowania
 }
 } else {
 //pierwsze uruchomienie skryptu processLogin
 $um->loginForm();
 }
 ?>

</body>

</html>