<?php 
// Inclut le fichier de configuration pour la connexion à la base de données
include("includes/config.php");

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password']; 

    // Prépare et exécute une requête pour vérifier les identifiants de l'utilisateur
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();

    // Si l'utilisateur est trouvé, initialise la session et redirige vers la page d'accueil
    if ($username) { 
        $_SESSION['user'] = $username; 
        header("Location: index.php");
        exit();
    } else {
        // Si les identifiants sont incorrects, affiche un message d'erreur
        $error = "Identifiants incorrects.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <!-- Lien vers le fichier CSS pour le style -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <!-- Affiche un message d'erreur si les identifiants sont incorrects -->
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <!-- Formulaire de connexion -->
        <form method="post">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>
        <p>Pas de compte ? <a href="register.php">Créer un compte</a></p>
    </div>
</body>
</html>