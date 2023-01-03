<?php
    require_once("../helper.php");
    require_once("../mySQL/video.php");

    $nom = $_POST["nomPlaylist"];
    if($_SESSION['logged'] == true){
        deletePlaylist($idp);
        sendMessage("Playlist détruite");
    }
    else{
        sendError("Non connecté");
    }
?>