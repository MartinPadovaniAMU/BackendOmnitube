<?php
    require_once("../helper.php");
    require_once("../mySQL/video.php");

    $idu = $_SESSION["login"];
    $nom = $_POST["nomPlaylist"];
    if($_SESSION['logged']==true){
        createPlaylist($idu,$nom);
        sendMessage("Playlist créée");
    }
    else{
        sendError("Non connecté");
    }
?>