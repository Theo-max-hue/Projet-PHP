<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">


    <title>Admin</title>
</head>
<body>
    <script>
        function del(id){
            if(confirm("Voulez-vous supprimer l'utilisateur avec l'id : "+ id + "?")){
            //     fetch("mysql:host=devbdd.iutmetz.univ-lorraine.fr;dbname=gamard3u_bdd_php", "gamard3u_appli", "32021323", {
            //     method: 'DELETE',
            // })
            //     .then(function () {
            //         affichage();
            //         display('Add');
            //     })
            //     .catch(err => console.log(err));
            // document.getElementById('saisie').value = '';  //trouver pour utiliser la classe usermanager avec requete ajax
            }
        }
    </script>
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
    <button type="button" onclick="del(this.value)" value="<?=$user->getId();?>" class="btn btn-danger">Supprimer <?php echo $user->getPrenom()?></button>
    
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