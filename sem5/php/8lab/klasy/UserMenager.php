<?php

include_once ("klasy/Baza.php");

class UserManager {
    function loginForm() {
    ?>
    <h3>Formularz logowania</h3><p>
    <form action="processLogin.php" method="post">
    nick: <br/><input name="login" /><br/>
        haslo: <br/><input name="passwd" type="password"/><br/>
        <button type="reset">Anuluj</button>
    <input type="submit" value="zaloguj" name="zaloguj" />
    </form></p> <?php
    }
    function login($db) {
       $args = [
            'login' => FILTER_SANITIZE_ADD_SLASHES , # FILTER_SANITIZE_MAGIC_QUOTES nieaktualne a jest to samo. od 7.3 przestarzale usuniete od wersji 8.0
            'passwd' => FILTER_SANITIZE_ADD_SLASHES 
            ];
           
    $dane = filter_input_array(INPUT_POST, $args);
    var_dump($dane);
    $id = $db->selectUser($dane['login'], $dane['passwd'], "users");
    $login = $dane["login"];
    $passwd = $dane["passwd"];
    $userId = $db->selectUser($login, $passwd, "users");
    if ($userId >= 0) { //Poprawne dane
    session_start();
    //var_dump("DELETE FROM `klienci`.`logged_in_users` where sessionId ='".session_id()."'");
    $db->delete("DELETE FROM `klienci`.`logged_in_users` where userId =$userId");
    $query = "INSERT INTO `klienci`.`logged_in_users`
    (
    `sessionId`,	
    `userId`,	
    `lastUpdate`)
    VALUES
    (";
    $query .= "'".session_id()."',";
    $query .= "'".$id."',";
    $query .= "'".(new DateTime())->format("Y-m-d H:i:s")."');";
    var_dump($query);
   
        $db->insert($query);
    
    return $userId;}
    else
        return -1;
    }

    public function logout($db)
    {
        if (!session_id())
            session_start();
            $db->delete("DELETE FROM `klienci`.`logged_in_users` where sessionId ='".session_id()."'");
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 42000, '/');
        }
        session_destroy();
    }

    public function getLoggedInUser($db,$sessionId)
    {
       
        $userId = $db->select("SELECT userId FROM `logged_in_users` WHERE sessionId='$sessionId'",["userId"]);
        if (!$userId)
            return -1;
        else
            return $userId;
    }
}

?>