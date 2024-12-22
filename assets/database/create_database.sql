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
    image_url text 
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
    id INT PRIMARY KEY AUTO_INCREMENT,
    utilisateur_id  INT,
    nom_role VARCHAR(50),
    foreign key (utilisateur_id) references utilisateur(id)
);

/*  table user_status  */

create table if not exists user_status (
    id INT PRIMARY KEY AUTO_INCREMENT,
    utilisateur_id  INT,
    userstatus ENUM('pending', 'active','archived') NOT NULL DEFAULT 'pending',
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
('admin', 'admin@rento.car', '$2y$10$uUlbU2wwI649p.ZKCwAlLOTAhJZKp6qSjFugJH8IJ1HxRNI3I0pKC'),
('Alice Dupont', 'alice.dupont@mail.com', 'password123'),
('Bob Martin', 'bob.martin@mail.com', 'password456'),
('Charlie Petit', 'charlie.petit@mail.com', 'password789'),
('David Lefevre', 'david.lefevre@mail.com', 'password101'),
('Eve Durand', 'eve.durand@mail.com', 'password102');


INSERT INTO voiture (marque, modele, matricule, prix_par_jour, disponible, image_url) VALUES
('Mazda', 'MX-5', 'MAZ123456789', 150.00, 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/2015_Mazda_MX-5_ND_2.0_SKYACTIV-G_160_i-ELOOP_Rubinrot-Metallic_Vorderansicht.jpg/400px-2015_Mazda_MX-5_ND_2.0_SKYACTIV-G_160_i-ELOOP_Rubinrot-Metallic_Vorderansicht.jpg'),
('Volkswagen', 'Kübelwagen', 'VWG987654321', 200.00, 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/VW_Kuebelwagen_1.jpg/400px-VW_Kuebelwagen_1.jpg'),
('Porsche', 'Cayenne', 'POR123987654', 300.00, 0, 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/2014_Porsche_Cayenne_%2892A_MY14%29_GTS_wagon_%282015-08-07%29_01.jpg/400px-2014_Porsche_Cayenne_%2892A_MY14%29_GTS_wagon_%282015-08-07%29_01.jpg'),
('Vauxhall', 'Chevette', 'VAU357159246', 100.00, 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Vintage_car_at_the_Wirral_Bus_%26_Tram_Show_-_DSC03336.JPG/400px-Vintage_car_at_the_Wirral_Bus_%26_Tram_Show_-_DSC03336.JPG'),
('Dymaxion', 'Car', 'DYM246357468', 500.00, 0, 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Dynamixion_car_by_Buckminster_Fuller_1933_%28side_views%29.jpg/400px-Dynamixion_car_by_Buckminster_Fuller_1933_%28side_views%29.jpg'),
('Ford', 'Crown Victoria', 'FOR998877665', 120.00, 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Ford_Crown_Victoria_LX.jpg/400px-Ford_Crown_Victoria_LX.jpg'),
('Plymouth', 'Superbird', 'PLY123987654', 250.00, 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/Plymouth_Superbird.jpg/400px-Plymouth_Superbird.jpg'),
('Saab', '9000', 'SAB456789123', 180.00, 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/2nd-Saab-9000-hatch.jpg/400px-2nd-Saab-9000-hatch.jpg'),
('Pontiac', 'Sunfire', 'PON345678901', 90.00, 0, 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/2003-2005_Pontiac_Sunfire.jpg/400px-2003-2005_Pontiac_Sunfire.jpg'),
('AMC', 'Javelin', 'AMC876543210', 220.00, 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/1971_AMC_Javelin_SST_red_Kenosha_street.JPG/400px-1971_AMC_Javelin_SST_red_Kenosha_street.JPG'),
('Jaguar', 'X-Type', 'JAG654321987', 270.00, 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cb/Jaguar_X-Type_Estate_front_20080731.jpg/400px-Jaguar_X-Type_Estate_front_20080731.jpg'),
('Volkswagen', 'Phaeton', 'VWP123456789', 320.00, 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/VW_Phaton_%282._Facelift%29_%E2%80%93_Frontansicht%2C_7._Mai_2011%2C_D%C3%BCsseldorf.jpg/400px-VW_Phaton_%282._Facelift%29_%E2%80%93_Frontansicht%2C_7._Mai_2011%2C_D%C3%BCsseldorf.jpg'),
('Pontiac', 'G6', 'PON567890123', 150.00, 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Pontiac_G6.jpg/400px-Pontiac_G6.jpg'),
('Ford', 'Five Hundred', 'FOR345678987', 180.00, 0, 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/Ford500a.JPG/400px-Ford500a.JPG'),
('Pontiac', 'Solstice', 'PON765432098', 220.00, 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/PontiacSolstice.jpg/400px-PontiacSolstice.jpg'),
('Fiat', 'Tipo', 'FIA543210987', 110.00, 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Fiat_tipo_f.jpg/400px-Fiat_tipo_f.jpg'),
('Plymouth', 'Reliant', 'PLY258369741', 130.00, 0, 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/1985-89_Plymouth_Reliant_K_LE.png/400px-1985-89_Plymouth_Reliant_K_LE.png'),
('Chevrolet', 'Chevette', 'CHE987654123', 90.00, 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/1978_chevette.JPG/400px-1978_chevette.JPG'),
('SEAT', 'León', 'SEA654321789', 140.00, 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Seat_Leon_1.4_TSI_Start%26Stop_Style_%28III%29_%E2%80%93_Frontansicht%2C_10._August_2013%2C_Ratingen.jpg/400px-Seat_Leon_1.4_TSI_Start%26Stop_Style_%28III%29_%E2%80%93_Frontansicht%2C_10._August_2013%2C_Ratingen.jpg'),
('Chevrolet', 'Corsica', 'CHE321654987', 100.00, 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/af/Chevrolet_Corsica_1994.jpg/400px-Chevrolet_Corsica_1994.jpg');


INSERT INTO roles (utilisateur_id,nom_role) VALUES
(1,'admin');
INSERT INTO user_status (utilisateur_id,userstatus) VALUES
(1,'active'),(2,'pending'),(3,'pending'),(4,'pending'),(5,'active'),(6,'archived');

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


