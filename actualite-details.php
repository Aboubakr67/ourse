<?php
session_start();

if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
    exit();
}
require('header.php');
require('config/database.php');
require('models/actualiteModel.php');

// Vérifier si l'ID de l'actualité est passé en paramètre
if (!isset($_GET['id'])) {
    // Rediriger vers une page d'erreur ou la page d'accueil
    header('Location: actualite.php');
    exit();
}

$id_actualite = $_GET['id'];

// Appeler la fonction pour récupérer les actualités
$actualite = getActualiteByID($id_actualite);

// Vérifier si l'actualité existe
if (!$actualite) {
    // Rediriger vers une page d'erreur ou la page d'accueil
    header('Location: actualite.php');
    exit();
}

// Vérifier le rôle de l'utilisateur pour déterminer s'il peut modifier et/ou supprimer les actus
$peut_modifier = false;
$peut_supprimer = false;

if ($_SESSION['role'] === 'user-redacteur' || $_SESSION['role'] === 'admin') {
    $peut_modifier = true;
}

if ($_SESSION['role'] === 'admin') {
    $peut_supprimer = true;
}


?>

<?php
if (isset($_SESSION['success'])) { ?>
    <div class="success-message" style="text-align:center; color: green;">
        <?= $_SESSION['success'] ?>
    </div>
<?php unset($_SESSION['success']); // Supprime le message d'erreur de la session
} ?>


<h1 style="text-align:center; margin: 50px"><?php echo $actualite['titre']; ?></h1>

<div class="details-actualite">
    <?php if (!empty($actualite['image'])) : ?>
        <img src="upload/<?php echo $actualite['image']; ?>" alt="<?php echo $actualite['image']; ?>">
    <?php endif; ?>
    <p>Description: <?php echo $actualite['description']; ?></p>
    <p>Date de l'événement: <?php echo date('j F Y', strtotime($actualite['date'])); ?></p>
    <?php if (!empty($actualite['heure'])) : ?>
        <p>Heure de l'événement: <?php echo $actualite['heure']; ?></p>
    <?php endif; ?>
    <p>Ville: <?php echo $actualite['ville']; ?></p>
    <?php if (!empty($actualite['lien'])) : ?>
        <p>Lien: <a href="<?php echo $actualite['lien']; ?>"><?php echo $actualite['lien']; ?></a></p>
    <?php endif; ?>

    
    <?php if ($peut_modifier) : ?>
        <a href="actualite-edit.php?id=<?php echo $actualite['id_actualite']; ?>" style="background-color: #ad529d; color: white; padding: 10px; border: solid 2px white; border-radius: 9px;">Modifier</a>
    <?php endif; ?>


    <?php if ($peut_supprimer) : ?>
        <a href="supprimer_actualite.php?id=<?php echo $actualite['id_actualite']; ?>" style="background-color: red; color: white; padding: 10px; border: solid 2px white; border-radius: 9px;">Supprimer</a>
    <?php endif; ?>


</div>




<?php
require('footer.php');
?>
