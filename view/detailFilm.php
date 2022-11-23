<?php ob_start(); 
foreach($requeteFilm->fetchAll() as $film) { 
    
    $titreFilm = $film["titre"];
    $filmSortie = $film["date_sortie"];
    $filmDuree = $film["duree"];
    $affiche = $film["affiche"];
    $synopsis = $film["synopsis"];
    $note = $film["note"];
    $filmId = $film["id_film"];
    $nombreLike = $film["nombreLike"];
}

?>
    <div id="retour">
        <a href="index.php?action=listFilms">
            <i class="fa-solid fa-circle-left"></i>
            <p>Retour</p>
        </a>  
    </div>
    <div id="container-infos">
            <div id="synopsis">
                <h4>Synopsis :</h4>           
                <p><?= $synopsis ?></p>        
            </div>    
        <img src="<?= $affiche ?>" alt="affiche du film">          
    </div>

    <div id="container-bottom">
        <div id="infos-film">
                <p>Durée : <?= $filmDuree ?></p>
                <p>Date de sortie : <?= $filmSortie?></p>
                <p><i class="fa-solid fa-star"></i> <?= $note ?> /5</p>
                <a href="index.php?action=liker&id=<?= $filmId?>"><i class="fa-regular fa-thumbs-up"></i></a>
                <p><?= $nombreLike ?> j'aime</p>
            </div> 
        <div id="container-casting">
            <?php 
                if( $requeteCasting->rowCount() > 0){ 
                /* On affiche le code HTML / php ci-dessous uniquement s'il y a au moins un casting */        
            ?>

            <h4>Casting</h4>

            <ul>
                <?php
                    foreach($requeteCasting->fetchAll() as $casting) { ?>
                            <li><?=$casting["prenom"]." ".$casting["nom"] ?> dans le rôle de <?=$casting["nom_role"] ?></li>
                             <td></td>
                <?php } ?>                   
            </ul>           
        </div>
    </div>
    <?php
    }
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = $titreFilm;
    $titre_secondaire = $titreFilm;
    $lienCss = "detailFilm";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 
