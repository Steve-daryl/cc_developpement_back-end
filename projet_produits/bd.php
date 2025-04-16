<?php
// bd.php
try {
    $con = new PDO("mysql:host=localhost;dbname=produits;charset=utf8", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Échec de la connexion : " . $e->getMessage());
}
?>