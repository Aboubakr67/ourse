<?php

// require('../config/database.php');


// CREATE
// Insérer une actualité
function insertActualite($titre, $description, $date, $heure, $nom_image, $ville, $lien, $id_user)
{

    // Connexion à la base de données
    $bdd = connexion();

    try {
        // Préparation de l'appel à la procédure stockée
        $stmt = $bdd->prepare("CALL CreerActualite(:p_titre, :p_description, :p_date, :p_heure, :p_nom_image, :p_ville, :p_lien, :p_id_user)");

        // Liaison des valeurs aux paramètres de la procédure stockée
        $stmt->bindParam(':p_titre', $titre);
        $stmt->bindParam(':p_description', $description);
        $stmt->bindParam(':p_date', $date);
        $stmt->bindParam(':p_heure', $heure);
        $stmt->bindParam(':p_nom_image', $nom_image);
        $stmt->bindParam(':p_ville', $ville);
        $stmt->bindParam(':p_lien', $lien);
        $stmt->bindParam(':p_id_user', $id_user);
        // echo $stmt;

        // Exécution de la requête
        $stmt->execute();

        return true;

    } catch (PDOException $e) {
        // Gérer les erreurs de base de données ici
        echo $e->getMessage();
        return false;
    }
}

// READ
// Afficher toutes les actualités
function getActualites() {

    // Connexion à la base de données
    $bdd = connexion();
  
    // Appel de la procédure stockée pour récupérer les actualités
    $stmt = $bdd->prepare("CALL GetActualites()");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// READ
// Afficher une actualité en fonction de son ID
function getActualiteByID($id_actualite) {
    // Connexion à la base de données
    $bdd = connexion();
  
    // Appel de la procédure stockée pour récupérer l'actualité
    $stmt = $bdd->prepare("CALL GetActualiteByID(:id_actualite)");
    $stmt->bindParam(':id_actualite', $id_actualite);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


// UPDATE
// Modifier une actualité
function updateActualite($id_actualite, $titre, $description, $date, $heure, $nom_image, $ville, $lien, $id_user)
{
    // Connexion à la base de données
    $bdd = connexion();

    try {
        // Préparation de l'appel à la procédure stockée
        $stmt = $bdd->prepare("CALL UpdateActualite(:p_id_actualite, :p_titre, :p_description, :p_date, :p_heure, :p_nom_image, :p_ville, :p_lien, :p_id_user)");

        // Liaison des valeurs aux paramètres de la procédure stockée
        $stmt->bindParam(':p_id_actualite', $id_actualite);
        $stmt->bindParam(':p_titre', $titre);
        $stmt->bindParam(':p_description', $description);
        $stmt->bindParam(':p_date', $date);
        $stmt->bindParam(':p_heure', $heure);
        $stmt->bindParam(':p_nom_image', $nom_image);
        $stmt->bindParam(':p_ville', $ville);
        $stmt->bindParam(':p_lien', $lien);
        $stmt->bindParam(':p_id_user', $id_user);

        // Exécution de la requête
        $stmt->execute();

        return true;

    } catch (PDOException $e) {
        // Gérer les erreurs de base de données ici
        echo $e->getMessage();
        return false;
    }
}


// Function qui permet de supprimer une actualité
function deleteActualiteByID($id_actualite) {

    $bdd = connexion();

    try {
        $stmt = $bdd->prepare("CALL deleteActualite(:p_id_actualite)");

        $stmt->bindParam(':p_id_actualite', $id_actualite, PDO::PARAM_INT);

        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        // Gérer les erreurs de base de données ici
        echo $e->getMessage();
        return false;
    }
}



?>