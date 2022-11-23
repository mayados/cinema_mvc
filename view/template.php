<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/<?=$lienCss?>.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?= $titre ?></title>
</head>
<body>
    <nav>
        <a class="nav-link" href="index.php?action=listFilms">Films</a>
        <span>|</span>
        <a class="nav-link" href="index.php?action=listRealisateurs">Réalisateurs</a>
        <span>|</span>
        <a class="nav-link" href="index.php?action=listActeurs">Acteurs</a>
        <span>|</span>
        <a class="nav-link" href="index.php?action=listGenres">Genres</a>  
        <span>|</span>
        <a class="nav-link" href="index.php?action=listRoles">Rôles</a> 
        <span>|</span>
        <a class="nav-link" href="index.php?action=ajoutActeur">Ajouter un acteur</a>
        <span>|</span>   
        <a class="nav-link" href="index.php?action=ajoutRealisateur">Ajouter un réalisateur</a>   
        <span>|</span>    
        <a class="nav-link" href="index.php?action=ajoutGenre">Ajouter un genre</a>     
        <span>|</span> 
        <a class="nav-link" href="index.php?action=ajoutFilm">Ajouter un film</a>     
    </nav>
    <div id="container-page">
        <h2><?= $titre_secondaire ?></h2>
        <?= $contenu ?>
    </div>
</body>
</html>