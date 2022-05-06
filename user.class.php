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
    
    public function getById($id)
    {
        $getOne = $this->db->prepare("select * from User where numero_utilisateur=? limit 1"); //savoir a quoi sert le limit1
        $user = $getOne->execute(array($id));
        if ($user = $getOne->fetch(PDO::FETCH_ASSOC)){
            $id = $user['numero_utilisateur'];
            $nom = $user['nom'];
            $prenom = $user['prenom'];
            $pseudo = $user['pseudo'];
            $pass = $user['password'];

            return new User($id, $nom, $prenom, $pseudo, $pass);
        }
    }

    public function Authentification($pseudo, $pass_crypt)
    {
        $verify = $this->db->prepare("select * from User where pseudo=? and password=? limit 1");
        $verify->execute(array($pseudo, $pass_crypt));
        if ($user = $verify->fetch(PDO::FETCH_ASSOC)){
            $id = $user['numero_utilisateur'];
            $nom = $user['nom'];
            $prenom = $user['prenom'];
            $pseudo = $user['pseudo'];
            $pass = $user['password'];

            return new User($id, $nom, $prenom, $pseudo, $pass);
        }
    }

    public function updateUser($nom, $prenom, $pseudo, $password, $id)
    {
        $update = $this->db->prepare("update User set nom=?, prenom=?, pseudo=?, password=? where numero_utilisateur=?");
        $update->execute(array($nom, $prenom, $pseudo, md5($password), $id));
    }

    public function deleteUser(User $user){
        $delete = $this->db->prepare("delete from User where id =?");
        $delete->execute(array($user->getId()));
    }


    public function setDb(PDO $db)
    {
        $this->db = $db;
    }
}


