<?php ob_start();?>

        <div id="retour">
                <a href="index.php?action=listRoles">
                    <i class="fa-solid fa-circle-left"></i>
                    <p>Retour</p>
                </a>  
        </div>
        <p id="compteur">Ce personnage a été incarné par <?= $requete->rowCount() ?> acteur(s)</p>

        <div id="container-role">
            <ul>
                <?php
                    foreach($requete->fetchAll() as $role) { 
                        $nomRole = $role["nom_role"];
                        ?>
                        <li><?=$role["prenom"] ?> <?=$role["nom"] ?> dans le film <?=$role["titre"] ?></li>
                <?php } ?>   
            </ul>            
        </div>

    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "informations sur le genre";
    $titre_secondaire = $nomRole;
    $lienCss = "detailRole";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 