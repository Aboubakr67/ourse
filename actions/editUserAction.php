<?php
session_start();

if (!isset($_SESSION['auth']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

require('../config/database.php');
require('../models/userModel.php');



// On vérifie que l'utilisateur à bien cliquer sur submit
if (isset($_POST['validate'])) {

    if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['role'])) {
        $id_user = filter_input(INPUT_POST, "id_user");
        $pseudo = filter_input(INPUT_POST, "pseudo");
        $email = filter_input(INPUT_POST, "email");
        $role = filter_input(INPUT_POST, "role");

        $user= getUserByID($id_user);

        // Vérifier si l'user existe
        if (!$user) {
            header('Location: ../actualite.php');
            exit();
        }

        $updateUser = updateUser($id_user, $pseudo, $email, $role);

        if(!$updateUser) {
            $_SESSION['errorMessage'] = "Erreur lors de la modification de l'user";
            header('Location: ../modifier-utilisateur.php?id=' . $id_user);
            exit();
        }

        $_SESSION['success'] = "L'utilisateur $pseudo à été modifié avec succès.";
        header('Location: ../gestion-utilisateurs');
        exit();
        

    } else {
        $_SESSION['errorMessage'] = "Veuillez remplir tous les champs.";
        header('Location: ../modifier-utilisateur.php?id=' . $id_user);
        exit();
    }
}
?>