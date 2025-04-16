<?php
require_once('db.php');

if (isset($_POST["btnSubmit"])) {
    if (!empty($_POST["pseudo"]) AND !empty($_POST["email"]) AND !empty($_POST["phone"]) AND
        !empty($_POST["password"]) AND !empty($_POST["confirm_password"])) {
        
        // Récupération des champs du formulaire
        $pseudo = trim(htmlspecialchars($_POST["pseudo"]));
        $email = trim(htmlspecialchars($_POST["email"]));
        $phone = trim(htmlspecialchars($_POST["phone"]));
        $password = trim(htmlspecialchars($_POST["password"]));
        $confirm_password = trim(htmlspecialchars($_POST["confirm_password"]));
        
        // Validation des champs
        if (strlen($pseudo) <= 100) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (strlen($email) <= 255) {
                    if (strlen($phone) <= 15) {
                        if (strlen($password) >= 8 AND strlen($password) <= 255) {
                            if ($password === $confirm_password) {
                                $password_crypted = sha1($password); //chiffrement du mot de passe
                                
                                $req = $pdo->prepare("INSERT INTO utilisateurs SET pseudo=?, email=?, phone=?, 
                                    password=?");
                                $req->execute(array($pseudo, $email, $phone, $password_crypted));
                                
                                // Redirection vers la page de connexion.
                                header("Location:index.php");
                            }else {
                                $error = "Les mots de passe ne correspondent pas !";
                            }
                        } else {
                            $error = "veuillez entrer un mot de passe compris entre 8 et 255 caractères.";
                        }
                        
                    } else {
                        $error = "Entrez un numéro de téléphone de taille inférieur à 15 caractères!";
                    }
                    
                } else {
                    $error = "Entrez un Email de taille inférieur à 255 caractères!";
                }
            } else {
                $error = "Entrez un format correct de l'email.";
            }
        } else {
            $error = "Entrez un pseudo de taille inférieur à 100 caractères!";
        }
        
    } else {
        $error = "Veuillez remplir tous les champs !";
    }
}

?>