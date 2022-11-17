<?php

    // On dit qu'on utilise la class CinemaController située dans le namespace en question
    use Controller\CinemaController;

    // On charge les class automatiquement
    spl_autoload_register(function($class_name){
        include $class_name . '.php';
    });

    // On instancie la class CinemaController
    $ctrlCinema = new CinemaController();

    /* S'il y a une action transmise par l'url en GET */
    if(isset($_GET["action"])){
        /* Pour l'action reçue, on traite le case qui correspond au nom de l'action  */
        switch ($_GET["action"]){
            case "listFilms" : $ctrlCinema->listFilms(); break;
            case "listActeurs" : $ctrlCinema->listActeurs(); break;
        }
    }

?>