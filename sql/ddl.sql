
USE morgan_portefolio;

DROP TABLE IF EXISTS UTILISATEUR;

CREATE TABLE IF NOT EXISTS UTILISATEUR(
id_personne     int(10)         PRIMARY KEY
                                AUTO_INCREMENT,
                                
nom             varchar(50)     NOT NULL,
prenom          varchar(50)     NOT NULL,
email           varchar(120)     NOT NULL,
mot_de_passe    varchar(80)     NOT NUll

)ENGINE=MyISAM
        DEFAULT CHARSET=utf8mb4 
        COLLATE=utf8mb4_general_ci;
