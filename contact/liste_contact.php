<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de Contacts</title>
</head>

<body>
    <h2><u>Liste de contacts</u></h2>
    <?php if (isset($_SESSION["contact"]) && !empty($_SESSION["contact"])): ?>
        <ul>
            <?php foreach ($_SESSION["contact"] as $index => $contact) : ?>
                <li>
                    <?php echo htmlspecialchars($contact["nom"]) . " " . htmlspecialchars($contact["prenom"]) . " (" . htmlspecialchars($contact["telephone"]) . ")"; ?>
                    <a href="supprimer.php?index=<?php echo $index; ?>">Supprimer</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun contact à afficher.</p>
    <?php endif; ?>
    <a href="aj_contact.php">Ajouter un contact</a>
</body>

</html>