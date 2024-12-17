/* drop database if exists rento_car ; */ 
create database if not exists rento_car ;

/*  */

use rento_car ;

/*  */

create table if not exists utilisateur (
    id int AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(255) not null ,
    email VARCHAR(255) unique not null,
    date_inscription timestamp DEFAULT CURRENT_TIMESTAMP 
);

/*  */

/*  */

/*  */

/*  */