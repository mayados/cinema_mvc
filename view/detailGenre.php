<?php ob_start();?>

<p><?= $requete->rowCount() ?> films correspondent à ce genre</p>

    <table>
        <thead>
            <tr>
                <th>FILMS</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $genre) { 
                    $genreLibelle = $genre["libelle"];
                    ?>
                    <tr>
                        <td><?=$genre["titre"] ?></td>
                    </tr>
            <?php } ?>   
        </tbody>
    </table>

    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "informations sur le genre";
    $titre_secondaire = "Genre : ".$genreLibelle;
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 