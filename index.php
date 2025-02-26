<?php 
// Inclut le fichier de configuration pour la connexion à la base de données
include("includes/config.php"); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <!-- Lien vers le fichier CSS pour le style -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Inclut le fichier d'en-tête -->
    <?php include("includes/header.php"); ?>
    <h1>Bienvenue sur notre site</h1>
    <!-- Vérifie si l'utilisateur est connecté et affiche un message de bienvenue -->
    <?php if (isset($_SESSION['user'])): ?>
        <p>Vous êtes connecté en tant que <?php echo $_SESSION['user']; ?>.</p>
    <?php endif; ?>
</body>
</html>