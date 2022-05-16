<?php

session_start();
include("./modele/infos.php");
include("./controller/user.class.php");
include("./modele/connexion.php");
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
    <link rel="stylesheet" href="./public/styleInscription.css">


    <title>inscription</title>
</head>

</head>

<body onLoad="document.fo.nom.focus()">
    <h1>Inscription</h1>
    <div class="erreur"><?php echo  $erreur  ?></div>
    <form name="fo" method="post" action="">
        <input type="text" name="nom" placeholder="Nom" value="<?= $nom  ?>" /><br />
        <input type="text" name="prenom" placeholder="Prénom" value="<?= $prenom  ?>" /><br />
        <input type="text" name="pseudo" placeholder="Votre Pseudo" value="<?= $pseudo  ?>" /><br />
        <input type="text" name="email" placeholder="Votre Email" value="<?= $email  ?>" /><br />
        <input type="password" name="password" placeholder="Mot de passe" /><br />
        <input type="password" name="passconf" placeholder="Confirmez votre Mot de passe" /><br />
        <input type="submit" name="inscrire" value="S'inscrire" />
        <a href="authentification.php">Deja un compte</a>
    </form>
</body>

</html>