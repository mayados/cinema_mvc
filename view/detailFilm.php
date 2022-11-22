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

    <img src="<?= $affiche ?>" alt="affiche du film">
    <h4>synopsis :</h4>
    <p><?= $synopsis ?></p>

 
<?php 
    if( $requeteCasting->rowCount() > 0){ 
    /* On affiche le code HTML / php ci-dessous uniquement s'il y a au moins un casting */        
?>

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
                foreach($requeteCasting->fetchAll() as $casting) { ?>
                        <td><?=$casting["nom"]." ".$casting["prenom"] ?></td>
                        <td><?=$casting["nom_role"] ?></td>
            <?php } ?>   
        </tbody>
    </table>



    <?php
    }
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "Liste des films";
    $titre_secondaire = "Film : ".$titreFilm." (Durée : ".$filmDuree." / Date de sortie : ".$filmSortie." / Note : ".$note."/5)";
    $lienCss = "detailFilm";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 
