<?php

class User
{
    private $id;
    private $nom;
    private $prenom;
    private $pseudo;
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

    public function User(int $id, String $nom, String $prenom, String $pseudo, String $pass)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->pseudo = $pseudo;
        $this->pass = $pass;
    }
}

//base pour la modif
$update = "update User set truc = ? where numero_utilisateur = ?";

//base suppression
$delete = "delete from User where numero_utilisateur = id values(?)"; //voir pour le faire avec requete préparée

/**
 *    Fournit des méthodes permettant de "traiter" des (objets) pizzas.
 */
class UserTab
{
    public static $users_tab = array();

    /**
     *    Ajoute un objet pizza au tableau de pizzas 
     */
    public static function ajouterUser(User $myUser)
    {
        // On ajoute la pizza que si elle n'existe pas déjà (par exemple)
        // A contrario on pourrait choisir de remplacer toute entrée existante
        if (!isset(self::$users_tab[$myUser->id])) {
            self::$users_tab[$myUser->id] = $myUser;
        }
    }

    /**
     *    Crée un nouvel objet pizza et l'ajoute au tableau
     *    Typiquement, cette fonction permettrait de charger les objets pizzas,
     *    suite à la récupération des infos en base de données.
     */
    public static function chargerUser($id, $nom, $prenom, $pseudo, $pass)
    {
        $user = new User($id, $nom, $prenom, $pseudo, $pass);
        self::ajouterUser($user);
    }

    /**
     *    Affiche une liste des pizzas actuellement chargées dans le tableau
     */
    public static function users_list()
    {
        foreach (self::$users_tab as $id => $userObject) {
            echo $userObject->id . " : " . $userObject->nom . PHP_EOL;
        }
    }
}
function getUser()
{
    $tab = array();
    include("connexion.php");
    $get = $pdo->query("select * from User");
    // $user = $get->fetchAll(PDO::FETCH_ASSOC); //va récup tout dans tableau assoc avec clés valeurs
    // $n = 0;
    // $user[$n]['numero_utilisateur'], $user[$n]['nom'], $user[$n]['prenom'], $user[$n]['pseudo'], $user[$n]['password']

    while ($donnees = $get->fetch(PDO::FETCH_ASSOC)) {
        $id = $donnees['numero_utilisateur'];
        $nom = $donnees['nom'];
        $prenom = $donnees['prenom'];
        $pseudo = $donnees['pseudo'];
        $pass = $donnees['password'];
        echo ($id . $nom . $prenom . $pseudo . $pass);
        $tab[] = new User($id, $nom, $prenom, $pseudo, $pass);
        var_dump($tab);
    }


    return $tab;

    // echo "<pre>"; //pour bel affichage quand dans tableau
    // var_dump($tab);
    // echo "</pre>";
}

session_start();
if ($_SESSION["connecter"] != "yes") {
    header("location:authentification.php");
    exit();
} else
    $bienvenue = "Bienvenue administrateur";


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <style>
        * {
            font-family: arial;
        }

        body {
            margin: 20px;
        }

        h2 {
            text-align: center;
            color: pink;
        }

        a {
            color: blue;
            text-decoration: none;
            float: right;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h2><?php echo  $bienvenue  ?></h2>
    <a href="deconnexion.php">Se déconnecter</a>
    <?php
    afficherUser(getUser());
    ?>

</body>

</html>