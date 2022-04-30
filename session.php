<?php

session_start();
if ($_SESSION["connecter"] != "yes") {
    header("location:authentification.php");
    exit();
}
if (date("H") < 18)  //PAGE QUI S'AFFICHE EN SE CONNECTANT
    $bienvenue = "Bonjour et bienvenue "  .
        $_SESSION["prenom_nom"];
else
    $bienvenue = "Bonsoir et bienvenue "  .
        $_SESSION["prenom_nom"];
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

<body onLoad="document.fo.login.focus()">
    <h2><?php echo  $bienvenue  ?></h2>
    <a href="deconnexion.php">Se déconnecter</a>
</body>

</html>