<?php ob_start(); ?>

<p class="compteur">Il y a <?= $requete->rowCount() ?> films</p>

    <div class="container-elements">
        <?php
            foreach($requete->fetchAll() as $film) { 
                $affiche = $film["affiche"];
                ?>
             
                        <a class='elements-link' href="index.php?action=detailFilm&id=<?= $film['id_film']?>">
                             <div class="elements">
                                <p><?=$film["titre"] ?></p>
                                <p><?=$film["date_sortie"] ?></p>
                            </div>    
                            <div class="container-img">
                                <img src="<?= $affiche ?>" alt="">                                 
                            </div>   
                            <div class="infos-film">
                                <p><i class="fa-solid fa-star"></i> <?= $film["note"] ?> /5</p>                            </div>                                                            
                        </a>


        <?php } ?>         

    </div>

    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "Films";
    $titre_secondaire = "Films";
    $lienCss = "listFilms";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 

