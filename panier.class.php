<?php
class panier{

    private $numeroPanier;
    private $listProduit;
    private $total;

    public function __construct(String $numeroPanier, array $listProduit, int $total)
    {
      
        $this->numeroPanier = $numeroPanier;
        $this->listProduit= $listProduit;
        $this->total= $total;


    }
    // function ajoutPanier($id,$listProduit,Produit $produit){

    // }
    // function supprimerAuPanier($id,$listProduit,Produit $produit){

    // }
    // function modifierPanier($id,$listProduit,Produit $produit){

    // }

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
    public function getlistProduit()
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
        $create->execute(array($numeroPanier, implode(",",$listProduit), $total)); // implode fait passer le tableau en string pour la bdd
    }

    public function getById($id)
    {
        $getOne = $this->db->prepare("select * from Panier where numero_panier=? limit 1"); //savoir a quoi sert le limit1
        $panier = $getOne->execute(array($id));
        if ($panier = $getOne->fetch(PDO::FETCH_ASSOC)) {
            $numeroPanier = $panier['numero_panier'];
            $listProduit = array($panier['liste_produit']);
            $total = $panier['total'];
           
            return new Panier($numeroPanier , $listProduit ,$total);
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