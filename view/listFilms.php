<?php ob_start(); ?>

<p class="compteur">Il y a <?= $requete->rowCount() ?> films</p>

    <div class="container-elements">
        <?php
            foreach($requete->fetchAll() as $film) { ?>
                    <div class="elements">
                        <a class='elements-link' href="index.php?action=detailFilm&id=<?= $film['id_film']?>">
                            <p><?=$film["titre"] ?></p>
                            <p><?=$film["date_sortie"] ?></p>
                        </a>
                    </div>
        <?php } ?>           
    </div>

    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "Liste des films";
    $titre_secondaire = "Liste des films";
    $lienCss = "list";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 

