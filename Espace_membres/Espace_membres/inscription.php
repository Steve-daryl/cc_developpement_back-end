<?php
    include("traitement.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Inscription</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text text-center col-md-6">S'incrire !</h2>
        <?php if(isset($error)){ echo '<font color=red>'.$error; } ?>
        <form action="" method="post">
            <div class="form-group col-md-6 py-2">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" name="pseudo" class="form-control" id="pseudo"
                    value="<?php if (isset($_POST['pseudo'])) { echo $_POST['pseudo'];}?>">
            </div>
            <div class="form-group col-md-6 mt-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email"
                    value="<?php if (isset($_POST['email'])) { echo $_POST['email'];}?>">
            </div>
            <div class="form-group col-md-6 mt-2">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="tel" name="phone" class="form-control" id="phone"
                    value="<?php if (isset($_POST['phone'])) { echo $_POST['phone'];}?>">
            </div>
            <div class="form-group col-md-6 mt-2">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="form-group col-md-6 py-3">
                <label for="confirm_password" class="form-label">Confirmez mot de passe</label>
                <input type="password" name="confirm_password" class="form-control" id="confirm_password">
            </div>
            <button class="mb-2 btn btn-primary" type="submit" name="btnSubmit">Soumettre</button>
            <p>Déjà un compte ? <a class="text text-primary" href="index.php">Se connecter...</a></p>
        </form>
    </div>
</body>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>

</html>