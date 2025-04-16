<?php
session_start(); // Démarrer une session
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $telephone = $_POST["telephone"];
    // Ajouter le contact dans la session
    $_SESSION["contact"][] = [
        "nom" => $nom,
        "prenom" => $prenom,
        "telephone" => $telephone
    ];
    header('Location: liste_contact.php'); // Rediriger vers la liste des contacts
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Contact</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: rgb(249, 247, 247);
        }

        .box {
            width: 380px;
            padding: 35px;
            background: white;
            border-radius: 35px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-shadow: 2px 1px #b1b1b1;
        }
    </style>
</head>

<body>
    <form method="post">
        <div class="box">
            <h2><u>Ajouter un Contact</u></h2>
            <label for="nom">Nom: </label>
            <input type="text" name="nom" id="nom" required><br><br>
            <label for="prenom">Prénom: </label>
            <input type="text" name="prenom" id="prenom" required><br><br>
            <label for="telephone">Téléphone: </label>
            <input type="tel" name="telephone" id="telephone" required><br><br>
            <input type="submit" value="Ajouter">
        </div>
    </form>
</body>

</html>