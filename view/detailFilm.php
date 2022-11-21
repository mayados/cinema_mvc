<?php ob_start(); ?>

<p>Casting du film</p>

    <table>
        <thead>
            <tr>
                <th>ACTEUR</th>
                <th>ROLE</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requeteFilm->fetchAll() as $film) { 
                    
                    $titreFilm = $film["titre"];
                    $filmSortie = $film["date_sortie"];
                    $filmDuree = $film["duree"];
                    $affiche = $film["affiche"];
                    $synopsis = $film["synopsis"];
                    ?>
                    <!-- <tr>
                        <td><?=$film["nom"]." ".$film["prenom"] ?></td>
                        <td><?=$film["nom_role"] ?></td>
                    </tr> -->
            <?php } ?>   
        </tbody>
    </table>

    <img src="<?= $affiche ?>" alt="affiche du film">
    <h4>synopsis :</h4>
    <p><?= $synopsis ?></p>

    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "Liste des films";
    $titre_secondaire = "Film : ".$titreFilm." (Durée : ".$filmDuree." / Date de sortie : ".$filmSortie.")";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 
