-- DROP DATABASE IF EXISTS ourse;
-- CREATE DATABASE ourse;
-- USE ourse;

-- DROP TABLE ACTUALITE;
-- DROP TABLE USERS;
-- DROP PROCEDURE CreerActualite;

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
    image VARCHAR(50),
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
INSERT INTO ACTUALITE (titre, description, date, heure, image, ville, lien, id_user) 
VALUES ('Nouvelle exposition', 'Découvrez notre nouvelle exposition', '2024-05-01', '14:00', "image1.jpg", 'Paris', 'https://exemple.com/exposition', 1);

INSERT INTO ACTUALITE (titre, description, date, image, ville, id_user) 
VALUES ('Nouveau produit', 'Découvrez notre nouveau produit', '2024-05-10', "image2.jpg", 'New York', 2);




-- Procédure stockée pour créer une actualité
DELIMITER $$
CREATE PROCEDURE CreerActualite(
    IN p_titre VARCHAR(255),
    IN p_description TEXT,
    IN p_date DATE,
    IN p_heure VARCHAR(50),
    IN p_image VARCHAR(50),
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