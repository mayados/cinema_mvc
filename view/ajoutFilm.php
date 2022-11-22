<?php ob_start(); ?>

        <form action="index.php?action=insertFilm" method="post">

            <div class="form-champ">
                <label for="nom">Nom du film :</label>
                    <input type="text" id="nom" name="nom" placeholder="exemple : Elephant Man" maxlength="100" required>                
            </div>
            <div class="form-champ">
                <label for="duree">Durée :</label>
                    <input type="text" id="duree" name="duree" placeholder="exemple : 02:29:00" maxlength="8" required>                
            </div>
            <div class="form-champ">
                <label for="dateSortie">Date de sortie :</label>
                    <input type="text" id="dateSortie" name="dateSortie" placeholder="2022-11-18" maxlength="10" required>                
            </div>
            <div class="form-champ">
                <label for="synopsis">Synopsis :</label>
                    <textarea name="synopsis" id="synopsis" placeholder="Résumé du film" required></textarea>                
            </div>
            <div class="form-champ">
                <label for="affiche">Affiche :</label>
                    <textarea name="affiche" id="affiche" placeholder="URL de l'affiche" redquired></textarea>                
            </div>
            <div class="form-champ">
                <label for="nom">Note (sur 5) :</label>
                    <input type="text" id="note" name="note" placeholder="exemple : 2" maxlength="3" required>                
            </div>
            <div class="form-champ">
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
            </div>
            <div class="form-champ">
                <label for="genre">Choisissez le(s) genre(s):</label>

                <select id='genre-select' name="genre[]" id="genre" multiple>
                    <?php
                        foreach($requeteGenres->fetchAll() as $genre) { 
                                $libelle = $genre["libelle"];
                                $idGenre = $genre["id_genre"];
                            ?>
                            <option value="<?= $idGenre ?>" name="<?= $libelle ?>"><?= $libelle ?></option>
                    <?php } ?>   
                </select>                
            </div>

            <input id="submit" name="submit" type="submit" value="Envoyer">

        </form>

<?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "Ajouter un film";
    $titre_secondaire = "Ajouter un film";
    $lienCss = "formulaire";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

?>