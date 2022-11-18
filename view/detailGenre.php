<?php ob_start();?>

<p>Ce genre a <?= $requete->rowCount() ?> films</p>

    <table>
        <thead>
            <tr>
                <th>FILMS</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $genre) { ?>
                    <tr>
                        <td><?=$genre["titre"] ?></td>
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