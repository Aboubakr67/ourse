<?php
session_start();

if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
    exit();
}

require('header.php');

// Vérifier si l'ID de l'actualité est passé en paramètre
if (!isset($_GET['id'])) {
    // Rediriger vers une page d'erreur ou la page d'accueil
    header('Location: actualite.php');
    exit();
}


require('config/database.php');
require('models/actualiteModel.php');

// Récupérer l'ID de l'actualité depuis l'URL
$id_actualite = $_GET['id'];

$actualite = getActualiteByID($id_actualite);

// Vérifier si l'actualité existe
if (!$actualite) {
    // Rediriger vers une page d'erreur ou la page d'accueil
    header('Location: actualite.php');
    exit();
}
?>

<h1 style="text-align:center; margin: 50px">Modifier l'actualité</h1>

<?php
if (isset($_SESSION['errorMessage'])) { ?>
  <div class="error-message" style="text-align:center; color: red;">
    <?= $_SESSION['errorMessage']?>
  </div>
  <?php unset($_SESSION['errorMessage']); // Supprime le message d'erreur de la session
  } ?>

<form method="POST" enctype="multipart/form-data" action="actions/editActualiteAction.php">
    <input type="hidden" name="id_actualite" value="<?php echo $actualite['id_actualite']; ?>">
    <div class="form-group">
        <label for="titre">Titre principal</label>
        <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez le titre principal" value="<?php echo $actualite['titre']; ?>">
    </div>
    <div class="form-group">
        <label for="image">Image actuelle</label><br>
        <img src="upload/<?php echo $actualite['image']; ?>" alt="<?php echo $actualite['image']; ?>" id="image-preview" style="max-width: 200px;">
        <input type="hidden" name="image" value="<?php echo $actualite['image']; ?>">
    </div>
    <div class="form-group">
        <label for="new-image">Modifier l'image</label>
        <input type="file" class="form-control-file" id="new-image" name="new-image" onchange="previewImage()">
    </div>
    <div class="form-group">
        <label for="description">Description de l'événement</label>
        <textarea class="form-control" id="description" name="description"><?php echo $actualite['description']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="date">Date de l'événement</label>
        <input type="date" id="date" name="date" value="<?php echo $actualite['date']; ?>">
        <select class="form-control" id="change_date_event" name="change_date_event">
            <option>Toute la journée</option>
            <option>Entrer à l'heure</option>
        </select>
    </div>
    <div class="form-group" id="heureDiv" <?php if (empty($actualite['heure'])) echo 'style="display: none;"'; ?>>
        <label for="heure">Heure de l'événement</label>
        <input type="time" class="form-control" id="heure" name="heure" value="<?php echo $actualite['heure']; ?>">
    </div>
    <div class="form-group">
        <label for="ville">Ville</label>
        <input type="text" class="form-control" id="ville" name="ville" placeholder="Entrez la ville" value="<?php echo $actualite['ville']; ?>">
    </div>
    <div class="form-group">
        <label for="lien">Lien</label>
        <input type="url" class="form-control" id="lien" name="lien" placeholder="Entrez le lien" value="<?php echo $actualite['lien']; ?>">
    </div>
    <button type="submit" class="btn btn-primary" name="validate">Valider</button>
</form>
<div style="text-align: right;">
    <u><a href="actualite.php" style="margin-right: 0;">Retour à la liste</a></u>
</div>

<style>

/* Style pour les formulaires */
.form-group {
    margin-bottom: 20px;
}

/* Style pour les étiquettes */
.form-group label {
    font-weight: bold;
}

/* Style pour les champs de saisie */
.form-control {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    transition: border-color 0.3s;
}

/* Style pour les boutons */
.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: var(--principal-color);
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #ad417b;
}

/* Style pour les images prévisualisées */
#image-preview {
    max-width: 200px;
    margin-top: 10px;
}






</style>

<script>
    // Afficher l'aperçu de la nouvelle image choisit
    function previewImage() {
        var preview = document.getElementById('image-preview');
        var fileInput = document.getElementById('new-image');
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = 'upload/<?php echo $actualite['image']; ?>';
        }
    }
</script>

   <script>
    // Fonction pour afficher ou masquer le champ de l'heure en fonction de la sélection
    document.getElementById('change_date_event').addEventListener('change', function() {
      var heureDiv = document.getElementById('heureDiv');
      if (this.value === 'Entrer à l\'heure') {
        heureDiv.style.display = 'block';
      } else {
        heureDiv.style.display = 'none';
      }
    });
  </script>


<?php
// Inclure le fichier de pied de page
require('footer.php');
?>
