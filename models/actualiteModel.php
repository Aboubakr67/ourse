<?php

require('../config/database.php');

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









?>