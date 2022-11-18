<?php ob_start();?>

<p>Ce role a été joué par <?= $requete->rowCount() ?> acteurs</p>

    <table>
        <thead>
            <tr>
                <th>FILM</th>
                <th>Acteur</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $role) { ?>
                    <tr>
                        <td><?=$role["titre"] ?></td>
                        <td><?=$role["nom"] ?></td>
                        <td><?=$role["prenom"] ?></td>
                    </tr>
            <?php } ?>   
        </tbody>
    </table>

    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "informations sur le genre";
    $titre_secondaire = "informations du genre";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 