<?php ob_start(); ?>

        <form action="index.php?action=insertCasting" method="post">



                <div class="form-champ">
                    <label for="film">Film:</label>

                    <select name="film" id="film">
                        <?php
                            foreach($requeteFilms->fetchAll() as $film) { 
                                    $titre = $film["titre"];
                                    $idFilm = $film["id_film"];
                                ?>
                                <option value="<?= $idFilm ?>" name="<?= $titre ?>"><?= $titre ?></option>
                        <?php } ?>  
                    </select>                              
                </div>
                            
                <div class="form-champ">
                    <label for="acteur">Acteur :</label>

                    <select id='acteur' name="acteur" id="acteur">
                        <?php
                            foreach($requeteActeurs->fetchAll() as $acteur) { 
                                    $identite = $acteur["prenom"]." ".$acteur["nom"];
                                    $idActeur = $acteur["id_acteur"];
                                ?>
                                <option value="<?= $idActeur ?>" name="<?= $identite ?>"><?= $identite ?></option>
                        <?php } ?>  
                    </select>  
                </div>
 
                <div class="form-champ">
                    <label for="role">Role :</label>

                    <select id='role' name="role" id="role">
                        <?php
                                foreach($requeteRoles->fetchAll() as $role) { 
                                        $nomRole = $role["nom_role"];
                                        $idRole = $role["id_role"];
                                    ?>
                                    <option value="<?= $idRole ?>" name="<?= $nomRole ?>"><?= $nomRole ?></option>
                            <?php } ?>  
                    </select>     
                </div>

            <input id="submit" name="submit" type="submit" value="Envoyer">

        </form>

<?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "Ajouter un casting";
    $titre_secondaire = "Ajouter un casting";
    $lienCss = "formulaire";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

?>