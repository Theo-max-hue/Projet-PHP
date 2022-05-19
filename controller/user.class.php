<?php
class User
{
    private $id;
    private $nom;
    private $prenom;
    private $pseudo;
    private $email;
    private $pass;

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

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function __construct(int $id, String $nom, String $prenom, String $pseudo, String $email, String $pass)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->pseudo = $pseudo;
        $this->email = $email;
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

    public function createUser($nom, $prenom, $pseudo, $email, $password){
        $create = $this->db->prepare("insert into User(nom,prenom,pseudo,email,password) values(?,?,?,?,?)");
        $create->execute(array($nom, $prenom, $pseudo, $email, md5($password)));
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
            $email = $donnees['email'];
            $pass = $donnees['password'];
            $tab[] = new User($id, $nom, $prenom, $pseudo, $email, $pass);
        }
        return $tab;
    }

    public function getUserById($id)
    {
        $getOne = $this->db->prepare("select * from User where numero_utilisateur=? limit 1"); //savoir a quoi sert le limit1
        $user = $getOne->execute(array($id));
        if ($user = $getOne->fetch(PDO::FETCH_ASSOC)) {
            $id = $user['numero_utilisateur'];
            $nom = $user['nom'];
            $prenom = $user['prenom'];
            $pseudo = $user['pseudo'];
            $email = $user['email'];
            $pass = $user['password'];

            return new User($id, $nom, $prenom, $pseudo, $email, $pass);
        }
    }

    public function Authentification($pseudo, $pass_crypt)
    {
        $verify = $this->db->prepare("select * from User where pseudo=? and password=? limit 1");
        $verify->execute(array($pseudo, $pass_crypt));
        if ($user = $verify->fetch(PDO::FETCH_ASSOC)) {
            $id = $user['numero_utilisateur'];
            $nom = $user['nom'];
            $prenom = $user['prenom'];
            $pseudo = $user['pseudo'];
            $email = $user['email'];
            $pass = $user['password'];

            return new User($id, $nom, $prenom, $pseudo, $email, $pass);
        }
    }

    public function updateUser($nom, $prenom, $pseudo, $email, $password, $id)
    {
        $update = $this->db->prepare("update User set nom=?, prenom=?, pseudo=?, email=?, password=? where numero_utilisateur=?");
        $update->execute(array($nom, $prenom, $pseudo, $email, md5($password), $id));
    }

    public function deleteUser($id)
    {
        $del = $this->db->prepare("delete from User where numero_utilisateur=?");
        $del->execute(array($id));
    }



    public function setDb(PDO $db)
    {
        $this->db = $db;
    }
}
