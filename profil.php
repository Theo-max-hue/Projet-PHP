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
    echo($_SESSION['pseudo_user']);
    $manager = new UserManager($pdo);
    $manager->updateUser($nom, $prenom, $pseudo, $password, $_SESSION['id_user']);
    $user = $manager->getById($_SESSION['id_user']);
    header("location:acceuil.php");
}
else{
    $manager = new UserManager($pdo);
    $user = $manager->getById($_SESSION['id_user']);
}

?>

<script>

    //si verif des champs avec js adapter :

// const nameInput = document.querySelector('input'); 
// const form = document.querySelector('form'); //mettre le nom du formulaire

// nameInput.addEventListener('input', () => {
//   nameInput.setCustomValidity(''); //initialise le texte de l'erreur dans l'input de name
//   nameInput.checkValidity(); //permet de checker a chaque ajout de l'utilisateur
// });

// nameInput.addEventListener('invalid', () => {
//   if(nameInput.value === '') {
//     nameInput.setCustomValidity("Veuillez saisir votre nom d'utilisateur !");  //si champs vide 
//   } else {
//     nameInput.setCustomValidity("Un nom d'utilisateur ne peut contenir que des lettres minuscules et majuscules, veuillez réessayer");
//   }
// });

function verif(){
    if(confirm("Etes-vous sûr de vouloir enregistrer ces informations ?")){
        // faire une verif et changer la variable valider pour qu'elle soit accessible en js

    }
}
</script>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body onLoad="document.formProfil.nom.focus()">

<form method="post" name="formProfil">

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

    <input class="btn btn-success" id="input" type="submit" name="enregistre" value="Enregistrer" onclick="verif()"/>
    <button onclick="window.location.href = 'acceuil.php';" type="button" class="btn btn-danger">Annuler</button>
</form>

</body>

