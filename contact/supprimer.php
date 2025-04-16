<?php
session_start();
if (isset($_GET['index'])) {
    unset($_SESSION['contact'][$_GET['index']]); //supprimer un contact
    //$_SESSION['contact'] = array_values($_SESSION['contact']); // Réindexer le tableau
}
header('Location: liste_contact.php');
exit();
