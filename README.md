# Documentation du Projet

## Description

Ce projet est un site web simple permettant aux utilisateurs de se connecter et de s'inscrire. Le site utilise PHP et MySQL pour la gestion des utilisateurs.

## Prérequis

- MAMP (ou tout autre serveur local supportant PHP et MySQL)
- Navigateur web

## Installation

1. **Télécharger et installer MAMP :**
   - Vous pouvez télécharger MAMP depuis [le site officiel](https://www.mamp.info/en/).

2. **Démarrer le serveur MAMP :**
   - Ouvrez MAMP et démarrez les serveurs Apache et MySQL.

3. **Configurer la base de données :**
   - Accédez à [phpMyAdmin](http://localhost/phpmyadmin) via votre navigateur.
   - Créez une nouvelle base de données nommée `site_maintenance_appli`.
   - Dans cette base de données, créez une table nommée `users` avec les colonnes suivantes :
     - `id` (INT, AUTO_INCREMENT, PRIMARY KEY)
     - `username` (VARCHAR)
     - `password` (VARCHAR)

4. **Placer les fichiers du projet :**
   - Placez les fichiers du projet dans le répertoire `htdocs` de MAMP. Par exemple : `C:/MAMP/htdocs/mon_projet`.

5. **Configurer le fichier `config.php` :**
   - Assurez-vous que le fichier `config.php` contient les bonnes informations de connexion à la base de données. Voici un exemple de configuration :
     ```php
     // filepath: /C:/Users/COEUGNIET/Desktop/IUT/BUT3/Maintenance Applicative/maintenance_applicative/includes/config.php
     <?php
     session_start();
     $host = 'localhost';
     $db = 'site_maintenance_appli';
     $user = 'root'; // Par défaut, l'utilisateur est 'root' pour MAMP
     $pass = 'root'; // Par défaut, le mot de passe est 'root' pour MAMP
     $charset = 'utf8mb4';

     $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
     $options = [
         PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
         PDO::ATTR_EMULATE_PREPARES   => false,
     ];

     try {
         $pdo = new PDO($dsn, $user, $pass, $options);
     } catch (\PDOException $e) {
         throw new \PDOException($e->getMessage(), (int)$e->getCode());
     }
     ?>
     ```

6. **Accéder au site :**
   - Ouvrez votre navigateur et accédez à `http://localhost/mon_projet` (remplacez `mon_projet` par le nom du répertoire où vous avez placé les fichiers du projet).

## Fonctionnalités

- **Page de Connexion :**
  - Permet aux utilisateurs de se connecter en utilisant leur nom d'utilisateur et leur mot de passe.
  - Redirige vers la page d'accueil après une connexion réussie.

- **Page d'Inscription :**
  - Permet aux nouveaux utilisateurs de créer un compte en fournissant un nom d'utilisateur et un mot de passe.
  - Redirige vers la page de connexion après une inscription réussie.

- **Page d'Accueil :**
  - Affiche un message de bienvenue.
  - Indique si l'utilisateur est connecté et affiche son nom d'utilisateur.

## Bugs Connus

- **Connexion avec des identifiants incorrects :**
  - Actuellement, le site permet de se connecter même avec des identifiants incorrects. 

## Créateurs du site

- [Sergent Lucas]
- [Hallot Hugo]

