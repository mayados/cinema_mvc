<?php ob_start(); ?>

<p>Il y a <?= $requete->rowCount() ?> realisateurs</p>

    <table>
        <thead>
            <tr>
                <th>NOM</th>
                <th>PRENOM</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $realisateur) { ?>
                    <tr>
                        <td><a href="index.php?action=detailRealisateur&id=<?= $realisateur['id_realisateur']?>"><?=$realisateur["nom"] ?></td>
                        <td><?=$realisateur["prenom"] ?></td>
                    </tr>
            <?php } ?>   
        </tbody>
    </table>

    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "Liste des Realisateurs";
    $titre_secondaire = "Liste des Realisateurs";
    $lienCss = "listRealisateurs";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 