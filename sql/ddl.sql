USE morgan_portefolio;

DROP TABLE IF EXISTS user_roles;
DROP TABLE IF EXISTS roles;
DROP TABLE IF EXISTS infos_users;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS formulaire_contact;


CREATE TABLE `users` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `pseudo` varchar(255),
  `email` varchar(255),
  `passwd` varchar(255)
);

CREATE TABLE `infos_users` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(255),
  `prenom` varchar(255),
  `rue` varchar(255),
  `cp` integer(10),
  `ville` varchar(255),
  `date_naissance` date,
  `users_id` integer
);

CREATE TABLE `roles` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `role_name` varchar(255)
);

CREATE TABLE `user_roles` (
  `users_id` integer,
  `role_id` integer
);

CREATE TABLE `formulaire_contact` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(255),
  `prenom` varchar(255),
  `email` varchar(255),
  `telephone` varchar(255),
  `sujet` varchar(255),
  `message` text
);

ALTER TABLE `user_roles` ADD FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
ALTER TABLE `user_roles` ADD FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
ALTER TABLE `infos_users` ADD FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
