<?php
    require_once("../helper.php");
    
    $id_video = $_POST["idvid"];
    $origin = $_POST["originvid"];

    $config = file_get_contents('../config.json');
    $config = json_decode($config);

    $liste_finale = array();
    $i=0;
    foreach($config->services as $serv){
        if($serv->origin == $origin){
            //Récupérer la date
            $apidate = $serv->snippet;
            $apikey = $serv->pkey;
            if($apikey[0] == "yes"){
                $apidate = str_replace("APIKEY",$apikey[1],$apidate);
            }
            $apidate = str_replace("IDVID",$id_video,$apidate);

            $apidate = file_get_contents($apidate);
            $apidate = json_decode($apidate);
            
            foreach($serv->date as $el){
                if(is_numeric($el)){
                    $apidate = $apidate[$el];
                }
                else{
                    $apidate = $apidate->$el;
                }
            }

            array_push($liste_finale,$apidate);

            //Récupérer le code de la vidéo
            $apititre = $serv->snippet;
            if($apikey[0] == "yes"){
                $apititre = str_replace("APIKEY",$apikey[1],$apititre);
            }
            $apititre = str_replace("IDVID",$id_video,$apititre);

            $apititre = file_get_contents($apititre);
            $apititre = json_decode($apititre);
            foreach($serv->titre as $el){
                if(is_numeric($el)){
                    $apititre = $apititre[$el];
                }
                else{
                    $apititre = $apititre->$el;
                }
            }
            array_push($liste_finale, $apititre);
            
            //Récupérer le score de la vidéo
            $score = "unknown";
            if($serv->apiscore != "no"){
                $api_score = $serv->apiscore;
                $score_path = $serv->score;
                if($serv->pkey[0] == "yes"){
                    $api_score = str_replace("APIKEY",$serv->pkey[1],$api_score);
                }
                $api_score = str_replace("IDVID",$id_video,$api_score);
                $score = file_get_contents($api_score);
                $score = json_decode($score); 
                
                foreach($score_path as $el){
                    if(is_numeric($el)){
                        $score = $score[$el];
                    }
                    else{
                        $score = $score->$el;
                    }
                }
            }
            array_push($liste_finale,$score);
        }
    }
    sendMessage($liste_finale);
?>