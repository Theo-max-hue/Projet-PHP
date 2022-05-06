<?php

include "user.class.php";
include "connexion.php";
include "infos.php";

session_start();
@$valider = $_POST["enregistre"];
if ($_SESSION["connecter"] != "yes") {
    header("location:authentification.php");
    exit();
}if (isset($valider)) {
    echo('teub');
    $manager = new UserManager($pdo);
    if ($manager->updateUser($_GET('nom'), $_GET('prenom'), $_GET('pseudo'), $_GET('password'))){
        echo($_GET('nom'));
        header("location:acceuil.php");
        }
}
else{
    $manager = new UserManager($pdo);
    $user = $manager->getByPseudo($_SESSION["pseudo"]);
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body onLoad="document.formProfile.nom.focus()">

<form method="post" name="formProfile">

    <div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">Nom</span>
    <input type="text" class="form-control"  name="nom" placeholder="<?php echo($user->getNom()); ?>" value= "<?=$nom?>">
    </div>

    <div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">Prenom</span>
    <input type="text" class="form-control" name="prenom" placeholder="<?php echo($user->getPrenom()); ?>" value= "<?=$prenom?>">
    </div>

    <div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">Pseudo</span>
    <input type="text" class="form-control" name="pseudo" placeholder="<?php echo($user->getPseudo()); ?>" value= "<?=$pseudo?>">
    </div>

    <div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">Mot de Passe</span>
    <input type="text" class="form-control" name="password" placeholder="<?php echo($user->getPass()); ?>" value= "<?=$password?>">
    </div>

    <input type="submit" name="S'enregistrer" value="Envoyer" />
</form>

</body>