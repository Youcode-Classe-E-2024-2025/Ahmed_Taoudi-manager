/* drop database if exists rento_car ; */ 
create database if not exists rento_car ;

/*  */

use rento_car ;

/*  table utilisateur  */

create table if not exists utilisateur (
    id int AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(255) not null ,
    email VARCHAR(255) unique not null,
    date_inscription timestamp DEFAULT CURRENT_TIMESTAMP 
);

/*  table voiture  */
create table if not exists voiture (
    id int AUTO_INCREMENT PRIMARY KEY ,
    marque VARCHAR(50) not null ,
    modele VARCHAR(50) not null ,
    prix_par_jour VARCHAR(50) not null ,
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
    foreign key (utilisateur_id) references utilisateur(id)
);

/*  table paiements */

create table if not exists paiements (
    id_paiement INT PRIMARY KEY AUTO_INCREMENT,
    reservation_id INT,
    montant DECIMAL(10, 2) NOT NULL,
    date_paiement DATE NOT NULL,
   foreign key  (reservation_id)  references reservations(id_reservation)
);
