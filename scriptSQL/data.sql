/***administrateur**/
INSERT INTO administrator (username, password, email, phone) VALUES
('admin1', sha1('lolo'), 'lolemadaly@gmail.com', '00261343886428');
SELECT * FROM administrator WHERE username = 'admin1' AND password = sha1('lolo');


/*Citizen*/
INSERT INTO citizen(firstname,lastname,birthdate,id_gender,id_city) VALUES('Miguel','Gonzales','1980-05-27',1,4);
INSERT INTO citizen(firstname,lastname,birthdate,id_gender,id_city) VALUES('raul','morata','1990-07-07',1,2);



/***country data***/
INSERT INTO country (name_country, code_country) VALUES
('Argentine', 'ARG'),
('Bolivie', 'BOL'),
('Brésil', 'BRA'),
('Colombie', 'COL'),
('Équateur', 'ECU');



/***CITY DATA**/
INSERT INTO city (name_city, id_country) VALUES
('Buenos Aires', 1),
('Córdoba', 1),
('Rosario', 1),
('Mendoza', 1),
('La Plata', 1),
('San Miguel de Tucumán', 1);

INSERT INTO city (name_city, id_country) VALUES
('La Paz', 2),
('Santa Cruz de la Sierra', 2),
('Cochabamba', 2),
('Sucre', 2),
('Oruro', 2);

INSERT INTO city (name_city, id_country) VALUES
('Rio de Janeiro', 3),
('São Paulo', 3),
('Brasília', 3),
('Salvador', 3),
('Fortaleza', 3);

INSERT INTO city (name_city, id_country) VALUES
('Bogota', 4),
('Medellín', 4),
('Cali', 4),
('Barranquilla', 4),
('Cartagena', 4);

INSERT INTO city (name_city, id_country) VALUES
('Quito', 5),
('Guayaquil', 5),
('Cuenca', 5),
('Santo Domingo de los Colorados', 5),
('Machala', 5);

/**data gender**/
INSERT INTO gender (name_gender) VALUES
('men'),
('women'),
('other');


/****  data fieldOfWOrk ****/
INSERT INTO fieldOfWork (name_fieldOfWork) VALUES
('Information Technology (IT) and Computer Science'),
('Healthcare and Medical Services'),
('Education'),
('Engineering and Construction'),
('Finance and Accounting'),
('Commerce and Marketing'),
('Manufacturing Industry'),
('Agriculture and Agri-food'),
('Law and Legal Services'),
('Arts and Entertainment'),
('Tourism and Hospitality');
