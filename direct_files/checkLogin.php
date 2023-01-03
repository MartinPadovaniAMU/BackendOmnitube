<?php
    require_once("../helper.php");
    require_once("../mySQL/login.php");
    
    $_SESSION['logged'] = false;
    $_SESSION['login'] = $_POST['login'];

    if(checkLogin($_POST["login"])){
        if(connect()){
            sendMessage(["content" => "Connexion succeed", "profileType" => checkType($_POST["login"])["type"]]);
        }
        else{
            sendError("Bad pass");
        }
    }
    else{
        sendError("Bad Username");
    }
    function checkType($login){
        return(verifType($login));
    }
?>
