<?php

include "../controller/item.class.php";
include "../controller/panier.class.php";
include "connexion.php";


/* ------------------------------ Vérifie si les variables item_src et id_panier ont bien été post --------------------------------*/ 

if (isset($_POST['item_src']) && isset($_POST['id_panier'])) {
    selectItem($_POST['item_src'], $pdo);
    }

/* ------------------------------ Trouve le bon item a ajouter dans la bdd --------------------------------*/ 

function selectItem($src, $pdo)
{
    $itemManager = new ItemManager($pdo);
    $item = $itemManager->getItemBySrc($src);
    $nouvelItem = $item->getSrc();
    ajoutItemDansBdd($nouvelItem, $pdo);
}

/* ------------------------------ Ajoute item dans panier bdd --------------------------------*/ 

function ajoutItemDansBdd($item, $pdo)
{
    $panierManager = new PanierManager($pdo);
    $panier = $panierManager->getPanierById($_POST['id_panier']);
    
    $tableauBdd = $panier->getListProduit();

    /* ------------------------------ Vérifie si la liste d'items dans la bdd est vide--------------------------------*/ 

    if ($tableauBdd !== "")
    {
        $tableauBdd = $tableauBdd . ',' . $item;
        $panierManager->ajoutItemDansPanier($tableauBdd, $_POST['id_panier']);

        /* ------------------------------ Si liste d'items dans bdd est vide --------------------------------*/ 

    }else   
        {
        $panierManager->ajoutItemDansPanier($item, $_POST['id_panier']);
        }
}
