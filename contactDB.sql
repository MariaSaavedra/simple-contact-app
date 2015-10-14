
DROP DATABASE IF EXISTS contactdb ; CREATE DATABASE contactdb;
USE contactdb;
DROP TABLE IF EXISTS contacts;
CREATE TABLE contacts (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `picture` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO contacts (firstName, lastName, phone, email) VALUES 
('Maria', 'Saavedra','913-602-0290','info@msaavedra.com'),
('Daniel', 'Linhart','913-735-9864','daniel@cremalab.com'),
('Nate', 'Olson','913-735-9300','nate@cremalab.com');