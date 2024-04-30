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

<form method="post" class="form" action="">
            <fieldset>
                <label class="form-label" for="">Email ou nom Wiki</label>
                <input type="email" id="" name="email" class="form-control" placeholder="Votre adresse email" />

                <label class="form-label" for=""> Nouveau mot de passe</label>
                <input type="password" id="" name="password" class="form-control" />

                <label class="form-label" for=""> Confirmer le mot de passe</label>
                <input type="password" id="" name="password" class="form-control" />
                <a href="/ourse/connexion.php">Retour à la page de connexion</a>

                <input id="submit" type="submit" name="validate" value="Connexion">
                <a href="/ourse/inscription.php">Inscrivez-vous !</a>
            </fieldset>
        </form>
<?php
require('footer.php');
?>