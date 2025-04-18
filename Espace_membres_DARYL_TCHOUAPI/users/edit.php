<?php
require '../db/db.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $photo = $_FILES['toff']['name'];
    $file_tmp = $_FILES['toff']['tmp_name'];
    $file_destination = '../assets/images/' . $photo;

    // Vérifiez si l'email existe déjà (en excluant l'utilisateur actuel)
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ? AND id != ?");
    $stmt->execute([$email, $id]);
    $email_exists = $stmt->fetchColumn();

    if ($email_exists) {
        echo '<script>alert("Cet email est déjà utilisé.")</script>';
    } else {
        // Préparez la requête de mise à jour
        if (!empty($password)) {
            $stmt = $pdo->prepare("UPDATE users SET nom = ?, prenom = ?, telephone = ?, password = ?, email = ?, photo = ? WHERE id = ?");
            $stmt->execute([$nom, $prenom, $telephone, $password, $email, $photo, $id]);
        } else {
            $stmt = $pdo->prepare("UPDATE users SET nom = ?, prenom = ?, telephone = ?, email = ? WHERE id = ?");
            $stmt->execute([$nom, $prenom, $telephone, $email, $id]);
        }

        // Déplacez le fichier téléchargé si une nouvelle image a été fournie
        if (!empty($photo)) {
            move_uploaded_file($file_tmp, $file_destination);
        }

        echo '<script>alert("Utilisateur mis à jour avec succès.")</script>';
        header("Location: index.php");
        exit;
    }
}

// Récupérer les informations de l'utilisateur pour le formulaire
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier l'utilisateur</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="text-start my-3">Modifier l'utilisateur</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nom" class="form-label">Noms</label>
            <input type="text"class="form-control" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenoms</label>
            <input type="text" class="form-control" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Telephones</label>
            <input type="text"class="form-control" name="telephone" value="<?= htmlspecialchars($user['telephone']) ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Emails</label>
            <input type="email"class="form-control" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control"name="password" placeholder="Nouveau mot de passe">
        </div>
        <div class="mb-3">
        <label for="toff" class="form-label">Avatars</label>
            <input type="file"class="form-control" name="toff"><!-- Champ pour télécharger une nouvelle image -->
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
</body>
</html>