<?php

session_start();
include "user.class.php";
include('panier.class.php');
include("connexion.php");
require("header.php");
if ($_SESSION["connecter"] != "yes") {
    header("location:authentification.php");
    exit();
}
$manager = new UserManager($pdo);
$user = $manager->getById($_SESSION['id_user']);
if (date("H") < 18)  //PAGE QUI S'AFFICHE EN SE CONNECTANT
    $bienvenue = "Bonjour "  . $user->getPseudo();
else
    $bienvenue = "Bonsoir "  . $user->getPseudo();
?>
