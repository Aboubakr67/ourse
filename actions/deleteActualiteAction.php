<?php
session_start();

if (!isset($_SESSION['auth']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

// Vérifier si l'ID de l'actualité est passé en paramètre
if (!isset($_GET['id'])) {
    // Rediriger vers une page d'erreur ou la page d'accueil
    header('Location: ../actualite.php');
    exit();
}
$id_actualite = $_GET['id'];

require('../config/database.php');
require('../models/actualiteModel.php');


// Appeler la fonction pour récupérer une actualité
$actualite = getActualiteByID($id_actualite);

// Vérifier si l'actualité existe
if (!$actualite) {
    // Rediriger vers une page d'erreur ou la page d'accueil
    header('Location: ../actualite.php');
    exit();
}


$deleteActualite = deleteActualiteByID($actualite['id_actualite']);

unlink('../upload/' . $actualite['image']);

if(!$deleteActualite) {
    $_SESSION['errorMessage'] = "Erreur lors de la suppression de l'actualité";
    header('Location: ../actualite-details.php?id=' . $actualite['id_actualite']);
    exit();
}


$_SESSION['success'] = "L'actualité à été supprimer avec succès.";
header('Location: ../actualite.php');
exit();


?>