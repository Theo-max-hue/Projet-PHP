<?php
class User
{
    public $id;
    public $nom;
    public $prenom;
    public $pseudo;
    public $pass;
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function getNom()
    {
        return $this->nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
    }
    public function getPass()
    {
        return $this->pass;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }
    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function __construct(int $id, String $nom, String $prenom, String $pseudo, String $pass)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->pseudo = $pseudo;
        $this->pass = $pass;
    }
}

class UserManager
{
    private $db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function getUsersList()
    {
        $tab = array();
        $getAll = $this->db->query("select * from User");

        while ($donnees = $getAll->fetch(PDO::FETCH_ASSOC)) {
            $id = $donnees['numero_utilisateur'];
            $nom = $donnees['nom'];
            $prenom = $donnees['prenom'];
            $pseudo = $donnees['pseudo'];
            $pass = $donnees['password'];
            $tab[] = new User($id, $nom, $prenom, $pseudo, $pass);
        }
        return $tab;
    }

    public function setDb(PDO $db)
    {
        $this->db = $db;
    }
}
