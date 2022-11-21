<?php ob_start(); ?>

        <form action="index.php?action=insertFilm" method="post">

            <label for="nom">Nom du film :</label>
                <input type="text" id="nom" name="nom" placeholder="exemple : Elephant Man" required>

            <label for="duree">Durée :</label>
                <input type="text" id="duree" name="duree" placeholder="exemple : 02:29:00" required>

            <label for="dateSortie">Date de sortie :</label>
                <input type="text" id="dateSortie" name="dateSortie" placeholder="2022-11-18" required>

            <label for="synopsis">Synopsis :</label>
                <textarea name="synopsis" id="synopsis" placeholder="Résumé du film" required></textarea>

            <label for="affiche">Affiche :</label>
                <textarea name="affiche" id="affiche" placeholder="URL de l'affiche" redquired></textarea>

            <label for="realisateur">Choisissez un réalisateur:</label>

            <select name="realisateur" id="realisateur">
                <?php
                    foreach($requeteRealisateurs->fetchAll() as $realisateur) { 
                             $real = $realisateur["nom"]." ".$realisateur["prenom"];
                             $realNom = $realisateur["nom"];
                             $realId = $realisateur["id_realisateur"];
                        ?>

                        <option value="<?=$realId ?>" name="<?=$realNom ?>"><?=$real ?></option>
                <?php } ?>   
            </select>

            <label for="genre">Choisissez le(s) genre(s):</label>

            <select  name="genre[]" id="genre" multiple>
                <?php
                    foreach($requeteGenres->fetchAll() as $genre) { 
                            $libelle = $genre["libelle"];
                            $idGenre = $genre["id_genre"];
                        ?>
                        <option value="<?= $idGenre ?>" name="<?= $libelle ?>"><?= $libelle ?></option>
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

?>