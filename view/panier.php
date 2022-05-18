
<?php

session_start();
include "../controller/user.class.php";
include "../controller/item.class.php";
include('../controller/panier.class.php');
include("../modele/connexion.php");

if ($_SESSION["connecter"] != "yes") {
    header("location:authentification.php");
    exit();
}else{

/* -------------------------------- Création instance userManager et user -------------------------------- */

$manager = new UserManager($pdo);
$user = $manager->getUserById($_SESSION['id_user']);
$bienvenue = "Votre panier ". $user->getPseudo();
require("header.php");

/* -------------------------------- Création instance panierManager et panier -------------------------------- */

$panierManager = new PanierManager($pdo);
$panier = $panierManager->getPanierById($user->getId());
$tab = $panier->getListProduit();
$liste = explode(",",$tab);

/* -------------------------------- Création instance itemManager et item -------------------------------- */

$itemManager = new ItemManager($pdo);
foreach($liste as $item){
    $tabItems[] = $itemManager->getItemBySrc($item);
}

afficherPanier($panier, $tabItems);
}

function calculTotal($tabItems){
    $total = 0;
    foreach ($tabItems as $item){
        $total += $item->getPrix();
    }return $total;
}

function affficherTableauItem($tabItems){
    foreach ($tabItems as $item){ ?>
        <p><?php echo $item->getNom();?></p> 
        <p><?php echo $item->getPrix() . " $";?></p>
        <img height="200px" class="align-baseline" src="<?php echo $item->getSrc();?>"><?php 
    }
}

function afficherPanier($panier, $tabItems)
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
                    <td><?php affficherTableauItem($tabItems)?></td>
                    <td><?php echo calculTotal($tabItems) . " $"?></td>
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
