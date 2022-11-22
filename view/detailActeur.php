<?php ob_start();?>

<p>Cet acteur a joué dans <?= $requete->rowCount() ?> films</p>

    <table>
        <thead>
            <tr>
                <th>FILMOGRAPHIE</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $acteur) { 
                        $acteurNom = $acteur["nom"];
                        $acteurPrenom = $acteur["prenom"]; 
                        $acteurSexe = $acteur["sexe"];
                        $acteurNaissance = $acteur["date_naissance"];
                    ?>
                    <tr>
                        <td><?=$acteur["titre"] ?></td>
                    </tr>
            <?php } ?>   
        </tbody>
    </table>

    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "informations acteur";
    $titre_secondaire = "Acteur : ".$acteurNom." ".$acteurPrenom." (".$acteurSexe." ".$acteurNaissance.")";
    $lienCss = "detailActeur";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 