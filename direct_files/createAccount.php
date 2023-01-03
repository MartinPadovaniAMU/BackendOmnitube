<?php
    require_once("../helper.php");
    require_once("../newAccount.php");
    
    if(!checkLogin($_POST["login"])){
        createAccount($_POST["login"],$_POST["mdp"],$_POST["mail"],$_POST["type"]);
        sendMessage("Account created!");
    }
    else{
        sendError("Username already existing");
    }
    
?>
