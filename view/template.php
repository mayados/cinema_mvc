<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/<?=$lienCss?>.css">
    <title><?= $titre ?></title>
</head>
<body>
    <nav>
        <a href="index.php?action=listFilms">Films</a>
        <a href="index.php?action=listRealisateurs">Réalisateurs</a>
        <a href="index.php?action=listActeurs">Acteurs</a>
        <a href="index.php?action=listGenres">Genres</a>  
        <a href="index.php?action=listRoles">Rôles</a> 
        <a href="index.php?action=ajoutActeur">Ajouter un acteur</a>   
        <a href="index.php?action=ajoutRealisateur">Ajouter un réalisateur</a>       
        <a href="index.php?action=ajoutGenre">Ajouter un genre</a>      
        <a href="index.php?action=ajoutFilm">Ajouter un film</a>     
    </nav>
    <div id="container-page">
            <h2><?= $titre_secondaire ?></h2>
            <?= $contenu ?>
    </div>
</body>
</html>