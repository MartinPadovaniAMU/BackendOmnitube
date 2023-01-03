<?php
    require_once("../helper.php");
    require_once("../newAccount.php");
    
    if(deleteAccount($_POST["login"],$_POST["mdp"])){
        sendMessage("Account deleted!");
    }
    else{
        sendError("User not connected");
    }
    
?>
