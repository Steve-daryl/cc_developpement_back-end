<?php
session_start();
include("db.php");

if (isset($_POST["btnSubmit"])) {
    if (!empty($_POST["pseudo"]) AND !empty($_POST["password"])) {
        // Récupération des champs du formulaire
        $pseudo = trim(htmlspecialchars($_POST["pseudo"]));
        $password = trim(htmlspecialchars($_POST["password"]));

        $req = $pdo->prepare("SELECT * FROM utilisateurs WHERE pseudo = ? AND password = ?");
      	$req->execute(array($pseudo, sha1($password)));

        if ($req->rowCount() == 1) {
            $user = $req->fetch(); // Récupérer les données de l'utilisateur.
            $_SESSION['pseudo'] = $user->pseudo;
            header("Location: dashboard.php?pseudo=".$_SESSION['pseudo']);
        }else{
            $error = "Nom d'utilisateur ou mot de passe incorrect";
        }
    }else {
        $error = "Veuillez remplir tous les champs !";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text text-center col-md-6">Connectez-vous !</h2>
        <form action="" method="post">
            <div class="form-group col-md-6">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" name="pseudo" class="form-control" id="pseudo">
            </div>
            <div class="form-group col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <button class="my-2 btn btn-primary" type="submit" name="btnSubmit">Se connecter</button>
            <p>Avez-vous un compte ? <a class="text text-primary" href="inscription.php">S'incrire... ?</a></p>
        </form>
    </div>
</body>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>

</html>