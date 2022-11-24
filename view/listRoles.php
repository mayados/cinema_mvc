<?php ob_start(); ?>

<p class="compteur" >Il y a <?= $requete->rowCount() ?> roles</p>

    <div class="container-elements">
        <?php
            foreach($requete->fetchAll() as $role) { ?>
                        <a class="element" href="index.php?action=detailRole&id=<?= $role['id_role']?>">
                            <p><?=$role["nom_role"] ?></p>
                        </a>
        <?php } ?>          
    </div>
 

    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "Liste des rôles";
    $titre_secondaire = "Liste des rôles";
    $lienCss = "list";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 
