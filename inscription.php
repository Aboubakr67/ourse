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

<section class="text-center text-lg-start">
  <div class="container mx-auto w-25 my-5">
    <div class="card mb-3">
      <div class="row g-0 d-flex align-items-center">
        <div class="col-lg-12">
          <div class="card-body py-5 px-md-5">

          <form method="POST" action="actions/inscriptionAction.php">
          <p style="font-size:1.8em">Inscription</p>
            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Nom d'utilisateur</label>
              <input type="text" id="form2Example1" name="pseudo" class="form-control" />
             
            </div>
            
            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Email</label>
              <input type="email" id="form2Example1" name="email" class="form-control" />
             
            </div>

            
            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Mot de passe</label>
              <input type="password" id="form2Example2" class="form-control" name="password"/>
            </div>

          
            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Confirmation du mot de passe</label>
              <input type="password" id="form2Example2" class="form-control" name="confirmPassword"/>
            </div>

            
            <button type="submit" class="btn btn-primary btn-block mb-4" name="validate">Inscrivez-vous</button>


            <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Inscrivez-vous ?</p>
                    <a href="connexion.php" type="button" class="btn btn-outline-danger">Connexion</a>
                  </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</form>

<?php
require('footer.php');
?>


