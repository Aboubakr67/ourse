<?php
session_start();
require('header.php');
?>

<?php
if (isset($_SESSION['errorMessage'])) { ?>
  <div class="error-message" style="text-align:center; color: red;">
    <?= $_SESSION['errorMessage']?>
  </div>
  <?php unset($_SESSION['errorMessage']); // Supprime le message d'erreur de la session
  } ?>

<form method="post" class="form" action="actions/connexionAction.php">
            <fieldset>
                <label class="form-label" for="form2Example11">Email ou nom Wiki</label>
                <input type="email" id="form2Example11" name="email" class="form-control" placeholder="Votre adresse email" />

                <label class="form-label" for="form2Example22">Mot de passe</label>
                <input type="password" id="form2Example22" name="password" class="form-control" />
                <a href="/ourse/motdepasse.php">Mot de passe oublié</a>

                <input id="submit" type="submit" name="validate" value="Connexion">
                <a href="/ourse/inscription.php">Inscrivez-vous !</a>
            </fieldset>
        </form>
<?php
require('footer.php');
?>