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