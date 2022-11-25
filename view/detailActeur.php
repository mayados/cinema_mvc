<?php ob_start();
    foreach($requeteActeur->fetchAll() as $acteur) { 
        $acteurNom = $acteur["nom"];
        $acteurPrenom = $acteur["prenom"]; 
        $acteurSexe = $acteur["sexe"];
        $acteurNaissance = $acteur["date_naissance"];
        $acteurPhoto = $acteur["photo"];
    }
?>

<div id="retour">
    <a href="index.php?action=listActeurs">
        <i class="fa-solid fa-circle-left"></i>
        <p>Retour</p>
    </a>  
</div>

<figure>
        <img src="<?= $acteurPhoto ?>" alt="Photo de l'acteur">
        <figcaption><?= $acteurPrenom ?> <?= $acteurNom ?>, <?= $acteurSexe ?>, né(e) le <?= $acteurNaissance ?></figcaption>
    </figure>

    <div id="bar">

    </div>

<p id="compteur">Filmographie : <?= $requeteFilms->rowCount() ?> film(s)</p>

<div id="container-films">
    <ul>
        <?php
            foreach($requeteFilms->fetchAll() as $film) { 
                ?>
                    <li><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?=$film["titre"] ?></a></li>
        <?php } ?>      
    </ul>    
</div>

 


    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "informations acteur";
    $titre_secondaire = "Acteur : ".$acteurNom." ".$acteurPrenom;
    $lienCss = "detailPersonne";
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 