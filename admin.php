<?php

include "user.class.php";
include "connexion.php";

session_start();
if ($_SESSION["connecter"] != "yes") {
    header("location:authentification.php");
    exit();
} else
    $bienvenue = "Bienvenue administrateur";

function afficherUser($tab)
{
    foreach ($tab as $user) { ?>
        <tr>
            <td><?php echo $user->getId() . '<br/>'; ?></td>
            <td><?php echo $user->getNom() . '<br/>'; ?></td>
            <td><?php echo $user->getPrenom() . '<br/>'; ?></td>
            <td><?php echo $user->getPseudo() . '<br/>'; ?></td>
            <td><?php echo $user->getPass() . '<br/>'; ?></td>
        <tr><?php
        }
    }
            
            
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <style>
            * {
                font-family: arial;
            }

            body {
                margin: 20px;
            }

            h2 {
                text-align: center;
                color: pink;
            }

            a {
                color: blue;
                text-decoration: none;
                float: right;
            }

            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>

    <body>
        <h2><?php echo  $bienvenue  ?></h2>
        <a href="deconnexion.php">Se déconnecter</a>
        <?php
        $manager = new UserManager($pdo);
        afficherUser($manager->getUsersList());
        ?>

    </body>

    </html>