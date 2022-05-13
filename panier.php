<?php
class panier{
    private $id;
    private $listProduit;
    private $total;

    

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
            $id = $panier['numero_utilisateur'];
           
            return new Panier($id,$total);
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