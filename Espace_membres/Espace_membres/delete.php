<?php
require_once("db.php");

// Récupérer l'id de l'utilisateur
if (isset($_GET["id"])) {
    # Stocker l'id passé en paramètre dans la variable id.
    $id = $_GET["id"];
    // supprimer l'utilisateur dans la base de données.
    $req = $pdo->prepare("DELETE FROM utilisateurs WHERE id_utilisateur=$id");
    $req->execute();
    // Redirection vers la page des utilisateurs. 
    header("Location: dashboard.php");
}
?>