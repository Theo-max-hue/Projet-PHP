<?php

include "item.class.php";
include "panier.class.php";
include "connexion.php";

if (isset($_POST['item_src']) && isset($_POST['id_panier'])) {
    echo $_POST['id_panier'];
    selectItem($_POST['item_src'], $pdo);
    }
    
//ajouter variable session dans acceuil pour recup id
//faire une function pour recup le tableau d'items dans bdd
// l'incrémenter avec le nouvel item



function selectItem($src, $pdo)
{
    $itemManager = new ItemManager($pdo);
    $item = $itemManager->getItemBySrc($src);
    $nouvelItem = $item->getSrc();
    ajoutItemDansBdd($nouvelItem, $pdo);
}

function ajoutItemDansBdd($item, $pdo)
{
    echo "item qu'on envoie";
    print_r($item);
    $panierManager = new PanierManager($pdo);
    $panier = $panierManager->getPanierById($_POST['id_panier']);
    
    $tableauBdd = $panier->getListProduit();
    echo "tableau liste de produits";
    var_dump($tableauBdd);

    if ($tableauBdd !== "")
    {
        $tableauBdd = $tableauBdd . ',' . $item;
        $panierManager->ajoutItemDansPanier($tableauBdd, $_POST['id_panier']);
        echo "envoi avec qque chose dans la bdd fait </br>";
        echo $tableauBdd;
    }else   
        {
        // array_push($tab, $panier->getListProduit());
        echo "tableau qu'on a avec rien dans la bdd";
        print_r($item);

        
        $panierManager->ajoutItemDansPanier($item, $_POST['id_panier']);
        // echo "ajout réussi";
        }
}


// item qu'on va ajouter dans la bdd du panier dans la liste d'items 
//puis on va récup la liste sur la page panier