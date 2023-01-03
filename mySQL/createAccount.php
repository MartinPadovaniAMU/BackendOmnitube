<?php
    require_once("dbconnect.php");

    error_reporting(E_ALL);
	ini_set("display_errors", 1);

    function create($login, $pass,$mail,$type){
        global $PDO; 
        $table = "Utilisateur";
        $query = "INSERT INTO $table VALUES (?,?,?,?)";
        $data = array($login,$pass,$mail,$type);
        $statement = $GLOBALS["PDO"]->prepare($query);
        $exec = $statement->execute($data);
    }

    function delete($login){
        global $PDO;
        $table = "Utilisateur";
        $query = "DELETE FROM $table WHERE login=?";
        $data = array($login);
        $statement = $GLOBALS["PDO"]->prepare($query);
        $exec = $statement->execute($data);
    }

    function modify($login, $pass, $mail){
        global $PDO;
        $table = "Utilisateur";
        $query = "UPDATE $table SET password = ? WHERE login = ? AND mail=?";
        $data = array($pass, $login, $mail);
        $statement = $GLOBALS["PDO"]->prepare($query);
        $exec = $statement->execute($data);
    }
?>
