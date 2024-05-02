<?php
session_start();

if (!isset($_SESSION['auth']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

require('config/database.php');
require('models/userModel.php');


if (!isset($_GET['id'])) {
    header('Location: actualite.php');
    exit();
}

$id_user = $_GET['id'];


$user= getUserByID($id_user);

// Vérifier si l'user existe
if (!$user) {
    header('Location: actualite.php');
    exit();
}

require('header.php');
?>


<h1>Modifier l'utilisateur <?php echo $user['pseudo']; ?></h1>

<form action="actions/editUserAction.php" method="post">
    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
    <div>
        <label for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo" value="<?php echo $user['pseudo']; ?>">
    </div>
    <div>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>">
    </div>
    <div>
        <label for="role">Role :</label>
        <select id="role" name="role">
            <option value="user-standard" <?php echo ($user['role'] === 'user-standard') ? 'selected' : ''; ?>>Utilisateur Standard</option>
            <option value="user-redacteur" <?php echo ($user['role'] === 'user-redacteur') ? 'selected' : ''; ?>>Utilisateur Rédacteur</option>
            <option value="admin" <?php echo ($user['role'] === 'admin') ? 'selected' : ''; ?>>Administrateur</option>
        </select>
    </div>
    <button type="submit" name="validate">Enregistrer</button>
</form>



<?php
require('footer.php');
?>








