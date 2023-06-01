<?php

date_default_timezone_set('UTC');

class User{
    const STATUS_USER = 1;
    const STATUS_ADMIN = 2;
 protected $userName;    //nazwę użytkownika,
 protected $passwd;     //hasło,
 protected $fullName;    //imię i nazwisko,
 protected $email;       //adres e-mail,
 protected $date;        //data
 protected $status;      //status

 function __construct($userName1, $fullName1, $email1, $passwd1 ){
    //implementacja konstruktora
    $this->status=User::STATUS_USER;
    $this->userName=$userName1;
    $this->fullName=$fullName1;
    $this->email=$email1;
    $this->passwd=password_hash($passwd1, PASSWORD_DEFAULT);
    $this->date =  new datetime();
    
}
Public function show() {
    echo "User Name : ". $this->userName.", Password ".$this->passwd.", Full Name :".$this->fullName. ", Email :".$this->email.", Status :".$this->status.", Date :",$this->date->format('Y-m-d');
}

function setUserName($userName1){
$this->userName = $userName1;
} 
function getUserName(){
return $this->userName;
}

static function getAllUsers($plik){
    $tab = json_decode(file_get_contents($plik));
    //var_dump($tab);
    foreach ($tab as $val){
    echo "<p>".$val->userName." ".$val->fullName." ".$val->date."
   </p>";
    }
   }
   

function toArray(){
    $arr=[
    "userName" => $this->userName,
    "fullName" => $this->fullName,
    "email" => $this->email,
    "password" => $this->passwd,
    "date" =>$this->date->format('Y-m-d')
    //uzupełnij pozostałe
    //. . .
    ];
    return $arr;
   }
   function save($plik){
    $tab = json_decode(file_get_contents($plik),true);
    array_push($tab,$this->toArray());
    file_put_contents($plik, json_encode($tab));
   }



}
?>