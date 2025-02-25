<?php
session_start();

$host = "localhost";
$dbname = "mini_site";
$username = "root";  // Mettez votre utilisateur MySQL
$password = "";      // Mettez votre mot de passe MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
