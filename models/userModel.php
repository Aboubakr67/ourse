<?php


// Récupérer tous les utilisateurs
function getUsers() {

    $bdd = connexion();
    
    $stmt = $bdd->prepare("CALL GetUsers()");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

// Récupérer un seul utilisateur par son ID
function getUserByID($id_user) {

    $bdd = connexion();

    $stmt = $bdd->prepare("CALL GetUserByID(:p_id_user)");
    $stmt->bindParam(':p_id_user', $id_user);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}

// Modifier un utilisateur
function updateUser($id_user, $pseudo, $email, $role) {
    try {
        $bdd = connexion();
        $stmt = $bdd->prepare("CALL UpdateUser(:p_id_user, :p_pseudo, :p_email, :p_role)");
        $stmt->bindParam(':p_id_user', $id_user);
        $stmt->bindParam(':p_pseudo', $pseudo);
        $stmt->bindParam(':p_email', $email);
        $stmt->bindParam(':p_role', $role);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour de l'utilisateur : " . $e->getMessage();
        return false;
    }
}

// Supprimer un utilisateur par son ID
function deleteUserByID($id_user) {
    try {
        $bdd = connexion();
        $stmt = $bdd->prepare("CALL DeleteUserByID(:p_id_user)");
        $stmt->bindParam(':p_id_user', $id_user);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de l'utilisateur : " . $e->getMessage();
        return false;
    }
}




?>