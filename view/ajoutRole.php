<?php ob_start(); ?>

        <form action="index.php?action=insertRole" method="post">

            <label for="role">Nom du rôle :</label>
            <input type="text" id="role" name="role" placeholder="exemple : Dale Cooper" required>

            <input name="submit" type="submit" value="Envoyer">

        </form>

    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "Ajouter un rôle";
    $titre_secondaire = "Ajouter un rôle";
    $lienCss = "formulaire";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";