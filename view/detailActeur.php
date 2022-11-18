<?php ob_start();?>

<p>Cet acteur a joué dans <?= $requete->rowCount() ?> films</p>

    <table>
        <thead>
            <tr>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>SEXE</th>
                <th>NAISSANCE</th>
                <th>TITRE FILMS JOUES</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $acteur) { ?>
                    <tr>
                        <td><?=$acteur["nom"] ?></td>
                        <td><?=$acteur["prenom"] ?></td>
                        <td><?=$acteur["sexe"] ?></td>
                        <td><?=$acteur["date_naissance"] ?></td>
                        <td><?=$acteur["titre"] ?></td>
                    </tr>
            <?php } ?>   
        </tbody>
    </table>

    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "informations acteur";
    $titre_secondaire = "informations de l'acteur";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 