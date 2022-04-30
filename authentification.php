<?php

session_start();
include("infos.php");
@$valider = $_POST["valider"];
$erreur = "";
if (isset($valider)) {
    include("connexion.php");
    $verify = $pdo->prepare("select * from User where pseudo=? and password=? limit 1");
    $verify->execute(array($pseudo, $pass_crypt));
    $user = $verify->fetchAll();
    if ($pseudo == "admin" && $pass_crypt == md5("admin")) {
        $_SESSION["connecter"] = "yes";
        header("location:admin.php");
    } elseif (count($user) > 0) {
        $_SESSION["prenom_nom"] = ucfirst(strtolower($user[0]["prenom"])) .
            " "  .  strtoupper($user[0]["nom"]);
        $_SESSION["connecter"] = "yes";
        header("location:session.php");
    } else
        $erreur = "Mauvais login ou mot de passe!";
}
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
            background: gray;
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
            color: blue;
            text-decoration: none;
            font-weight: normal;
        }

        a:hover {
            text-decoration: underline;
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