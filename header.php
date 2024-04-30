<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OURSE</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap-grid.min.css" integrity="sha512-i1b/nzkVo97VN5WbEtaPebBG8REvjWeqNclJ6AItj7msdVcaveKrlIIByDpvjk5nwHjXkIqGZscVxOrTb9tsMA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    
<header>



<?php if (isset($_SESSION['auth'])) { ?>
    <a class="nav-link fs-6 mx-1 bg-danger rounded text-white" aria-current="page" aria-disabled="true" href="actions/deconnexion.php">Déconnexion</a>
    <a class="nav-link fs-6 mx-1 bg-danger rounded text-white" aria-current="page" aria-disabled="true" href="actualite.php">Actualite</a>
    <a class="nav-link fs-6 mx-1 bg-danger rounded text-white" aria-current="page" aria-disabled="true" href="la-carte.php">La carte</a>
    <h1>User = <?php echo $_SESSION['pseudo']; ?></h1>
    
                    <?php } else { ?>
<a class="nav-link fs-5 mx-2 text-black" aria-disabled="true" href="inscription.php">Inscription</a>
<a class="nav-link fs-5 mx-2 text-black" aria-disabled="true" href="index.php">Accueil</a>
<a class="nav-link fs-5 mx-2 text-white rounded bg-primary" aria-disabled="true" href="connexion.php">Connexion</a>
                    <?php } ?>
</header>

<style>
    header {
    width: 100%; /* Prend toute la largeur de la page */
    height: 150px; /* Hauteur de 300 pixels */
    background-color: red; /* Couleur de fond rouge */
}

</style>



