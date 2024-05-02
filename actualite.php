<?php
session_start();

if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
    exit();
}
require('header.php');

require('config/database.php');
require('models/actualiteModel.php');

// Appeler la fonction pour récupérer les actualités
$actualites = getActualites();
?>

<?php
if (isset($_SESSION['success'])) { ?>
    <div class="success-message" style="text-align:center; color: green;">
        <?= $_SESSION['success'] ?>
    </div>
<?php unset($_SESSION['success']); // Supprime le message d'erreur de la session
} ?>

<?php
if (isset($_SESSION['errorMessage'])) { ?>
  <div class="error-message" style="text-align:center; color: red;">
    <?= $_SESSION['errorMessage']?>
  </div>
  <?php unset($_SESSION['errorMessage']); // Supprime le message d'erreur de la session
  } ?>


<h1 style="text-align:center; margin: 50px">Page actualite</h1>


<?php if ($_SESSION['role'] === 'user-redacteur' || $_SESSION['role'] === 'admin'): ?>
    <a href="nouvelle-actualite.php" style="background-color: #ad529d; color: white; padding: 10px; border: solid 2px white; border-radius: 9px;">Nouvelle actualité</a>
<?php endif; ?>

<section class="grid">
    <?php
    // Vérifier s'il y a des actualités
    if (!empty($actualites)) {
        // Parcourir les actualités et les afficher
        foreach ($actualites as $actualite) {
            echo '<a class="actu" href="actualite-details.php?id=' . $actualite['id_actualite'] . '">';
            echo '<h2>' . $actualite['titre'] . '</h2>';
            echo '<p>' . $actualite['description'] . '</p>';

            // Formater la date
            $date_formattee = date('j F Y', strtotime($actualite['date']));

            // Afficher la date
            echo '<p>Le ' . $date_formattee;

            // Vérifier si une heure est disponible
            if (!empty($actualite['heure'])) {
                // Formater l'heure
                $heure_formattee = date('H:i', strtotime($actualite['heure']));

                // Afficher l'heure
                echo ' à ' . $heure_formattee;
            }

            // Afficher la ville
            echo ' – ' . $actualite['ville'] . '</p>';

            // Chemin du dossier d'upload
            $dossier_upload = 'upload/';

            // Liste des fichiers dans le dossier d'upload
            $fichiers_upload = scandir($dossier_upload);

            // Vérifier si l'image de l'actualité existe dans le dossier d'upload
            if (in_array($actualite['image'], $fichiers_upload)) {
                // Afficher l'image si elle existe
                echo '<img src="' . $dossier_upload . $actualite['image'] . '" alt="' . $actualite['image'] . '">';
            } else {
                // Afficher un message si l'image n'existe pas
                echo '<p>Image non disponible</p>';
            }

            echo '</a>';
        }
    } else {
        // Afficher un message si aucune actualité n'est disponible
        echo '<p style="text-align:center;">Aucune actualité disponible</p>';
    }
    ?>
</section>

<?php
require('footer.php');
?>
