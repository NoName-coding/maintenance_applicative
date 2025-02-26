<?php
// Démarre une session ou reprend une session existante
session_start();

// Informations de connexion à la base de données
$host = "localhost";
$dbname = "site_maintenance_appli";
$username = "root";  
$password = "root";      

try {
    // Crée une nouvelle connexion PDO à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configure PDO pour afficher les erreurs sous forme d'exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'erreur de connexion, affiche un message d'erreur et arrête l'exécution du script
    die("Erreur de connexion : " . $e->getMessage());
}
?>