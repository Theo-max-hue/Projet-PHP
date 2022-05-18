<?php

session_start();
include("../modele/infos.php");
include('../controller/user.class.php');
include("../controller/panier.class.php");
include("../modele/connexion.php");
@$valider = $_POST["valider"];
$erreur = "";
if (isset($valider)) {
    
    $manager = new UserManager($pdo);
    $user = $manager->Authentification($pseudo, $pass_crypt);// si pseudo/mdp valides, crée objet user
    if ($pseudo == "admin" && $pass_crypt == md5("admin")) { // changer avec ajout de droits dans la bdd
        $_SESSION["connecter"] = "yes";
        header("location:admin.php");
    } elseif ($user !== NULL) { //vérif si la variable $user est vide
        $_SESSION["id_user"] = $user->getId();
        $_SESSION["connecter"] = "yes";
        $panierManager = new PanierManager($pdo);
        if (!$panierManager->getPanierById($user->getId())){ // Crée un panier avec la même id que l'utilisateur si pas deja un
            $listeProduit = "";
            $panierManager->createPanier($user->getId(), $listeProduit, 0);
        }
        header("location:acceuil.php");
    } else
        $erreur = "Mauvais login ou mot de passe!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/styleAuthentification.css">


    <title>authentification</title>
</head>
    <meta charset="utf-8" />
   
</head>

<body onLoad="document.form.pseudo.focus()">
    <h1>Authentification</h1>
    <div class="erreur"><?php echo  $erreur  ?></div>
    <form name="form" method="post" action="">
        <input type="text" name="pseudo" placeholder="Votre Pseudo" /><br />
        <input type="password" name="password" placeholder="Mot de passe" /><br />
        <input type="submit" name="valider" value="S'authentifier" />
        <a href="inscription.php">Créer votre Compte</a>
    </form>
</body>

</html>