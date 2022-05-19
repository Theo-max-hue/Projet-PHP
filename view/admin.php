<?php
session_start();
require('../controller/user.class.php');
require('../modele/connexion.php');


if ($_SESSION["connecter"] != "yes") {
    header("location:authentification.php");
    exit();
} else
    $bienvenue = "Bienvenue administrateur";
if (isset($_GET['id'])) {
    $manager = new UserManager($pdo);
    $manager->deleteUser($_GET['id']);
}

function afficherUser($tab)
{
    foreach ($tab as $user) { ?>

        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Prenom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $user->getId() ?></th>
                    <td><?php echo $user->getNom() ?></td>
                    <td><?php echo $user->getPrenom() ?></td>
                    <td><?php echo $user->getPseudo() ?></td>
                    <td><?php echo $user->getEmail() ?></td>
                </tr>
            </tbody>

            <form method="POST" action="admin.php?id=<?= $user->getId(); ?>">
                <button onclick="info()" type="submit" class="btn btn-danger">Supprimer</button>
            </form>
    <?php

    }
}
    ?>
        <?php
        require("header.php");
        $manager = new UserManager($pdo);
        afficherUser($manager->getUsersList());
        ?>
        <script>
            function info() {
                alert("L'utilisateur a bien été supprimé !");
            }
        </script>

    </body>

    </html>