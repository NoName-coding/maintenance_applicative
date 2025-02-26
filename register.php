<?php 
// Inclut le fichier de configuration pour la connexion à la base de données
include("includes/config.php");

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prépare et exécute une requête pour vérifier si le nom d'utilisateur existe déjà
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Si le nom d'utilisateur existe déjà, affiche un message d'erreur
    if ($user) {
        $error = "Le nom d'utilisateur existe déjà.";
    } else {
        // Sinon, insère le nouvel utilisateur dans la base de données
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        if ($stmt->execute([$username, $password])) {
            // Redirige vers la page de connexion après l'inscription réussie
            header("Location: login.php");
            exit();
        } else {
            // Affiche un message d'erreur si l'insertion échoue
            $error = "Une erreur est survenue lors de la création du compte.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <!-- Lien vers le fichier CSS pour le style -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <!-- Affiche un message d'erreur si nécessaire -->
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <!-- Formulaire d'inscription -->
        <form method="post">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">Créer un compte</button>
        </form>
        <p>Déjà un compte ? <a href="login.php">Se connecter</a></p>
    </div>
</body>
</html>