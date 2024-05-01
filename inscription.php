<?php
session_start();
require('header.php');
?>

<?php
if (isset($_SESSION['errorMessage'])) { ?>
  <div class="error-message" style="text-align:center; color: red;">
    <?= $_SESSION['errorMessage'] ?>
  </div>
<?php unset($_SESSION['errorMessage']); // Supprime le message d'erreur de la session
} ?>

<form method="post" class="form" action="actions/inscriptionAction.php">
            <fieldset>
              
              <label class="form-label" for="form2Example1">Nom d'utilisateur Wiki</label>
              <input type="text" id="form2Example1" name="pseudo" class="form-control" />

              <label class="form-label" for="form2Example1">Email</label>
              <input type="email" id="form2Example1" name="email" class="form-control" />

              <label class="form-label" for="form2Example2">Mot de passe</label>
              <input type="password" id="form2Example2" class="form-control" name="password"/>

              <label class="form-label" for="form2Example2">Confirmation du mot de passe</label>
              <input type="password" id="form2Example2" class="form-control" name="confirmPassword"/>

              <input id="submit" type="submit" name="validate" value="Inscription">
              <a href="/ourse/connexion.php">Déjà inscrit ? Connectez-vous !</a>
            </fieldset>
        </form>

<?php
require('footer.php');
?>


