<?php
//Le namespace de la class CinemaController est Controller
namespace Controller;

//On utilise la class Connect située dans le namespace Model
use Model\Connect;

//On déclare la class CinemaController
class CinemaController {

    /* Fonction permettant de lister les films */
    public function listFilms() {

        //On stocke dans une variable $pdo la connection à la base de données
        $pdo = Connect::seConnecter();
        //On stocke dans une variable $requete la connexion à la base de données à laquelle on envoie une requête , ici on demande le titre du film et sa date de sortie
        $requete = $pdo->query("
            SELECT titre, date_sortie
            FROM film
        ");
        
        // On relie à la vue qui nous intéresse
        require "view/listFilms.php";
    }

}

?>