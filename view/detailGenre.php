<?php ob_start();
    if($requete->rowCount()== 0){
        echo "<p>Aucun film ne correspond à ce genre</p>";
    }else{

?>

    <p><?= $requete->rowCount() ?> films correspondent à ce genre</p>
    <ul>
            <?php
                foreach($requete->fetchAll() as $genre) { 
                    $genreLibelle = $genre["libelle"];
                    ?>
                        <li><?=$genre["titre"] ?></li>
            <?php } ?>         
    </ul>
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