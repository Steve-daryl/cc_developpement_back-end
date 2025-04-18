<?php
session_start();
require 'db/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE nom = ? AND password = ?");
    $stmt->execute([$nom, $password]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user'] = $user;
        header("Location: users/index.php");
        exit;
    } else {
        $error = "nom ou mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text text-center col-md-6">Connectez-vous !</h2>
    <form action="" method="post">
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <div class="form-group col-md-6">
            <label for="nom" class="form-label">nom</label>
            <input type="text" class="form-control" name="nom" placeholder="nom" required>
        </div>
        <div class="form-group col-md-6">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
        </div>
        <button class="my-2 btn btn-primary" type="submit" name="btnSubmit">Se connecter</button>
    </form>
</div>
</body>
</html>
