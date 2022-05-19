<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../public/styles.css?v=<echo time();">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   

    <title>Title</title>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand" href="acceuil.php"><img src="../public/image/tdm.png" style="width:85px;height:85px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-light bg-dark" href="acceuil.php">Home <span class="sr-only text-light bg-dark"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light bg-dark" href="profil.php">profil</a>
      </li>
      <li class="nav-item" >
        <a class="nav-link text-light bg-dark" href="panier.php">Panier</a>
      </li>

    </ul>



            

        </div>
    </div>
    <h2><?php echo  $bienvenue  ?></h2>
<a href="../modele/deconnexion.php">Se déconnecter</a>
</nav>
</div>