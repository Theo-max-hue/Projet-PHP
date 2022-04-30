<?php

include "user.class.php";
include "connexion.php";

session_start();
if ($_SESSION["connecter"] != "yes") {
    header("location:authentification.php");
    exit();
}
else{
    $manager = new UserManager($pdo);
    $user = $manager->getById($_SESSION["pseudo"]);
    var_dump($user);
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body onLoad="document.form.pseudo.focus()">

<form method="post">

    <div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">Nom</span>
    <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
    </div>

    <div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">Prenom</span>
    <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
    </div>

    <div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">Pseudo</span>
    <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
    </div>

    <div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">Mot de Passe</span>
    <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
    </div>
</form>

</body>