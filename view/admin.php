<?php
session_start();
require('../controller/user.class.php');
require('../modele/connexion.php');


if ($_SESSION["connecter"] != "yes") {
    header("location:authentification.php");
    exit();
} else
    $bienvenue = "Bienvenue administrateur"; //déclaration variable bienvenue utilisée dans header.php
if (isset($_GET['id'])) {
    $manager = new UserManager($pdo);
    $manager->deleteUser($_GET['id']);
}

/* ------------------------------ Affiche tous les users de la bdd grace au tableau récupéré dans la bdd--------------------------------*/ 

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
            
<!-- Formulaire pour post l'id de l'utilisateur qui doit être supprimé -->

            <form method="POST" action="admin.php?id=<?= $user->getId(); ?>">
                <button onclick="info()" type="submit" class="btn btn-danger">Supprimer</button>
            </form>
    <?php

    }
}
    ?>
        <?php
        require("header.php"); // appel de header.php
        $manager = new UserManager($pdo); //Création d'une instance de user manager
        afficherUser($manager->getUsersList()); //Appel de la fonction afficher avec les users récupérés dans la bdd
        ?>
        <script>
            function info() {
                alert("L'utilisateur a bien été supprimé !");
            }
        </script>

    </body>

    </html>