<?php ob_start(); ?>

<p>Informations sur le film</p>

    <table>
        <thead>
            <tr>
                <th>TITRE</th>
                <th>DATE DE SORTIE</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $film) { ?>
                    <tr>
                        <td><?=$film["titre"] ?></td>
                        <td><?=$film["date_sortie"] ?></td>
                        <td><?=$film["duree"] ?></td>
                        <td><?=$film["nom"] ?></td>
                        <td><?=$film["prenom"] ?></td>
                        <td><?=$film["nom_role"] ?></td>
                    </tr>
            <?php } ?>   
        </tbody>
    </table>

    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "Liste des films";
    $titre_secondaire = "Liste des films";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 
