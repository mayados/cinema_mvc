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
            SELECT titre, date_sortie, id_film
            FROM film
        ");

        // On relie à la vue qui nous intéresse
        
        require "view/listFilms.php";
    }

    public function listRealisateurs() {

        //On stocke dans une variable $pdo la connection à la base de données
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT nom, prenom, id_realisateur
            FROM personne 
            NATURAL JOIN realisateur
            WHERE id_realisateur IS NOT NULL
        ");

        // On relie à la vue qui nous intéresse
        require "view/listRealisateurs.php";
    }

    public function listActeurs() {

        //On stocke dans une variable $pdo la connection à la base de données
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT nom, prenom, id_acteur
            FROM personne 
            NATURAL JOIN acteur
            WHERE id_acteur IS NOT NULL
        ");

        // On relie à la vue qui nous intéresse
        require "view/listActeurs.php";
    }

    public function listGenres() {

        //On stocke dans une variable $pdo la connection à la base de données
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT libelle
            FROM genre
        ");

        // On relie à la vue qui nous intéresse
        require "view/listGenres.php";
    }

    public function listRoles() {

        //On stocke dans une variable $pdo la connection à la base de données
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT nom_role
            FROM role
        ");

        // On relie à la vue qui nous intéresse
        require "view/listRoles.php";
    }

    public function detailFilm($id) {

        //On stocke dans une variable $pdo la connection à la base de données
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT id_film, titre, duree, date_sortie, synopsis, nom, prenom, nom_role
            FROM casting
            LEFT JOIN acteur ON casting.id_acteur = acteur.id_acteur
            NATURAL JOIN film
            NATURAL JOIN personne
            NATURAL JOIN role 
            WHERE id_film = :id
        ");
        $requete->execute(["id"=> $id]);

        // On relie à la vue qui nous intéresse
        require "view/detailFilm.php";
    }

    public function detailRealisateur($id) {

        //On stocke dans une variable $pdo la connection à la base de données
        $pdo = Connect::seConnecter();
        /* L'élément id en paramètres est un élément variable, il faut donc prepare() pour s'assurer que ce qui est entré en paramètres correspond bien à ce qu'on nous demande */
        $requete = $pdo->prepare("
            SELECT titre, nom, prenom, sexe, date_naissance, id_realisateur
            FROM film
            NATURAL JOIN personne
            NATURAL JOIN realisateur
            WHERE id_realisateur = :id
        ");
        /* On execute si l'id entré est bien égal à l'id de la bdd */
        $requete->execute(["id"=> $id]);

        // On relie à la vue qui nous intéresse
        require "view/detailRealisateur.php";
    }

    public function detailActeur($id) {

        //On stocke dans une variable $pdo la connection à la base de données
        $pdo = Connect::seConnecter();
        /* L'élément id en paramètres est un élément variable, il faut donc prepare() pour s'assurer que ce qui est entré en paramètres correspond bien à ce qu'on nous demande */
        $requete = $pdo->prepare("
            SELECT titre, nom, prenom, sexe, date_naissance, id_acteur
            FROM casting
            NATURAL JOIN personne
            NATURAL JOIN acteur
            NATURAL JOIN film
            WHERE id_acteur = :id
        ");
        /* On execute si l'id entré est bien égal à l'id de la bdd */
        $requete->execute(["id"=> $id]);

        // On relie à la vue qui nous intéresse
        require "view/detailActeur.php";
    }

}

?>
