<?php ob_start(); ?>

        <form action="index.php?action=insertGenre" method="post">

            <label for="nom">Nom du film :</label>
                <input type="text" id="nom" name="nom" placeholder="exemple : Elephant Man" required>

            <label for="duree">Durée :</label>
                <input type="text" id="duree" name="duree" placeholder="exemple : 02:29:00" required>

            <label for="dateSortie">Date de sortie :</label>
                <input type="text" id="dateSortie" name="dateSortie" placeholder="2022-11-18" required>

            <label for="realisateur-select">Choisissez un réalisateur:</label>

            <select name="realisateurs" id="realisateur-select">
                <?php
                    foreach($requeteRealisateurs->fetchAll() as $realisateur) { ?>
                        <option value=""><?=$realisateur["nom"]." ".$realisateur["prenom"] ?></option>
                <?php } ?>   
            </select>

            <label for="genre-select">Choisissez un genre:</label>

            <select name="genres" id="genre-select">
                <?php
                    foreach($requeteGenres->fetchAll() as $genre) { ?>
                        <option value=""><?=$genre["libelle"] ?></option>
                <?php } ?>   
            </select>

                <input name="submit" type="submit" value="Envoyer">

        </form>

    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "Ajouter un film";
    $titre_secondaire = "Formulaire : ajouter un film";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";