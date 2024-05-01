<?php
// Définir le fuseau horaire sur "Europe/Paris"
date_default_timezone_set('Europe/Paris');

// Afficher le fuseau horaire défini
// $timezone = date_default_timezone_get();
// echo "Fuseau horaire du serveur : " . $timezone;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OURSE</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap-grid.min.css" integrity="sha512-i1b/nzkVo97VN5WbEtaPebBG8REvjWeqNclJ6AItj7msdVcaveKrlIIByDpvjk5nwHjXkIqGZscVxOrTb9tsMA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    
<header>

 <!-- barre de navigation -->
    <nav class="navbar">
        <a href="index.php"><img src="./images/logo.png" alt="logo"></a>
        <a href="index.php">Découvrez l'Ourse</a>
        <a href="adhesion.php">Adhérer</a>
        <a href="la-carte.php">Nos professionnels</a>
        
        <?php if (isset($_SESSION['auth'])) { ?>
            <a href="actualite.php">Actualités</a>
            <a href="profil.php">Mon Profil</a>
            <a href="actions/deconnexion.php">Déconnexion</a>
        <?php } else { ?>
            <a href="inscription.php">Inscription</a>
            <a href="connexion.php">Connexion</a>
        <?php } ?>
        
    </nav>
    <?php if (isset($_SESSION['auth'])) { ?>
        <h1>Bonjour <?php echo $_SESSION['pseudo']; ?> !</h1>
        <?php } ?>
</header>