<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">


    <title>Admin</title>
</head>
<body>
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

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Prenom</th>
      <th scope="col">Nom</th>
      <th scope="col">Pseudo</th>
      <th scope="col">PASSWORD</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $user->getId() . '<br/>'; ?></th>
      <td><?php echo $user->getNom() . '<br/>'; ?></td>
      <td><?php echo $user->getPrenom() . '<br/>'; ?></td>
      <td><?php echo $user->getPseudo() . '<br/>'; ?></td>
      <td><?php echo $user->getPass() . '<br/>'; ?></td>
    </tr></tbody>
    <button type="button" class="btn btn-danger">Supprimer <?php echo $user->getPrenom() . '<br/>'; ?></button>
    
    <?php
    
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