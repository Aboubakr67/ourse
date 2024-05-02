<?php
session_start();

if (!isset($_SESSION['auth']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}


require('config/database.php');
require('models/userModel.php');


// Appeler la fonction pour récupérer une actualité
$users = getUsers();

// Vérifier si l'actualité existe
if (!$users) {
    header('Location: ../actualite.php');
    exit();
}

require('header.php');
?>

    <h1>Gestion des utilisateurs</h1>

    <?php
if (isset($_SESSION['success'])) { ?>
    <div class="success-message" style="text-align:center; color: green;">
        <?= $_SESSION['success'] ?>
    </div>
<?php unset($_SESSION['success']); // Supprime le message d'erreur de la session
} ?>

<?php
if (isset($_SESSION['errorMessage'])) { ?>
  <div class="error-message" style="text-align:center; color: red;">
    <?= $_SESSION['errorMessage']?>
  </div>
  <?php unset($_SESSION['errorMessage']); // Supprime le message d'erreur de la session
  } ?>

    <table border="1">
        <thead>
            <tr>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['pseudo']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td>
                        <!-- Bouton de modification -->
                        <a href="modifier-utilisateur.php?id=<?php echo $user['id_user']; ?>">Modifier</a>
                        
                        <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $user['id_user']; ?>)">Supprimer</a>
                        
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<script>
    function confirmDelete(id_user) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cette utilisateur ?")) {
            window.location.href = "actions/deleteUserAction.php?id=" + id_user;
        }
    }
</script>


<?php
    require('footer.php');
?>
