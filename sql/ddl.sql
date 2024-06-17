DROP DATABASE IF EXISTS morgan_portefolio;
CREATE DATABASE IF NOT EXISTS morgan_portefolio;

USE morgan_portefolio;

DROP TABLE IF EXISTS INSCRIPTION;

CREATE TABLE IF NOT EXISTS INSCRIPTION(
id_personne     int(10)         NOT NULL
                                PRIMARY KEY
                                AUTO_INCREMENT,
                                
nom             varchar(30)     NOT NULL,
prenom          varchar(30)     NOT NULL,
email           varchar(50)     NOT NULL,
mot_de_passe    varchar(50)     NOT NUll

)ENGINE=MyISAM
        DEFAULT CHARSET=utf8mb4 
        COLLATE=utf8mb4_general_ci;

