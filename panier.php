<?php
class panier{
    private $id;
    private $listProduit;
    private $total;

<<<<<<< HEAD
    

    public function __construct(String $id, array $listProduit, int $total)
    {
      
        $this->id = $id;
        $this->produit= $listProduit;
        $this->total= $total;


    }
    function ajoutPanier($id,$listProduit,Produit $produit){

    }
    function supprimerAuPanier($id,$listProduit,Produit $produit){

    }
    function modifierPanier($id,$listProduit,Produit $produit){

    }
    public function setTotal($total)
    {
        $this->total = $total;
    }
    public function setListProduit($listProduit)
    {
        $this->listProduit = $listProduit;
    }


    public function getlistProduit()
    {
        return $this->listProduit;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getTotal()
    {
        return $this->total;
    }

}

class PanierManager
{
    private $db;

    public function __construct($db)
    {
        $this->setDb($db);
    }


    public function getById($id)
    {
        $getOne = $this->db->prepare("select * from Panier where numero_commande=? limit 1"); //savoir a quoi sert le limit1
        $panier = $getOne->execute(array($id));
        if ($panier = $getOne->fetch(PDO::FETCH_ASSOC)) {
            $id = $panier['numero_commande'];
           
            return new Panier($id , $listProduit ,$total);
        }
    }

    public function updatePanier($id)
    {
        $update = $this->db->prepare("update Panier set total=?, where numero_commander=?");
        $update->execute(array($id));
    }

    public function deletePanier($id)
    {
        $del = $this->db->prepare("delete from Panier where numero_commande=?");
        $del->execute(array($id));
    }

    public function setDb(PDO $db)
    {
        $this->db = $db;
    }
}
?>
=======
session_start();
include "user.class.php";
include('panier.class.php');
include("connexion.php");
if ($_SESSION["connecter"] != "yes") {
    header("location:authentification.php");
    exit();
}else{

if(isset($GET['btnValue'])){
    $teub = array();
    $teub[] = $GET['btnValue'];
}
    
$manager = new UserManager($pdo);
$user = $manager->getById($_SESSION['id_user']);
$bienvenue = "Votre panier ". $user->getPseudo();
require("header.php");
$panierManager = new PanierManager($pdo);
$panier = $panierManager->getById($user->getId());
afficherPanier($panier, $teub);
}


function afficherPanier($panier, $teub)
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
                    <th scope="row"><?php echo $panier->getNumeroPanier() ?></th>
                    <td id="divAffichageResultat" ><?php var_dump($teub)?></td>
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
>>>>>>> 3a8c60b89020ea36ee80409eb75541e46fd2a686
