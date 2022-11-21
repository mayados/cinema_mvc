<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?></title>
</head>
<body>
    <nav>
        <a href="index.php?action=listFilms">Voir les films</a>
        <a href="index.php?action=listRealisateurs">Voir les réalisateurs</a>
        <a href="index.php?action=listActeurs">Voir les acteurs</a>
        <a href="index.php?action=listGenres">Voir les genres</a>  
        <a href="index.php?action=listRoles">Voir les rôles</a> 
        <a href="index.php?action=ajoutActeur">Ajouter un acteur</a>   
        <a href="index.php?action=ajoutRealisateur">Ajouter un réalisateur</a>       
        <a href="index.php?action=ajoutGenre">Ajouter un genre</a>        
    </nav>
    <div id="container-page">
        <div id="contenu">
            <h1>PDO CINEMA</h1>
            <h2><?= $titre_secondaire ?></h2>
            <?= $contenu ?>
        </div>
    </div>
</body>
</html>