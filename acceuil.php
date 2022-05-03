<?php

session_start();
if ($_SESSION["connecter"] != "yes") {
    header("location:authentification.php");
    exit();
}
if (date("H") < 18)  //PAGE QUI S'AFFICHE EN SE CONNECTANT
    $bienvenue = "Bonjour "  .
        $_SESSION["prenom_nom"];
else
    $bienvenue = "Bonsoir "  .
        $_SESSION["prenom_nom"];
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">


    <title>Title</title>
</head>
<body>
<h2><?php echo  $bienvenue  ?></h2>
<a href="deconnexion.php">Se déconnecter</a>

<nav class="navbar navbar-expand-lg navbar-light bg-black  position:fixed">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> <img src="./image/tdm.png" style="width:85px;height:85px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>



            <ul class ="caddie"><a href="#"> <img src="./image/shop.png" class="rounded" alt="test" width="45px" id="shop"></a>
            <li class="items1">
                <p>Items</p>
                <span>0</span>
            </li>
                <li class="total">
                <p>total</p>
                    <div class="span">
                <span>0</span>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</nav>

</div>
<div class="container-title">
    <h1>Missile</h1>
</div>
<div class="container"width=100%;>

    <div class="row">

     <div class="col" id="div_avec_scrollFirst">
        <div class="flecheFirst"> <input type="image1" src="./image/btn_gauche.png" id="defilement_gaucheFirst" alt="Submit" width="48" height="100px"></div>


            <a href="#" ></a> <img src="./image/missileTurque.jpg" class="rounded" alt="test" width="300px"></a>

            <a href="#" ></a> <img src="./image/missile pakistan.jpg" class="rounded" alt="test" width="300px"></a>

            <a href="#" ></a> <img src="./image/missile.jpg" class="rounded" alt="test" width="300px"></a>

            <a href="#" ></a> <img src="./image/falloutEcran.png" class="rounded" alt="test" width="300px"></a>

            <a href="#" ></a> <img src="./image/falloutEcran.png" class="rounded" alt="test" width="300px"></a>

            <a href="#" ></a> <img src="./image/falloutEcran.png" class="rounded" alt="test" width="300px"></a>

            <a href="#" ></a> <img src="./image/falloutEcran.png" class="rounded" alt="test" width="300px"></a>

            <div class="flecheDroiteFirst" ><input type="image1" src="./image/btn-droit.png" id="defilement_droiteFirst" alt="Submit" width="48" height="100px"></div>
        </div>
    </div>
    </div>
</div>
<div class="container-title">
    <h1>Guns</h1>
</div>
<div class="container"width=100%;>

    <div class="row">

        <div class="col" id="div_avec_scroll">

            <div class="fleche"> <input type="image" src="./image/btn_gauche.png" id="defilement_gauche" alt="Submit" width="48" height="100px"></div>

            <a href="#" ></a> <img src="./image/guns1.jpg" class="rounded" alt="test" width="300px"></a>

            <a href="#" ></a> <img src="./image/guns2.png" class="rounded" alt="test" width="300px"></a>

            <a href="#" ></a> <img src="./image/guns3.png" class="rounded" alt="test" width="300px"></a>

            <a href="#" ></a> <img src="./image/guns4.png" class="rounded" alt="test" width="300px"></a>

            <a href="#" ></a> <img src="./image/guns6.png" class="rounded" alt="test" width="300px"></a>

            <a href="#" ></a> <img src="./image/guns7.png" class="rounded" alt="test" width="300px"></a>

            <a href="#" ></a> <img src="./image/guns8.png" class="rounded" alt="test" width="300px"></a>

            <div class="flecheDroite" ><input type="image" src="./image/btn-droit.png" id="defilement_droite" alt="Submit" width="48" height="100px"></div>

        </div>

    </div>
</div>

<div class="footer-dark">
    <footer>
        <div class="container">
            <div class="row">

                <div class="col-md-6 item text">
                    <h3>Company Name</h3>
                    <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
                </div>

            </div>
            <p class="copyright">the Bloody Killers  © 2022</p>
        </div>

    </footer>
</div>
<script src="index.js"></script>
</body>
</html>