MorganPorteFolio

Présentation

MorganPorteFolio est un site web personnel développé afin de présenter mon profil, mes projets et mes compétences techniques.
Le projet combine une partie front-end (HTML, CSS, JavaScript) et une partie back-end en PHP avec base de données MySQL.
Il intègre également plusieurs mini-jeux développés en JavaScript afin de démontrer ma maîtrise du DOM, de la logique algorithmique et de l’interaction utilisateur.

Objectifs du projet

Structurer un projet web complet

Mettre en pratique la manipulation du DOM en JavaScript

Développer une logique algorithmique (jeux interactifs)

Mettre en place une connexion à une base de données via PHP (PDO)

Organiser un projet de manière claire et maintenable

Utiliser Git pour le versioning

Stack technique :

Front-end
HTML5
CSS3
JavaScript 
Back-end
PHP
MySQL
PDO

Outils :

Git / GitHub
VS Code

Architecture du projet :

Le projet est organisé de manière modulaire :

javascript/ → Logique des jeux et interactions

style/ → Feuilles de style par page

service/ → Connexion à la base de données

sql/ → Scripts de création et d’initialisation de la base

views/ → Pages liées à l’authentification

images/ → Ressources visuelles

Cette organisation permet une séparation claire des responsabilités entre structure, style, logique et accès aux données.

Fonctionnalités :

Partie Portfolio
Page d’accueil
Présentation personnelle
Page projets
Page jeux interactifs
Formulaire d’inscription
Page de connexion
Jeux JavaScript
Jeu du Pendu
Jeu du Mouton
Jeu de Tir

Ces jeux ont été développés en JavaScript natif afin de travailler :

La gestion d’événements
La manipulation du DOM
Les structures conditionnelles
Les tableaux et la logique métier

Base de données :

La base de données est fournie dans le dossier sql/ :

ddl.sql → création des tables
dml.sql → insertion de données

La connexion est gérée via PDO dans :

service/db_connect.php
Installation

Cloner le dépôt :

git clone https://github.com/MorganNwt/MorganPorteFolio.git

Importer les fichiers SQL dans MySQL (via phpMyAdmin ou autre).

Configurer les paramètres de connexion dans db_connect.php.

Lancer le projet via un serveur local (Wamp, XAMPP, MAMP).

                 Commande utiles:
git init // pour créeer le git( en local sur le pc )
git remote remove origin // + nom du dossier pour effacer le dépot
----------------------------------------------------------------------
           les 3 lignes pour liée le git au github:
git remote add origin https://github.com/MorganNwt/TeamWork.git
git branch -M main   
git pull origin main // pour transférer le dépôt de github a git
git push -u origin main // 1er push sur github
---------------------------------------------------------

git add . // pour ajouter au commit
git status // pour vérifier le status des fichier a commit
git commit -m "ceci est mon nouveau titre" // pour donner un nom au commit
git commit --amend --no-edit // sans rien derrière pour ajouter toutes modif à un commit en cours
git commit --amend -m "Nouveau message" // pour modifier le message d'un commit

git push origin main //  pour transférer le dépôt du git sur le github
git branch morgan // pour créer la branch
git branch  -m morgan // pour modifier le nom de la branch
git checkout // ppour vérifier sur quel branch on est
git checkout dev // pour me déplacer sur la branch
git checkout -b // + nom de la branch pour ce déplacer et créer la nouvelle branch
git merge dev // pour ajouter la plus value sur la branch dev
-----------------------------------------------------------------
git log // pour voir tout les commit ( esc + :q) pour quitter le log
git remote // pour voir le nombre de connexion au github
 git branch -d morgan // pour supprimer une branch une fois le push git et le merge request effectué sur github
--------------------------------------------------------------------------
git reset --soft de544f1d228cd2fdf24eddf38175cdd9e77ebbed // pour revenir en arrière sur un commit si je fait plusieurs commit sans avoir fait le push uniquement. le commit est déjà indexé

git reset --mixed de544f1d228cd2fdf24eddf38175cdd9e77ebbed // même chose mas le commit n'est pas indexé
git reset --hard de544f1d228cd2fdf24eddf38175cdd9e77ebbed // même chose mais efface tout

