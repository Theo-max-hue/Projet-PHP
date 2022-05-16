<?php

include "./controller/user.class.php";
include "./modele/connexion.php";
include "./modele/infos.php";


session_start();
@$valider = $_POST["enregistre"];
if ($_SESSION["connecter"] != "yes") {
    header("location:authentification.php");
    exit();
}
if (isset($valider)) {
    $manager = new UserManager($pdo);
    echo ($email);
    echo ($pseudo);
    $manager->updateUser($nom, $prenom, $pseudo, $email, $password, $_SESSION['id_user']);
    $user = $manager->getById($_SESSION['id_user']);
    header("location:acceuil.php");
} else {
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

    function verif() {
        if (confirm("Etes-vous sûr de vouloir enregistrer ces informations ?")) {
            // faire une verif et changer la variable valider pour qu'elle soit accessible en js

        }
    }
</script>


<?php
require("header.php");
?>

<body onLoad="document.formProfil.nom.focus()">

    <form method="post" name="formProfil" style="width: 50%;">

        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Nom</span>
            <input type="text" class="form-control" name="nom" placeholder="<?php echo ($user->getNom()); ?>" value="<?= $nom ?>">
        </div>

        <div class="input-group flex-nowrap ">
            <span class="input-group-text" id="addon-wrapping">Prenom</span>
            <input type="text" class="form-control" name="prenom" placeholder="<?php echo ($user->getPrenom()); ?>" value="<?= $prenom ?>">
        </div>

        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Pseudo</span>
            <input type="text" class="form-control" name="pseudo" placeholder="<?php echo ($user->getPseudo()); ?>" value="<?= $pseudo ?>">
        </div>

        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Email</span>
            <input type="text" class="form-control" name="email" placeholder="<?php echo ($user->getEmail()); ?>" value="<?= $email ?>">
        </div>

        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Mot de Passe</span>
            <input type="text" class="form-control" name="password" placeholder="<?php echo ($user->getPass()); ?>" value="<?= $password ?>">
        </div>

        <input class="btn btn-success" id="input" type="submit" name="enregistre" value="Enregistrer" onclick="verif()" />
        <button onclick="window.location.href = 'acceuil.php';" type="button" class="btn btn-danger">Annuler</button>
    </form>

</body>
