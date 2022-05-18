

<?php

session_start();
include "../controller/user.class.php";
include('../controller/panier.class.php');
include("../modele/connexion.php");
if ($_SESSION["connecter"] != "yes") {
    header("location:authentification.php");
    exit();
}else{

$manager = new UserManager($pdo);
$user = $manager->getUserById($_SESSION['id_user']);
$bienvenue = "Votre panier ". $user->getPseudo();
require("header.php");
$panierManager = new PanierManager($pdo);
$panier = $panierManager->getPanierById($user->getId());
$tab = $panier->getListProduit();
$liste = explode(",",$tab);
afficherPanier($panier, $liste);
}


function afficherPanier($panier, $liste)
{
    ?>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>id</th>
                    <th>ListeItems</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $panier->getNumeroPanier();?></th>
                    <td><?php var_dump($liste)?></td>
                    <td><?php echo $panier->getTotal() ?></td>
                </tr>
            </tbody>

    <?php

    }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>


</body>