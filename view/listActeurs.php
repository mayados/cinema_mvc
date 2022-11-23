<?php ob_start(); ?>

<p class="compteur">Il y a <?= $requete->rowCount() ?> acteurs</p>

    <div class="container-elements">
        <?php
            foreach($requete->fetchAll() as $acteur) { ?>

                        <a class="elements-link" href="index.php?action=detailActeur&id=<?= $acteur['id_acteur']?>">
                            <div class="elements">                        
                                 <p><?=$acteur["prenom"] ?> <?=$acteur["nom"] ?></p>
                            </div>
                            <div class="container-img">
                                <img src="<?= $acteur["photo"] ?>" alt="">
                            </div>
                        </a>
        <?php } ?>          
    </div>
     



    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "Liste des Acteurs";
    $titre_secondaire = "Liste des acteurs";
    $lienCss = "list";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 