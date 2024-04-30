DROP DATABASE IF EXISTS ourse;
CREATE DATABASE ourse;
USE ourse;

CREATE TABLE USERS (
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    pseudo VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(255),
    role VARCHAR(50)
);

CREATE TABLE ACTUALITE (
    id_actualite INT PRIMARY KEY AUTO_INCREMENT,
    description TEXT,
    date_actualite VARCHAR(50),
    image VARCHAR(255),
    ville VARCHAR(50),
    lien VARCHAR(255),
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES USERS(id_user)
);


-- Insérer un utilisateur
INSERT INTO USERS (pseudo, email, password, role) 
VALUES ('utilisateur1', 'utilisateur1@example.com', 'motdepasse1', 'utilisateur');

-- Insérer un autre utilisateur
INSERT INTO USERS (pseudo, email, password, role) 
VALUES ('admin', 'admin@example.com', 'admin123', 'administrateur');


-- Insérer une actualité
INSERT INTO ACTUALITE (description, date_actualite, image, ville, lien, id_user) 
VALUES ('Nouvelle exposition au musée', '2024-04-29', 'image_exposition.jpg', 'Paris', 'https://exemple.com/exposition', 1);

-- Insérer une autre actualité
INSERT INTO ACTUALITE (description, date_actualite, image, ville, lien, id_user) 
VALUES ('Lancement d\'un nouveau produit', '2024-05-10', 'image_produit.jpg', 'New York', 'https://exemple.com/produit', 2);

