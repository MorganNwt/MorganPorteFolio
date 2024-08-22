
INSERT INTO `infos_users` (`id`, `nom`, `prenom`, `adresse`, `date_naissance`, `users_id`) VALUES
(1, 'NWT', 'morgan', '5 chemin des vaches', '1987-03-28', 7);

INSERT INTO `users` (`id`, `email`, `passwd`) VALUES
(7, 'morgan.nwt@gmail.com', '$2y$10$If8PZOoDH3T1x2bXCmmwDeeH4IyGo9gQeTfyxXd7yNYXwANmXeGS.');

INSERT INTO `roles` (`id`, `role_name`) VALUES (NULL, 'ROLE_USER'), (NULL, 'ROLE_ADMIN');

INSERT INTO `user_roles` (`users_id`, `role_id`) VALUES ('1', '1');
