/* drop database if exists rento_car ; */ 
create database if not exists rento_car ;

/*  */

use rento_car ;

/*  table utilisateur  */

create table if not exists utilisateur (
    id int AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(255) not null ,
    email VARCHAR(255) unique not null,
    mot_pass text not null,
    date_inscription timestamp DEFAULT CURRENT_TIMESTAMP 
);

/*  table voiture  */
create table if not exists voiture (
    id int AUTO_INCREMENT PRIMARY KEY ,
    marque VARCHAR(50) not null ,
    modele VARCHAR(50) not null ,
     matricule VARCHAR(50) unique not null,
    prix_par_jour DECIMAL(10,2) not null ,
    disponible boolean default 1 ,
    image_url VARCHAR(255)
);
/*  table reservations  */
create table if not exists reservations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    utilisateur_id INT,
    voiture_id INT,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    statut ENUM('pending', 'confirmed', 'cancelled') NOT NULL DEFAULT 'pending',
    foreign key (utilisateur_id) references utilisateur(id) ,
    foreign key (voiture_id) references voiture(id) 
);

/*  table roles  */

create table if not exists roles (
    id_role INT PRIMARY KEY AUTO_INCREMENT,
    utilisateur_id  INT,
    nom_role VARCHAR(50),
    foreign key (utilisateur_id) references utilisateur(id)
);

/*  table paiements */

create table if not exists paiements (
    id_paiement INT PRIMARY KEY AUTO_INCREMENT,
    reservation_id INT,
    montant DECIMAL(10, 2) NOT NULL,
    date_paiement DATE NOT NULL,
   foreign key  (reservation_id)  references reservations(id)
);

INSERT INTO utilisateur (name, email, mot_pass) VALUES
('admin', 'admin@rento.car', 'admin_rento'),
('Alice Dupont', 'alice.dupont@mail.com', 'password123'),
('Bob Martin', 'bob.martin@mail.com', 'password456'),
('Charlie Petit', 'charlie.petit@mail.com', 'password789'),
('David Lefevre', 'david.lefevre@mail.com', 'password101'),
('Eve Durand', 'eve.durand@mail.com', 'password102');

INSERT INTO voiture (marque, modele, prix_par_jour, matricule, disponible, image_url) VALUES
('Tesla', 'Model 3', 120, 'A1234' , 1, 'https://example.com/tesla-model3.jpg'),
('BMW', 'X5', 150, 'B23234' , 1, 'https://example.com/bmw-x5.jpg'),
('Audi', 'A4', 200, 'A11534' , 1, 'https://example.com/audi-a4.jpg'),
('Renault', 'Clio', 50, 'A3421234' , 0, 'https://example.com/renault-clio.jpg'),
('Ford', 'Focus', 90 , 'B200234' , 1, 'https://example.com/ford-focus.jpg');

INSERT INTO roles (utilisateur_id,nom_role) VALUES
(1,'admin');

INSERT INTO reservations (utilisateur_id, voiture_id, date_debut, date_fin, statut) VALUES
(1, 1, '2024-12-10', '2024-12-15', 'confirmed'),
(2, 2, '2024-12-12', '2024-12-18', 'pending'),
(3, 3, '2024-12-14', '2024-12-20', 'cancelled'),
(4, 4, '2024-12-16', '2024-12-19', 'pending'),
(5, 5, '2024-12-18', '2024-12-22', 'confirmed');

INSERT INTO paiements (reservation_id, montant, date_paiement) VALUES
(1, 600.00, '2024-12-09'),
(2, 750.00, '2024-12-11'),
(3, 550.00, '2024-12-13'),
(4, 240.00, '2024-12-15'),
(5, 320.00, '2024-12-17');


