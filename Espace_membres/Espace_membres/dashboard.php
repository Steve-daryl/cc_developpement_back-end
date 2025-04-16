<?php
    session_start();
    require_once("db.php");
                        
    $req = $pdo->query("SELECT * FROM utilisateurs ORDER BY id_utilisateur DESC LIMIT 0,9");
    $i=1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <!-- début Contenu Principal -->
    <main>
        <div class="container">
            <h2 class="text-start my-3">Liste des utilisateurs
                <a href="inscription.php" class="btn btn-outline-success">Ajouter</a>
            </h2>
            <div id="error"></div>
            <table class="table">
                <thead class="table-dark">
                    <th>#</th>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php while ($user = $req->fetch()) :?>
                    <tr>
                        <td><?=$i++?></td>
                        <td><?=$user->pseudo?></td>
                        <td><?=$user->email?></td>
                        <td><?=$user->phone?></td>
                        <td>
                            <a class="btn btn-outline-primary" href="edit.php?id=<?= $user->id_utilisateur?>">Editer</a>
                            <a class="btn btn-outline-danger" onclick="alert('Voulez-vous vraiment supprimer ?')"
                                href="delete.php?id=<?= $user->id_utilisateur?>">Supprimer
                            </a>
                        </td>
                    </tr>
                    <?php endwhile ?>
                </tbody>
                <tfoot class="table-dark">
                    <th>#</th>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tfoot>
            </table>
        </div>
    </main>
    <!-- Fin Contenu Principal -->
</body>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

</html>