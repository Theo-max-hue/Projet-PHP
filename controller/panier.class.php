<?php
class panier{

    private $numeroPanier;
    private $listProduit;
    private $total;

    public function __construct(String $numeroPanier, String $listProduit, int $total)
    {
      
        $this->numeroPanier = $numeroPanier;
        $this->listProduit= $listProduit;
        $this->total= $total;


    }

    public function setTotal($total)
    {
        $this->total = $total;
    }
    public function getTotal()
    {
        return $this->total;
    }

    public function setListProduit($listProduit)
    {
        $this->listProduit = $listProduit;
    }
    public function getListProduit()
    {
        return $this->listProduit;
    }

    public function setNumeroPanier($id)
    {
        $this->numeroPanier = $id;
    }
    public function getNumeroPanier()
    {
        return $this->numeroPanier;
    }
    
}

class PanierManager
{
    private $db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function createPanier($numeroPanier, $listProduit, $total){
        $create = $this->db->prepare("insert into Panier(numero_panier,liste_produit,total) values(?,?,?)");
        $create->execute(array($numeroPanier, $listProduit, $total));
    }

    public function getPanierById($id)
    {
        $getOne = $this->db->prepare("select * from Panier where numero_panier=? limit 1"); //savoir a quoi sert le limit1
        $panier = $getOne->execute(array($id));
        if ($panier = $getOne->fetch(PDO::FETCH_ASSOC)) {
            $numeroPanier = $panier['numero_panier'];
            $listProduit = $panier['liste_produit'];
            $total = $panier['total'];
           
            return new Panier($numeroPanier , $listProduit ,$total);
        }
    }

    public function ajoutItemDansPanier($listProduit, $id)
    {
        $update = $this->db->prepare("update Panier set liste_produit=? where numero_panier=?");
        $update->execute(array($listProduit, $id));
    }

    public function updatePanier($prix, $listProduit, $id) // update a chaque ajout d'article dans la bdd, puis au chargement de la page panier ajouter ajax qui getById un json qu'on affiche
    {
        $update = $this->db->prepare("update Panier set total=?, liste_produit=? where numero_commande=?");
        $update->execute(array($prix, $listProduit, $id));
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