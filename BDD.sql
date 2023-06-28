CREATE DATABASE IF NOT EXISTS animacare CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE administrator
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL
)ENGINE=INNODB;

CREATE TABLE schedule
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    opening_time TIME NOT NULL,
    closing_time TIME NOT NULL
)ENGINE=INNODB;

CREATE TABLE gallery
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    image_url VARCHAR(255)
)ENGINE=INNODB;

CREATE TABLE employee
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(20) NOT NULL,
    lname VARCHAR(20) NOT NULL,
    title VARCHAR(50) NOT NULL,
    photo VARCHAR(255) NOT NULL
)ENGINE=INNODB;

CREATE TABLE appointment_type 
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL
)ENGINE=INNODB;

CREATE TABLE species 
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL
)ENGINE=INNODB;

CREATE TABLE user
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(20) NOT NULL,
    lname VARCHAR(20) NOT NULL,
    email VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(30) NOT NULL,
    role VARCHAR(20) NOT NULL
)ENGINE=INNODB;

CREATE TABLE animal
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    age INT NOT NULL,
    sex VARCHAR(10) NOT NULL,
    user INT NOT NULL,
    FOREIGN KEY (user) REFERENCES user(id),
    species INT NOT NULL,
    FOREIGN KEY (species) REFERENCES species(id) 
)ENGINE=INNODB;

CREATE TABLE appointment
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    appointment_time TIME NOT NULL,
    appointment_day DATE NOT NULL,
    appointment_type INT NOT NULL,
    FOREIGN KEY (appointment_type) REFERENCES appointment_type(id),
    user INT NOT NULL,
    FOREIGN KEY (user) REFERENCES user(id)
)ENGINE=INNODB;

INSERT INTO administrator(id, email, password, role) VALUES (1, 'adminVarcha@email.com', "$2y$10$iWfS4qnmT3F.v0T1XcA2Se1umlFU/lOatbYM6SUq0DxKsoqKxGwx6", "admin");

INSERT INTO schedule(id, opening_time, closing_time) VALUES (1, '08:00:00', '20:00:00');

INSERT INTO appointment_type(id, name) VALUES (1, "Consultation générale");
INSERT INTO appointment_type(id, name) VALUES (2, "Vaccination");
INSERT INTO appointment_type(id, name) VALUES (3, "Coupe de griffes");

INSERT INTO species(id, name) VALUES (1, "Chien");
INSERT INTO species(id, name) VALUES (2, "Chat");
INSERT INTO species(id, name) VALUES (3, "Lapin");
INSERT INTO species(id, name) VALUES (4, "Rongeur");

INSERT INTO user(id, fname, lname, email, password, phone_number, role) VALUES (1, "Mark", "Masas", "MarkMasas@email.com", "$2y$10$U9p9M9nO9gOkk9Uu0QTC5ef30mzRQS5MGO2g8b9D91eAHxoGndFpq", "002547325", "user");
