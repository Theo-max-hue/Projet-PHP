<?php
class Item
{
    private $src;
    private $prix;
    private $nom;

    public function __construct(String $src, int $prix, String $nom)
    {
        $this->src = $src;
        $this->prix = $prix;
        $this->nom = $nom;
    }

    public function setSrc($src)
    {
        $this->src = $src;
    }
    public function getSrc()
    {
        return $this->src;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }
    public function getPrix()
    {
        return $this->prix;
    }

    public function setNom($nom)
    {
        $this->prix = $nom;
    }
    public function getNom()
    {
        return $this->nom;
    }
}

class ItemManager
{
    private $db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function getItemBySrc($src)
    {
        $getOne = $this->db->prepare("select * from Item where src=? limit 1"); //savoir a quoi sert le limit1
        $item = $getOne->execute(array($src));
        if ($item = $getOne->fetch(PDO::FETCH_ASSOC)) {
            $src = $item['src'];
            $prix = $item['prix'];
            $nom = $item['nom'];

            return new Item($src, $prix, $nom);
        }
    }

    public function updatePanier($prix, $listProduit, $id) // update a chaque ajout d'article dans la bdd, puis au chargement de la page panier ajouter ajax qui getById un json qu'on affiche
    {
        $update = $this->db->prepare("update Panier set total=?, liste_produit=? where numero_commande=?");
        $update->execute(array($prix, implode(",", $listProduit), $id));
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
