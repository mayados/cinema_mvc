<?php

/* Dans ce fichier, on déclare la base de données */
namespace Model;

abstract class Connect {

    // Les constantes appartiennent à une class, pas à une instanciation
    const HOST = "localhost";
    const DB = "cinema";
    const USER = "root";
    const PASS = "";

    // Une fonction static utilise des constantes = données qui ne changent pas
    public static function seConnecter(){
        try{
            return new \PDO(
                "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8", self::USER, self::PASS); //On définit la connexion avec les constantes entrées dans l'objet
        }catch(\PDOException $ex) {
            return $ex->getMessage(); //S'il y a une erreur, on retourne uniquement le message d'erreur
        }
    }

}


?>