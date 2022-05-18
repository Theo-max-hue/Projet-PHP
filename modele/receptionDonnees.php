<?php

include "../controller/item.class.php";
include "../controller/panier.class.php";
include "connexion.php";

if (isset($_POST['item_src']) && isset($_POST['id_panier'])) {
    echo $_POST['id_panier'];
    selectItem($_POST['item_src'], $pdo);
    }


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
        echo "tableau qu'on a avec rien dans la bdd";
        print_r($item);

        
        $panierManager->ajoutItemDansPanier($item, $_POST['id_panier']);
        }
}
