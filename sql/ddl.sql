USE morgan_portefolio;

DROP TABLE IF EXISTS user_roles;
DROP TABLE IF EXISTS roles;
DROP TABLE IF EXISTS infos_users;
DROP TABLE IF EXISTS users;


CREATE TABLE `users` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255),
  `passwd` varchar(255)
);

CREATE TABLE `infos_users` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(255),
  `prenom` varchar(255),
  `adresse` varchar(255),
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

ALTER TABLE `user_roles` ADD FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
ALTER TABLE `user_roles` ADD FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
ALTER TABLE `infos_users` ADD FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
