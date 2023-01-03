<?php
    require_once("helper.php");
    require_once("mySQL/login.php");
    
    error_reporting(E_ALL);
	ini_set("display_errors", 1);

    session_start(['cookie_samesite' => 'Lax']);
    

    //renvoie un bool pour savoir si on est authentifié
    function isAuthenticated(){
        if($_SESSION['logged'] == true){
            return true;
        }
        return false;
    }

    //se connecter
    function connect(){
        chifrPass();
        if(checkPass($_POST["login"],$_POST["mdp"])){
            $_SESSION['logged'] = true;
        }

        return $_SESSION['logged'];
    }

    //se déconnecter
    function disconnect(){
        if($_SESSION['logged']==true){
            $_POST["login"]="";
            $_POST["mdp"]="";
            $_SESSION['logged']=false;
            return true;
        }
        else{
            return false;
        }
    }

    //chiffrer le mot de passe
    function chifrPass(){
        $_POST["mdp"] = hash('sha256',$_POST["mdp"]);
    }
?>
