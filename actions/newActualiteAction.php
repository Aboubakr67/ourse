<?php
session_start();

require('../utils/check_extension.php');
require('../models/actualiteModel.php');

// On vérifie que l'utilisateur à bien cliquer sur submit
if (isset($_POST['validate'])) {
    // On vérifie que les champs obligatoire sont bien rempli
    // Non obligatoire : Heure, Lien
    // Heure, si la date de l'event est toute la journée
    // Lien : Si pas de site web
    if (!empty($_POST['titre']) && !empty($_FILES['image']) && !empty($_POST['description']) && !empty($_POST['date']) && !empty($_POST['ville'])) {
        $titre = filter_input(INPUT_POST, "titre");
        $image = $_FILES['image'];
        $description = filter_input(INPUT_POST, "description");
        $date_input = filter_input(INPUT_POST, "date");
        $heure = filter_input(INPUT_POST, "heure");
        $ville = filter_input(INPUT_POST, "ville");
        $lien = filter_input(INPUT_POST, "lien");

        $change_date_event = filter_input(INPUT_POST, "change_date_event");

        // Controle de la validé de la date saisit
        // Date doit etre supérieur ou égale à la date d'aujourd'hui
        // Date doit être inférieur à une date dans 2 ans


        // Vérification si la date saisie est valide au format ISO (AAAA-MM-JJ)
        if (DateTime::createFromFormat('Y-m-d', $date_input) !== false) {
            // La date est valide

            // Convertir la date saisie en objet DateTime
            $date_obj = new DateTime($date_input);

            // Date d'aujourd'hui
            $date_today = new DateTime('today');

            // Vérification si la date est supérieure à la date d'aujourd'hui
            if ($date_obj < $date_today) {
                $_SESSION['errorMessage'] = "La date saisie ne peut pas être antérieure à la date d'aujourd'hui.";
                header('Location: ../nouvelle-actualite.php');
                exit();
            } else {
                // Calcul de la date dans deux ans
                $date_future = $date_today->modify('+2 years');

                // Vérification si la date est inférieure à la date dans deux ans
                if ($date_obj > $date_future) {
                    $_SESSION['errorMessage'] = "La date saisie ne peut pas être supérieure à deux ans à partir d'aujourd'hui.";
                    header('Location: ../nouvelle-actualite.php');
                    exit();
                } else {
                    // La date saisie est valide et appropriée
                    // Formatage de la date au format YYYY-MM-DD pour l'enregistrement en base de données
                    $date_output = $date_obj->format('Y-m-d');
                }
            }
        } else {
            // La date saisie n'est pas valide
            $_SESSION['errorMessage'] = "La date saisie n'est pas valide. Veuillez saisir une date au format jour/mois/année (ex: 01/01/2023).";
            header('Location: ../nouvelle-actualite.php');
            exit();
        }   

        // echo "Titre: " . $titre;
        // echo "<br/>";
        // echo "image : " . $image;
        // echo "<br/>";
        // echo "date : " . $date;
        // echo "<br/>";
        // echo "heure : " . $heure;
        // echo "<br/>";
        // echo "ville : " . $ville;
        // echo "<br/>";
        // echo "lien : " . $lien;
        // echo "<br/>";
        // echo "change_date_event : " . $change_date_event;
        // echo "<br/>";

        if ($image['error'] != UPLOAD_ERR_OK) {
            $_SESSION['errorMessage'] = "Erreur lors de la création de l'actualité";
            header('Location: ../nouvelle-actualite.php');
            exit();
        }

        $parties = explode('.', $image['name']);

        $extension = $parties[1];
        $ext = '.' . $extension;
        $nom_image_init =  $parties[0];

        $finfo = finfo_open(FILEINFO_MIME);
        $info = finfo_file($finfo, $image['tmp_name']);
        $info_cleaned = strstr($info, "; charset=binary", true);

        // La function check_extension_image permet de vérifier si une image est valide
        // Elle vérifie si l'extention correspond à l'image
        // Exemple : ".png" => "image/png",
        if (!check_extension_image($ext, $info_cleaned)) {
            $_SESSION['errorMessage'] = "L'image n'est pas valide.";
            header('Location: ../nouvelle-actualite.php');
            exit();
        }

        $nom_image = $nom_image_init . uniqid() . $ext;


        // On enregistre l'image dans le dossier upload
        move_uploaded_file($image['tmp_name'], '../upload/' . $nom_image);

        $insertActualite = insertActualite($titre, $description, $date_output, $heure, $nom_image, $ville, $lien, $_SESSION['id']);
        
        if(!$insertActualite) {
            $_SESSION['errorMessage'] = "Erreur lors de la création de l'actualité";
            header('Location: ../nouvelle-actualite.php');
            exit();
        }


        $_SESSION['success'] = "Votre actualité à été publié avec succès.";
        header('Location: ../actualite.php');
        exit();

    } else {
        $_SESSION['errorMessage'] = "Veuillez remplir tous les champs.";

        header('Location: ../nouvelle-actualite.php');
        exit();
    }
}

// Redirection vers la page d'inscription
// header('Location: ../nouvelle-actualite.php');
// exit();
