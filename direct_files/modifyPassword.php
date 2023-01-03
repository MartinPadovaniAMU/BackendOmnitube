<?php
    require_once("../helper.php");
    require_once("../newAccount.php");
    
    // rentrer le login, le password et le nouveau password
    chifrPass();
    if(checkPass($_POST["login"],$_POST["mdp"])){
        if(modifyPass($_POST["newPass"])){
            return sendMessage("Password changed");
        }
        sendError("Can't change password if not connected");
    }
    else{
        sendError("Bad old password");
    }
    
?>
