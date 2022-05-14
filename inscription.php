<?php

session_start();
include("infos.php");
include("user.class.php");
include("connexion.php");
@$valider = $_POST["inscrire"];
$erreur = "";
if (isset($valider)) {
    if (empty($nom)) $erreur = "Le champs nom est obligatoire !";
    elseif (empty($prenom)) $erreur = "Le champs prénom est obligatoire !";
    elseif (empty($pseudo)) $erreur = "Le champs Pseudo est obligatoire !";
    elseif (empty($email)) $erreur = "Le champs Email est obligatoire !";
    elseif (empty($password)) $erreur = "Le champs mot de passe est obligatoire !";
    elseif ($password != $passwordConf) $erreur = "Mots de passe differents !";
    else {
        $verify_pseudo = $pdo->prepare("select numero_utilisateur from User where pseudo=? limit 1");
        $verify_pseudo->execute(array($pseudo));
        $user_pseudo = $verify_pseudo->fetchAll();
        if (count($user_pseudo) > 0)
            $erreur = "Ce pseudo existe déjà!";
        else {
            $manager = new UserManager($pdo);
            $manager->createUser($nom, $prenom, $pseudo, $email, $password);
            header("location:authentification.php");
        }
    }
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
<style>
    * {
        font-family: arial;
    }

    body {
        margin: 20px;
    }

    form {
        position: absolute;
        top: 40%;
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

        padding: 2%;
        border-radius: 10px;
    }

    a:hover {
        text-decoration: underline;
        color: yellow;
    }
</style>
</head>

<body onLoad="document.fo.nom.focus()">
    <h1>Inscription</h1>
    <div class="erreur"><?php echo  $erreur  ?></div>
    <form name="fo" method="post" action="">
        <input type="text" name="nom" placeholder="Nom" value="<?= $nom ?>" /><br />
        <input type="text" name="prenom" placeholder="Prénom" value="<?= $prenom ?>" /><br />
        <input type="text" name="pseudo" placeholder="Votre Pseudo" value="<?= $pseudo ?>" /><br />
        <input type="text" name="email" placeholder="Votre Email" value="<?= $email ?>" /><br />
        <input type="password" name="password" placeholder="Mot de passe" /><br />
        <input type="password" name="passconf" placeholder="Confirmez votre Mot de passe" /><br />
        <input type="submit" name="inscrire" value="S'inscrire" />
        <a href="authentification.php">Deja un compte</a>
    </form>
</body>

</html>