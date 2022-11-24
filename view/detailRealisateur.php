<?php ob_start(); 
    foreach($requeteRealisateur->fetchAll() as $realisateur) { 
        $realisateurNom = $realisateur["nom"];
        $realisateurPrenom = $realisateur["prenom"]; 
        $realisateurSexe = $realisateur["sexe"];
        $realisateurNaissance = $realisateur["date_naissance"];
        $realisateurPhoto = $realisateur["photo"];
    }
?>

    <div id="retour">
        <a href="index.php?action=listRealisateurs">
            <i class="fa-solid fa-circle-left"></i>
            <p>Retour</p>
        </a>  
    </div>

    <figure>
        <img src="<?= $realisateurPhoto ?>" alt="Photo du réalisateur">
        <figcaption><?= $realisateurPrenom ?> <?= $realisateurNom ?>, <?= $realisateurSexe ?>, né(e) le <?= $realisateurNaissance ?></figcaption>
    </figure>

    <div id="bar">

    </div>

    <h4 id="compteur">Filmographie : <?= $requeteFilms->rowCount() ?> film(s)</h4>

    <div id="container-films">
        <ul>
            <?php
                foreach($requeteFilms->fetchAll() as $film) { ?>
                        <li><?=$film["titre"] ?></li>
            <?php } ?>           
        </ul>
    </div>
    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "informations réalisateur";
    $titre_secondaire = $realisateurPrenom." ".$realisateurNom;
    $lienCss = "detailPersonne";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 