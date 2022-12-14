<?php ob_start(); ?>

<p class="compteur">Il y a <?= $requete->rowCount() ?> realisateurs</p>

    <div class="container-elements">
         <?php
            foreach($requete->fetchAll() as $realisateur) { ?>

                        <a class="elements-link" href="index.php?action=detailRealisateur&id=<?= $realisateur['id_realisateur']?>">
                        <div class="elements">
                            <p><?=$realisateur["prenom"] ?> <?=$realisateur["nom"] ?> </p>
                         </div>
                         <div class="container-img">
                             <img src="<?= $realisateur["photo"]?>" alt="">
                         </div>
                        </a>


        <?php } ?>           
    </div>



    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "Liste des Realisateurs";
    $titre_secondaire = "Liste des Realisateurs";
    $lienCss = "listPersonne";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 