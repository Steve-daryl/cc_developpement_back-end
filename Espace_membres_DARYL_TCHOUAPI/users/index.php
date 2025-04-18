<?php
session_start();
require '../db/db.php';
require_once '../includes/navbar.php';

$users = $pdo->query("SELECT * FROM users")->fetchAll();
$i = 1;
?>
<!DOCTYPE html>
<html>

<head>
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>

    <main class="container">

        <table class="table table-striped">
            <div class="row g-2">
                <div class="col-md-12">
                    <h2 class="my-3">Listes des utilisateurs</h1>
                        <a href="create.php" class="btn btn-success mb-3">Ajouter un utilisateur</a>
                </div>
            </div>
            <thead>
                <tr class="table table-bordered table-dark">
                    <td>#</td>
                    <td><b>Avatars</b></td>
                    <td><b>noms</b></td>
                    <td><b>prenoms</b></td>
                    <td><b>Email</b></td>
                    <td><b>Telephones</b></td>
                    <td><b>Roles</b></td>
                    <td><b>Actions</b></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr class="fs-5">
                        <td><?= $i++ ?></td>
                        <td><img src="<?= $user['photo'] ?>" alt="" width="70px" height="70px" id="toff"></td>
                        <td><?= $user["nom"] ?></td>
                        <td><?= $user["prenom"] ?></td>
                        <td><?= $user["email"] ?></td>
                        <td><?= $user["telephone"] ?></td>
                        <td><?= $user["role"] ?></td>
                        <td>
                            <?php

                            echo '<a href="edit.php?id=' . $user["id"] . '"><button type="submit" class="btn btn-primary">Editer</button></a>';
                            echo ' '; ?>
                            <?php
                            echo '<a href="delete.php?id=' . $user['id'] . '"><button type="submit" class="btn btn-danger">Supprimer</button></a>';
                            echo ' '; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </main>
    <?php
    require_once("../includes/footer.php");
    ?>
</body>
<script src="../assets/css/"></script>

</html>