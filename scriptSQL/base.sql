create database argas;
use argas;
create table administrator(
    id_administrator int primary key auto_increment,
    username varchar(50) not null,
    password varchar(50) not null,
    email varchar(50) not null,
    phone varchar(50) not null
);
create table country(
  id_country INT PRIMARY KEY auto_increment,
  name_country VARCHAR(50) NOT NULL,
  code_country VARCHAR(3) NOT NULL);
create table city(
    id_city INT PRIMARY KEY auto_increment,
    name_city VARCHAR(50) NOT NULL,
    id_country INT NOT NULL,
    FOREIGN KEY (id_country) REFERENCES country(id_country)    
);

create table gender(
    id_gender INT PRIMARY KEY auto_increment,
    name_gender VARCHAR(50) NOT NULL
);

create table fieldOfWork(
    id_fieldOfWork INT PRIMARY KEY auto_increment,
    name_fieldOfWork VARCHAR(50) NOT NULL
);

create table citizen(
    id_citizen INT PRIMARY KEY auto_increment,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    birthdate DATE NOT NULL,
    id_gender INT NOT NULL,
    id_city INT NOT NULL,
    FOREIGN KEY (id_gender) REFERENCES gender(id_gender),
    FOREIGN KEY (id_city) REFERENCES city(id_city)
);

create table citizen_temp(
    id_citizen INT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    birthdate DATE NOT NULL,
    id_gender INT NOT NULL,
    id_city INT NOT NULL,
    FOREIGN KEY (id_gender) REFERENCES gender(id_gender),
    FOREIGN KEY (id_city) REFERENCES city(id_city)
);

 select citizen_temp.id_citizen as id_citizen, citizen_temp.firstname as firstname, citizen_temp.lastname as lastname, citizen_temp.birthdate as birthdate, citizen_temp.id_gender as id_gender, citizen_temp.id_city as id_city
 from citizen_temp left join citizen on  citizen.id_citizen = citizen_temp.id_citizen where citizen.id_citizen IS NULL;