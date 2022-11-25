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
    <header>
        <nav id="menu-navigation">
            <ul id="items-menu">
                <li><a class="nav-link" href="index.php?action=listFilms">Films</a></li>
                <span>|</span>
                <li><a class="nav-link" href="index.php?action=listRealisateurs">Réalisateurs</a></li>
                <span>|</span>
                <li><a class="nav-link" href="index.php?action=listActeurs">Acteurs</a></li>
                <span>|</span>
                <li><a class="nav-link" href="index.php?action=listGenres">Genres</a></li>  
                <span>|</span>
                <li><a class="nav-link" href="index.php?action=listRoles">Rôles</a></li>
                <span>|</span>
                <li id="admin"><a href="#" class="nav-link">Admin</a>
                    <ul id="sous-menu">
                        <li><a href="index.php?action=ajoutActeur">Ajouter un acteur</a></li>
                        <li><a href="index.php?action=ajoutRealisateur">Ajouter un réalisateur</a></li>  
                        <li><a href="index.php?action=ajoutGenre">Ajouter un genre</a></li>     
                        <li><a href="index.php?action=ajoutFilm">Ajouter un film</a></li>     
                        <li><a href="index.php?action=ajoutRole">Ajouter un rôle</a></li>   
                        <li><a href="index.php?action=ajoutCasting">Ajouter un Casting</a></li>  
                    </ul>     
                </li>                
            </ul>
            <button class="burger">
                <span class="bar-burger"></span>
            </button>
        </nav>        
    </header>


    <div id="container-page">
        <h2><?= $titre_secondaire ?></h2>
        <?= $contenu ?>
    </div>
    <script src ="./public/js/script.js"></script>
</body>
</html>