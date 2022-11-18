<?php

    // On dit qu'on utilise la class CinemaController située dans le namespace en question
    use Controller\CinemaController;

    // On charge les class automatiquement
    spl_autoload_register(function($class_name){
        include $class_name . '.php';
    });

    // On instancie la class CinemaController
    $ctrlCinema = new CinemaController();

    $id = (isset($_GET["id"])) ? $_GET["id"] : null;

    /* S'il y a une action transmise par l'url en GET */
    if(isset($_GET["action"])){
        /* Pour l'action reçue, on traite le case qui correspond au nom de l'action  */
        switch ($_GET["action"]){
            case "listFilms" : $ctrlCinema->listFilms(); break;
            case "listRealisateurs" : $ctrlCinema->listRealisateurs(); break;
            case "listActeurs" : $ctrlCinema->listActeurs(); break;
            case "listGenres" : $ctrlCinema->listGenres(); break;
            case "listRoles" : $ctrlCinema->listRoles(); break;
            case "detailFilm" : $ctrlCinema->detailFilm($id); break;
            case "detailRealisateur" : $ctrlCinema->detailRealisateur($id); break;
            case "detailActeur" : $ctrlCinema->detailActeur($id); break;
        }
    }

?>






