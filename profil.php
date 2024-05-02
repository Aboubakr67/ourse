<?php
session_start();
require('header.php');
?>


<h1 style="text-align:center; margin: 50px">Mon profil</h1>

<p>Pseudo : <?php echo $_SESSION['pseudo']; ?></p>
<p>Email : <?php echo $_SESSION['email']; ?></p>
<p>Rôle : <?php echo $_SESSION['role']; ?></p>



<?php
require('footer.php');
?>