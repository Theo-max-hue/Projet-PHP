<?php
class produit{
    private $nom;
    private $prix;
    private $id;

    public function __construct(String $nom, int $prix, String $id)
    {
      
        $this->nom = $nom;
        $this->prix = $prix;
        $this->id = $id;
    }
    

}
?>