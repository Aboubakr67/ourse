-- DROP DATABASE IF EXISTS ourse;
-- CREATE DATABASE ourse;
-- USE ourse;

-- DROP TABLE ACTUALITE;
-- DROP TABLE USERS;
-- DROP PROCEDURE CreerActualite;
-- DROP PROCEDURE GetActualites;
-- DROP PROCEDURE GetActualiteByID;
-- DROP PROCEDURE UpdateActualite;

CREATE TABLE USERS (
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    pseudo VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(255),
    role VARCHAR(50)
);

CREATE TABLE ACTUALITE (
    id_actualite INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255),
    description TEXT,
    date DATE,
    heure VARCHAR(50),
    image VARCHAR(255),
    ville VARCHAR(50),
    lien VARCHAR(255),
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES USERS(id_user)
);




-- Insérer un utilisateur
INSERT INTO USERS (pseudo, email, password, role) 
VALUES ('user1', 'user1@example.com', '$2y$10$9mQJTErtJ7EgwEopdn4j4.fLDQisEfLeFtGWHGRWzSxzuKoy7hi46', 'user-standard');

INSERT INTO USERS (pseudo, email, password, role) 
VALUES ('user2', 'user2@example.com', '$2y$10$9mQJTErtJ7EgwEopdn4j4.fLDQisEfLeFtGWHGRWzSxzuKoy7hi46', 'user-redacteur');

INSERT INTO USERS (pseudo, email, password, role) 
VALUES ('ab', 'ab@gmail.com', '$2y$10$9mQJTErtJ7EgwEopdn4j4.fLDQisEfLeFtGWHGRWzSxzuKoy7hi46', 'admin');


-- Insertion des actualités 
-- INSERT INTO ACTUALITE (titre, description, date, heure, image, ville, lien, id_user) 
-- VALUES ('Nouvelle exposition', 'Découvrez notre nouvelle exposition', '2024-05-01', '14:00', "image1.jpg", 'Paris', 'https://exemple.com/exposition', 1);

-- INSERT INTO ACTUALITE (titre, description, date, image, ville, id_user) 
-- VALUES ('Nouveau produit', 'Découvrez notre nouveau produit', '2024-05-10', "image2.jpg", 'New York', 2);




-- Procédure stockée pour créer une actualité
DELIMITER $$
CREATE PROCEDURE CreerActualite(
    IN p_titre VARCHAR(255),
    IN p_description TEXT,
    IN p_date DATE,
    IN p_heure VARCHAR(50),
    IN p_image VARCHAR(255),
    IN p_ville VARCHAR(50),
    IN p_lien VARCHAR(255),
    IN p_id_user INT
)
BEGIN
    -- Insérer l'actualité dans la table ACTUALITE
    INSERT INTO ACTUALITE (titre, description, date, heure, image, ville, lien, id_user) 
    VALUES (p_titre, p_description, p_date, IFNULL(p_heure, NULL), p_image, p_ville, IFNULL(p_lien, NULL), p_id_user);
END$$
DELIMITER ;

-- Exemple d'appelle à la procédure stockée :
-- CALL CreerActualite(
--     'Voici une actualité 1',
--     'Ceci est une description',
--     '2024-05-01',
--     '14:00',
--     "image-new1.jpg",
--     'Marseille',
--     'https://exemple.com/exposition',
--     1
-- );


-- Récuperer toutes les actualités
DELIMITER $$
CREATE PROCEDURE GetActualites()
BEGIN
    SELECT *
    FROM ACTUALITE
    ORDER BY date ASC, heure ASC;
END$$
DELIMITER ;
-- CALL GetActualites();


-- Récuperer une actualité
DELIMITER $$
CREATE PROCEDURE GetActualiteByID(IN p_id_actualite INT)
BEGIN
    SELECT * FROM ACTUALITE WHERE id_actualite = p_id_actualite;
END$$
DELIMITER ;

-- CALL GetActualiteByID(1);


-- Modifier une actualité
DELIMITER $$
CREATE PROCEDURE UpdateActualite(
    IN p_id_actualite INT,
    IN p_titre VARCHAR(255),
    IN p_description TEXT,
    IN p_date DATE,
    IN p_heure VARCHAR(50),
    IN p_nom_image VARCHAR(255),
    IN p_ville VARCHAR(255),
    IN p_lien VARCHAR(255),
    IN p_id_user INT
)
BEGIN
    UPDATE ACTUALITE
    SET
        titre = p_titre,
        description = p_description,
        date = p_date,
        heure = p_heure,
        image = p_nom_image,
        ville = p_ville,
        lien = p_lien,
        id_user = p_id_user
    WHERE
        id_actualite = p_id_actualite;
END$$
DELIMITER ;


-- Appelle de la procédure
-- CALL UpdateActualite(
--     2, 
--     'Nouveau titre', 
--     'Nouvelle description',
--     '2024-05-30', 
--     '15:00', 
--     'ourse66329520768ca.png', 
--     'Nouvelle ville', 
--     'http://example.com/nouveau-lien', 
--     3 
-- );


-- Supprimer une actualité
DELIMITER $$
CREATE PROCEDURE deleteActualite(IN p_id_actualite INT)
BEGIN
    DELETE FROM ACTUALITE WHERE id_actualite = p_id_actualite;
END$$
DELIMITER ;


-- Récuperer tout les utilisateurs
DELIMITER $$
CREATE PROCEDURE GetUsers()
BEGIN
    SELECT id_user, pseudo, email, role
    FROM USERS;
END$$
DELIMITER ;
-- CALL GetUsers();


-- Récuperer un seul utilisateur à l'aide de son id
DELIMITER $$
CREATE PROCEDURE GetUserByID(
    IN p_id_user INT
)
BEGIN
    SELECT id_user, pseudo, email, role FROM USERS WHERE id_user = p_id_user;
END$$
DELIMITER ;
-- CALL GetUserByID();


-- Modifier un utilisateur
DELIMITER $$
CREATE PROCEDURE UpdateUser(
    IN p_id_user INT,
    IN p_pseudo VARCHAR(50),
    IN p_email VARCHAR(50),
    IN p_role VARCHAR(50)
)
BEGIN
    UPDATE USERS
    SET pseudo = p_pseudo,
        email = p_email,
        role = p_role
    WHERE id_user = p_id_user;
END$$
DELIMITER ;
-- CALL UpdateUser();


-- Supprimer un utilisateur
DELIMITER $$
CREATE PROCEDURE DeleteUserByID(
    IN p_id_user INT
)
BEGIN
    DELETE FROM USERS WHERE id_user = p_id_user;
END$$
DELIMITER ;
-- CALL DeleteUserByID();



