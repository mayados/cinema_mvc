<?php ob_start();?>

<div id="retour">
    <a href="index.php?action=listActeurs">
        <i class="fa-solid fa-circle-left"></i>
        <p>Retour</p>
    </a>  
</div>

<p id="compteur">Filmographie : <?= $requete->rowCount() ?> film(s)</p>

<div id="container-films">
    <ul>
        <?php
            foreach($requete->fetchAll() as $acteur) { 
                    $acteurNom = $acteur["nom"];
                    $acteurPrenom = $acteur["prenom"]; 
                    $acteurSexe = $acteur["sexe"];
                    $acteurNaissance = $acteur["date_naissance"];
                ?>
                    <li><?=$acteur["titre"] ?></li>
        <?php } ?>      
    </ul>    
</div>

 


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