<?php
require '../db/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
    

    // Vérifiez si l'email existe déjà
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $email_exists = $stmt->fetchColumn();

    if ($email_exists) {
        echo '<script>alert("Cet email est déjà utilisé.")</script>';
    } else {
        $allowed_extensions = array("png", "jpeg", "jpg");
        $file_name = $nom . '_' . $_FILES['toff']['name'];
        $file_tmp = $_FILES['toff']['tmp_name'];
        $file_destination = '../assets/images/' . $file_name;
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (in_array($file_extension, $allowed_extensions)) {
            if (move_uploaded_file($file_tmp, $file_destination)) {
                // Insérez l'utilisateur dans la base de données
                $stmt = $pdo->prepare("INSERT INTO users (nom, prenom, email, password, telephone, photo) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$nom, $prenom, $email, $password, $telephone, $file_destination]);
                echo '<script>alert("Utilisateur ajouté avec succès.")</script>';
                header("Location: index.php");
                exit;
            } else {
                echo '<script>alert("Erreur lors de l\'upload de l\'image.")</script>';
            }
        } else {
            echo '<script>alert("Extension de fichier non autorisée.")</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un utilisateur</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <h2>Ajouter un utilisateur</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="nom" placeholder="Nom" required>
        <input type="text" name="prenom" placeholder="Prénom" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="telephone" placeholder="Téléphone" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="file" class="form-control" name="toff" required><br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>