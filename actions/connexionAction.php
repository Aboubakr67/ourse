<?php
session_start();
require('../config/database.php');




if (isset($_POST['validate'])) {
    // Vérifie si les champs email et password ne sont pas vide
    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");
        $password_encypt = password_hash($password, PASSWORD_DEFAULT);



        $bdd = connexion();

        $sql = "SELECT id_user, pseudo, email, password FROM USERS WHERE email = :email";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        if(password_verify($password, $user['password'])) {
            echo "true";
        } else  {
            echo "false";
        }

        // Vérifie si l'utilisateur existe et si le mot de passe est correct
        if ($user && password_verify($password, $user['password'])) {
            // Enregistre des donnes utilisateur dans la session
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $user['id_user'];
            $_SESSION['pseudo'] = $user['pseudo'];
            $_SESSION['email'] = $user['email'];

            header('Location: ../actualite.php');
            exit();
        }

        $_SESSION['errorMessage'] = "Email et/ou mot de passe incorrect.";
        header('Location: ../connexion.php');
        exit();
    } else {
        $_SESSION['errorMessage'] = "Veuillez remplir tous les champs.";
        header('Location: ../connexion.php');
        exit();
    }
}
