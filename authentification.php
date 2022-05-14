<?php

session_start();
include("infos.php");
include('user.class.php');
include("panier.class.php");
include("connexion.php");
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
        if (!$panierManager->getById($user->getId())){ // Crée un panier avec la même id que l'utilisateur si pas deja un
            $listeProduit = array();
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
    <link rel="stylesheet" href="styleAuthentification.css">


    <title>authentification</title>
</head>
    <meta charset="utf-8" />
    <style>
        * {
            font-family: arial;
        }

        body {
            margin: 20px;
        }

        form {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -150px;
            margin-top: -100px;
        }

        h1 {
            text-align: center;
            color: #FFFAFA;
            background: black;
        }

        input[type=submit] {
            border: solid 1px violet;
            margin-bottom: 10px;
            float: right;
            padding: 15px;
            outline: none;
            border-radius: 7px;
            width: 120px;
        }

        input[type=text],
        [type=password] {
            border: solid 1px violet;
            margin-bottom: 10px;
            padding: 16px;
            outline: none;
            border-radius: 7px;
            width: 300px;
        }

        .erreur {
            text-align: center;
            color: red;
            margin-top: 10px;
        }

        a {
            font-size: 14pt;
            color: yellow;
            text-decoration: none;
            font-weight: normal;
        }

        a:hover {
            text-decoration: underline;
            color: yellow;
        }
    </style>
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