<?php
session_start();
include "user.class.php";
include "connexion.php";


if ($_SESSION["connecter"] != "yes") {
    header("location:authentification.php");
    exit();
} else
    $bienvenue = "Bienvenue administrateur";
    if(isset($_GET['id'])){
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
      <th scope="col">PASSWORD</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $user->getId()?></th>
      <td><?php echo $user->getNom()?></td>
      <td><?php echo $user->getPrenom()?></td>
      <td><?php echo $user->getPseudo()?></td>
      <td><?php echo $user->getPass()?></td>
    </tr></tbody>

    <form method="POST" action="admin.php?id=<?= $user->getId();?>">
    <button onclick="verif(this.value)" value="<? $user->getPseudo();?>" type="submit" class="btn btn-danger">Supprimer</button>
    </form>
    <?php
    
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">


    <title>Admin</title>
</head>
<body>

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

    
        <h2><?php echo  $bienvenue  ?></h2>
        <a href="deconnexion.php">Se déconnecter</a>
        <?php
        $manager = new UserManager($pdo);
        afficherUser($manager->getUsersList());
        ?>

    <script>
        function verif(pseudo){
            if (confirm("Voulez-vous vraiment supprimer l'utilisateur : "+ pseudo + "?")){
                // $_POST['verif']= "true";
            }
        }
    </script>

    </body>

    </html>