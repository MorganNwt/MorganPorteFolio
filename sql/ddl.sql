USE morgan_portefolio;

DROP TABLE IF EXISTS INFOS_USERS;
DROP TABLE IF EXISTS USERS;


CREATE TABLE IF NOT EXISTS USERS (
    id              int(10) AUTO_INCREMENT PRIMARY KEY,
    email           varchar(50) NOT NULL,
    passwd          varchar(255) NOT NULL
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4 
  COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS INFOS_USERS (
    id              int(10) AUTO_INCREMENT PRIMARY KEY,
    nom             varchar(50) NOT NULL,
    prenom          varchar(50) NOT NULL,
    adresse         varchar(50) NOT NULL,
    date_naissance  date NOT NULL,
    user_id        int(10) NOT NULL,
    FOREIGN KEY (id_user) REFERENCES USERS(id)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4 
  COLLATE=utf8mb4_general_ci;