<?php ob_start();
    if($requete->rowCount()== 0){
        echo "<p>Aucun film ne correspond à ce genre</p>";
    }else{

?>  
    <div id="retour">
        <a href="index.php?action=listGenres">
            <i class="fa-solid fa-circle-left"></i>
            <p>Retour</p>
        </a>        
    </div>
    <p id="compteur"><?= $requete->rowCount() ?> film(s)</p>
    <div id="container-infos">
        <?php
            foreach($requete->fetchAll() as $genre) { 
                $genreLibelle = $genre["libelle"];
                 ?>
                <div class="infos">
                    <div class="container-img">
                      <img src="<?= $genre["affiche"] ?>" alt="#">                        
                    </div>
                     <a href="index.php?action=detailFilm&id=<?= $genre["id_film"] ?>"><?=$genre["titre"] ?></a>
                 </div>
                 <div class="bar"></div>
                <?php } ?>           
    </div>
    <?php } ?>  
    <?php
    
    /* On stocke dans des variables les titres qui seront affectés sur la page template */
    $titre = "informations sur le genre";
    $titre_secondaire = "Catégorie '".$genreLibelle."'";
    $lienCss = "detailGenre";
    
    /* ob_start et ob_get_clean permettent d'aspirer les informations qui se situent entre ces deux fonctions, ainsi, nous pourrons envoyer tout ça sur une autre page
    Ici, nous stockons tout cela dans une variable $contenu */
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 