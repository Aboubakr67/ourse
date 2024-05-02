<?php
session_start();

if (!isset($_SESSION['auth']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

if (!isset($_GET['id'])) {
    header('Location: ../actualite.php');
    exit();
}

$id_user = $_GET['id'];

require('../config/database.php');
require('../models/userModel.php');


$user_exist = getUserByID($id_user);

// Vérifier si l'actualité existe
if (!$user_exist) {
    header('Location: ../actualite.php');
    exit();
}


$deleteUser = deleteUserByID($user_exist['id_user']);



if(!$deleteUser) {
    $_SESSION['errorMessage'] = "Erreur lors de la suppression de l'utilisateur";
    header('Location: ../gestion-utilisateurs.php');
    exit();
}


$_SESSION['success'] = "L'utilisateur à été supprimer avec succès.";
header('Location: ../gestion-utilisateurs.php');
exit();


?>