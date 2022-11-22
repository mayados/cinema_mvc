<?php ob_start(); 
foreach($requeteFilm->fetchAll() as $film) { 
    
    $titreFilm = $film["titre"];
    $filmSortie = $film["date_sortie"];
    $filmDuree = $film["duree"];
    $affiche = $film["affiche"];
    $synopsis = $film["synopsis"];
    $note = $film["note"];
}

?>

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
                <p>Note : <?= $note ?> /5</p>
            </div> 
        <div id="container-casting">
            <?php 
                if( $requeteCasting->rowCount() > 0){ 
                /* On affiche le code HTML / php ci-dessous uniquement s'il y a au moins un casting */        
            ?>

            <h4>Casting</h4>

                <table>
                    <thead>
                        <tr>
                            <th>ACTEUR</th>
                            <th>ROLE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($requeteCasting->fetchAll() as $casting) { ?>
                                    <td><?=$casting["prenom"]." ".$casting["nom"] ?></td>
                                    <td><?=$casting["nom_role"] ?></td>
                        <?php } ?>   
                    </tbody>
                </table>               
        </div>
              
    </div>
 
    <?php
    }
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "Liste des films";
    $titre_secondaire = $titreFilm;
    $lienCss = "detailFilm";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 
