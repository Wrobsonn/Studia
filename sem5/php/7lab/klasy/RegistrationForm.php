<?php
class RegistrationForm {
 protected $user;
 function __construct(){ ?>
 <h3>Formularz rejestracji</h3><p>
 <form action="index.php" method="post">
 Nazwa użytkownika: <br/><input name="fullName" /><br/>
 nick: <br/><input name="userName" /><br/>
 haslo: <br/><input name="passwd" /><br/>
 email: <br/><input name="email" /><br/>
 <button type="reset">Anuluj</button>
 <button type="submit" name="submit" value="Rejestruj">Rejestruj</button>
</form></p>
 <?php
 }
 function checkUser($db){ // podobnie jak metoda validate z lab4
    $args = [
        'fullName' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^[A-Z]{1}[a-z]{1,25}$/']],
        'userName' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^[A-Za-z]{1,25}$/']],
        "email" => FILTER_VALIDATE_EMAIL,
        'passwd' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^[0-9A-Za-z!@#$%^&*()-]{8,64}$/']]
        ];
 
 $dane = filter_input_array(INPUT_POST, $args);
 $errors = "";
    foreach ($dane as $key => $val) {
        if ($val === false or $val === NULL) {
            $errors .= $key . " ";
        }
    }

 if ($errors === "") {
 
 var_dump($dane['userName']);
 $nick = $dane['userName'];
//var_dump($nick);
 var_dump($db->select("select userName from users where users.userName like '%$nick%'", ["userName"]));
 $nickwBazie = strip_tags($db->select("select userName from users where users.userName like '%$nick%'", ["userName"]));
 if($nick == $nickwBazie){
    echo "<p>Podany user znajduje sie w bazie danych</p>";
    $this->user = NULL;
 }
 else{
    $this->user=new User($dane['userName'], $dane['fullName'],$dane['email'],$dane['passwd']);
 }
 } 
 else {
 echo "<p>Błędne dane:$errors</p>";
 $this->user = NULL;
 }
 return $this->user;
 }
}


?>