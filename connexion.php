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


<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">



                <form method="POST" action="actions/connexionAction.php">
                  <p style="font-size:1.8em">Connexion</p>
                  <br>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Email</label>
                    <input type="email" id="form2Example11" name="email" class="form-control" placeholder="Votre adresse email" />

                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Mot de passe</label>
                    <input type="password" id="form2Example22" name="password" class="form-control" />

                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" name="validate">Connexion</button>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Inscrivez-vous ?</p>
                    <a href="inscription.php" type="button" class="btn btn-outline-danger">Inscription</a>
                  </div>

                </form>

              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
require('footer.php');
?>