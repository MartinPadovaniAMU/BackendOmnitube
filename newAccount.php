<?php
    require_once("helper.php");
    require_once("mySQL/createAccount.php");
    require_once("auth.php");

    error_reporting(E_ALL);
	ini_set("display_errors", 1);

    // créer un compte
    function createAccount($login, $pass,$mail,$type){
        $_POST["mdp"] = $pass;
        chifrPass();
        create($login, $_POST["mdp"],$mail,$type);
    }

    //supprimer un compte
    function deleteAccount($login, $pass){
        if($_SESSION['logged']==true){
            delete($login);
            $_POST["login"]="";
            $_SESSION['logged'] = false;
            return true;
        }
        else{
            return false;
        }
    }

    function modifiyPass($login,$newPass){
        $_POST["mdp"] = $newPass;
        $_POST["newPass"] = "";
        chifrPass();
        if($_SESSION['logged']==true){
            modify($login,$_POST["mdp"]);
            return true;
        }
        else{
            return false;
        }
    }
?>
