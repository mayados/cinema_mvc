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
            case "detailGenre" : $ctrlCinema->detailGenre($id); break;
            case "detailRole" : $ctrlCinema->detailRole($id); break;
            case "ajoutActeur" : $ctrlCinema->ajoutActeur(); break; 
            case "insertActeur":
                /* On verifie que cela a bien été soumis via le formulaire */
                if(isset($_POST['submit'])){
                    /* On filtre les input et textarea pour ne pas qu'il y ait des failles allant contre la sécurité */
                    $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_SPECIAL_CHARS);
                    $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_SPECIAL_CHARS);
                    $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_SPECIAL_CHARS);
                    $dateNaissance = filter_input(INPUT_POST, "dateNaissance", FILTER_SANITIZE_SPECIAL_CHARS);
    
                    /* Si nous avons tous les champs remplis correctement */
                    if($nom && $prenom && $sexe && $dateNaissance){
                        /* Si toutes les vérifications sont correctes, on appelle la fonction, avec les valeurs saisies */
                        $ctrlCinema->insertActeur($nom,$prenom,$sexe,$dateNaissance);
                    }
                }       
            break;
        }
    }

?>






