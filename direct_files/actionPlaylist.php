<?php
    require_once("../helper.php");
    require_once("../mySQL/video.php");

    function generateUrl($origin,$video_code){        
        $config = file_get_contents('../config.json');
        $config = json_decode($config);
        $res = array();
        foreach($config->services as $serv){
            if($origine == $serv->nom){
                array_push($res,$serv->origin);
                array_push($res,$serv->adresse . $video_code);
            }
        }
        
        return($res);

    }

    $action = $_POST["action"];
    if($_SESSION['logged'] == true){
        if($action == "del"){
            $idp = $_POST["idp"];
            $url = generateUrl($_POST["video_id"]);
            $login = $_POST["login"];
            deleteVideo($idp,$url,$login);
            sendMessage("Vidéo supprimée");
        }
        if($action == "up"){
            $idp = $_POST["idp"];
            $url = $_POST["url"];
            up($idp,$url);
            sendMessage("Vidéo remontée");
        }
        if($action == "down"){
            $idp = $_POST["idp"];
            $url = $_POST["url"];
            down($idp,$url,$login);
            sendMessage("Vidéo descendue");
        }
    }
    else{
        sendError("Erreur ! Non connecté");
    }
?>