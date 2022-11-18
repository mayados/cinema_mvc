<?php ob_start(); ?>

        <form action="index.php?action=insertActeur" method="post">

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" placeholder="Nom" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>

            <label for="sexe">Sexe :</label>
            <input type="text" id="sexe" name="sexe" placeholder="Homme/Femme" required>

            <label for="dateNaissance">Date de naissance :</label>
            <input type="text" id="dateNaissance" name="dateNaissance" placeholder="2022-11-18" required>

            <input name="submit" type="submit" value="Envoyer">

        </form>

    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "Ajouter un acteur";
    $titre_secondaire = "Formulaire : ajouter un acteur";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";