CREATE DATABASE location_voiture;
USE location_voiture;

CREATE TABLE ROLES (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL
);

CREATE TABLE USERS (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(20),
    password VARCHAR(255) NOT NULL,
    role_id INT(11),
    date_inscription DATETIME NOT NULL DEFAULT NOW(),
    FOREIGN KEY (role_id) REFERENCES ROLES(id) ON DELETE CASCADE
);

CREATE TABLE CLIENTS (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    adresse VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES USERS(id) ON DELETE CASCADE
);

CREATE TABLE ADMINS (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    acces ENUM('Superadmin', 'Admin') NOT NULL,
    FOREIGN KEY (user_id) REFERENCES USERS(id) ON DELETE CASCADE
);

CREATE TABLE CATEGORIES (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE VOITURE (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    category_id INT(11),
    model VARCHAR(50) NOT NULL,
    image_url VARCHAR(255),
    prix_par_jour DECIMAL(10,2) NOT NULL,
    description TEXT,
    status ENUM('Disponible', 'Reserver') DEFAULT 'Disponible',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES CATEGORIES(id) ON DELETE SET NULL
);

CREATE TABLE RESERVATIONS (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL;
    user_id INT(11),
    voiture_id INT(11), 
    pickup_date DATE NOT NULL,
    return_date DATE NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    status ENUM('En attente', 'Confirmer', 'Annuler') DEFAULT 'En attente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES USERS(id) ON DELETE CASCADE,
    FOREIGN KEY (voiture_id) REFERENCES VOITURE(id) ON DELETE CASCADE
);
DELEMETUR //
CREATE procedure ajoutReservation(
    IN user_id INT,
    IN voiture_id INT,
    IN pickup_date date,
    IN return_date date ,
    In total_price DECIMAL(10,2)
 
)
BEGIN 
Insert into RESERVATIONS(user_id,voiture_id,pickup_date,return_date,total_price)
values(user_id,voiture_id,pickup_date,return_date,total_price);
UPDATE VOITURE
set  status='Reserver'
where id=voiture_id;
END;//


CREATE TABLE REVIEWS (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    user_id INT(11),
    voiture_id INT(11),
    rating INT, 
    comment TEXT,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES USERS(id) ON DELETE CASCADE,
    FOREIGN KEY (voiture_id) REFERENCES VOITURE(id) ON DELETE CASCADE
);