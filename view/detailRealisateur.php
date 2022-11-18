<?php ob_start();?>

<p>Ce réalisateur a réalisé <?= $requete->rowCount() ?> films</p>

    <table>
        <thead>
            <tr>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>SEXE</th>
                <th>NAISSANCE</th>
                <th>TITRE FILMS</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $realisateur) { ?>
                    <tr>
                        <td><?=$realisateur["nom"] ?></td>
                        <td><?=$realisateur["prenom"] ?></td>
                        <td><?=$realisateur["sexe"] ?></td>
                        <td><?=$realisateur["date_naissance"] ?></td>
                        <td><?=$realisateur["titre"] ?></td>
                    </tr>
            <?php } ?>   
        </tbody>
    </table>

    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "informations réalisateur";
    $titre_secondaire = "informations du realisateur";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 