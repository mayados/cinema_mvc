<?php ob_start(); ?>

<p id="compteur">Il y a <?= $requete->rowCount() ?> films</p>

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
                        
                        <td><a id='elements-link' href="index.php?action=detailFilm&id=<?= $film['id_film']?>"><?=$film["titre"] ?></a></td>
                        <td><?=$film["date_sortie"] ?></td>
                    </tr>
            <?php } ?>   
        </tbody>
    </table>

    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "Liste des films";
    $titre_secondaire = "Liste des films";
    $lienCss = "listFilms";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 

