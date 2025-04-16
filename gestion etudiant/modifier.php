<?php
require 'bd.php';

// Vérifie si le matricule est passé en paramètre
if (isset($_GET['matricule'])) {
    $matricule = $_GET['matricule'];

    // Récupérer les informations de l'étudiant
    $sql = "SELECT * FROM etudiant WHERE matricule = :matricule";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['matricule' => $matricule]);
    $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifie si l'étudiant existe
    if (!$etudiant) {
        die("Étudiant non trouvé.");
    }
} else {
    die("Matricule non spécifié.");
}

// Mise à jour des informations lorsque le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $tel_etudiant = $_POST['tel_etudiant'];
    $tel_parent = $_POST['tel_parent'];

    $sql = "UPDATE etudiant SET nom = :nom, prenom = :prenom, date_naissance = :date_naissance, 
            tel_etudiant = :tel_etudiant, tel_parent = :tel_parent WHERE matricule = :matricule";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'date_naissance' => $date_naissance,
        'tel_etudiant' => $tel_etudiant,
        'tel_parent' => $tel_parent,
        'matricule' => $matricule
    ]);

    // Redirection vers la liste des étudiants
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Étudiant</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            background: rgb(249, 247, 247);
        }
        form {
            width: 380px;
            padding: 35px;
            background: white;
            border-radius: 35px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <form action="" method="post">
        <h1>Modifier un Étudiant</h1>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($etudiant['nom']); ?>" required><br><br>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($etudiant['prenom']); ?>" required><br><br>

        <label for="date_naissance">Date de Naissance:</label>
        <input type="date" id="date_naissance" name="date_naissance" value="<?php echo htmlspecialchars($etudiant['date_naissance']); ?>" required><br><br>

        <label for="tel_etudiant">Téléphone Étudiant:</label>
        <input type="tel" id="tel_etudiant" name="tel_etudiant" value="<?php echo htmlspecialchars($etudiant['tel_etudiant']); ?>" required><br><br>

        <label for="tel_parent">Téléphone Parent:</label>
        <input type="tel" id="tel_parent" name="tel_parent" value="<?php echo htmlspecialchars($etudiant['tel_parent']); ?>" required><br><br>

        <input type="submit" value="Modifier">
    </form>
</body>

</html>