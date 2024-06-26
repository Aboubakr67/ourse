<?php
session_start();

if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
    exit();
}
require('header.php');
?>


<h1 style="text-align:center; margin: 50px">ACTUALITE DE L'OURSE : NOUVELLE ACTUALITE</h1>


<?php
if (isset($_SESSION['errorMessage'])) { ?>
  <div class="error-message" style="text-align:center; color: red;">
    <?= $_SESSION['errorMessage']?>
  </div>
  <?php unset($_SESSION['errorMessage']); // Supprime le message d'erreur de la session
  } ?>



<form method="POST" enctype="multipart/form-data" action="actions/newActualiteAction.php">
      <div class="form-group">
        <label for="titre">Titre principal</label>
        <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez le titre principal">
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control-file" id="image" name="image">
      </div>
      <div class="form-group">
        <label for="description">Description de l'évenement</label>
        <textarea class="form-control" id="description" name="description">
        </textarea>
      </div>
      <div class="form-group">
        <label for="date">Date de l'événement</label>
        <input type="date" id="date" name="date">
        <select class="form-control" id="change_date_event" name="change_date_event">
          <option>Toute la journée</option>
          <option>Entrer à l'heure</option>
        </select>
      </div>
      <div class="form-group" id="heureDiv" style="display: none;">
        <label for="heure">Heure de l'événement</label>
        <input type="time" class="form-control" id="heure" name="heure">
      </div>
      <div class="form-group">
        <label for="ville">Ville</label>
        <input type="text" class="form-control" id="ville" name="ville" placeholder="Entrez la ville">
      </div>
      <div class="form-group">
        <label for="lien">Lien</label>
        <input type="url" class="form-control" id="lien" name="lien" placeholder="Entrez le lien">
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

/* Style spécifique pour le champ de saisie de fichier */
.form-control-file {
    width: auto; /* Retour à la largeur par défaut */
}

/* Style pour le lien de retour */
div[style="text-align: right;"] {
    text-align: left; /* Alignement à gauche */
    margin-top: 20px; /* Ajout de marge en haut */
}

</style>

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
require('footer.php');
?>
