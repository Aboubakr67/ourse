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


<h1 style="text-align:center; margin: 50px">Page actualite</h1>
<a href="nouvelle-actualite.php" style="background-color: #ad529d; color: white; padding: 10px; border: solid 2px white; border-radius: 9px;">Nouvelle actualité</a>
<!-- <section class="gridActus">
        <div class="actu"><h2>ACTU 1</h2><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non dolorem, placeat impedit officiis ex odit architecto temporibus ad, quas, quaerat nesciunt optio sequi laborum eius in dignissimos dolorum accusamus obcaecati!
        {{ actualite.contenu|u.truncate(100, '...')|raw }}
        </p><img src="./images/banniere.jpg" alt="coeur"></div>
        <div class="actu"><h2>ACTU 2</h2><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, amet. Praesentium dolor tenetur labore reiciendis dolorem veniam corporis rerum totam explicabo odio eius atque, ut nesciunt aliquam nulla dicta officiis?|u.truncate(10, '...')</p><img src="./images/ourse.png" alt="visage"></div>
        <div class="actu"><h2>Super actu 3</h2><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore natus impedit vitae suscipit quas enim corporis inventore veritatis, ducimus laudantium. Sapiente aut distinctio eius iure itaque ipsum earum? In, sunt.</p><img src="./images/ourse.png" alt="plantravail"></div>
        <div class="actu"><h2>Super actu 4</h2><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus tempora quasi libero fugit consequatur molestiae repudiandae blanditiis expedita commodi veritatis quod hic, modi voluptas quam perferendis, vitae!</p><img src="./images/ourse.png" alt="skincare"></div>
        <div class="actu"><h2>Super actu 5</h2><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi odit assumenda doloremque tenetur totam id, eveniet reiciendis autem impedit maiores ea unde aspernatur itaque architecto minus adipisci quia quidem tempora?</p><img src="./images/ourse.png" alt="miroir"></div>
        <div class="actu"><h2>ACtu de l"ourse</h2><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse tempora, repellat iusto, id neque voluptas quaerat accusamus voluptatem vero quod asperiores omnis, sit ipsam repudiandae. In perspiciatis accusantium ipsa rerum?</p><img src="./images/ourse.png" alt="gorgeous"></div>

</section> -->

<section class="gridActus">
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
