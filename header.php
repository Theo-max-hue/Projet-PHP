<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">


    <title>Title</title>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-black  position:fixed">
    <div class="container-fluid">
        <a class="navbar-brand" href="acceuil.php"> <img src="./image/tdm.png" style="width:85px;height:85px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pagePanier.php">Panier</a>
                </li>



            

        </div>
    </div>
    <h2><?php echo  $bienvenue  ?></h2>
<a href="deconnexion.php">Se déconnecter</a>
</nav>
</div>
