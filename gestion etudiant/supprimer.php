<?php
session_start(); // Assurez-vous de démarrer la session

require 'bd.php';

if (isset($_GET['matricule'])) {
    $matricule = $_GET['matricule'];

    // Préparer la requête pour supprimer l'étudiant
    $sql = "DELETE FROM etudiant WHERE matricule = :matricule";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['matricule' => $matricule]);

    // Redirection vers la liste des étudiants
    header('Location: index.php');
    exit();
}
