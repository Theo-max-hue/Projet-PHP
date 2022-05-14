
<?php

session_start();
include('user.class.php');
include("connexion.php");
if ($_SESSION["connecter"] != "yes") {
    header("location:authentification.php");
    exit();
}
$teub ="";
$manager = new UserManager($pdo);
$user = $manager->getById($_SESSION['id_user']);

if (date("H") < 18)  //PAGE QUI S'AFFICHE EN SE CONNECTANT
    $bienvenue = "Bonjour "  . $user->getPseudo() . $teub;
else
    $bienvenue = "Bonsoir "  . $user->getPseudo() . $teub;
?>

<script src="http://code.jquery.com/jquery.js" type="text/javascript"></script>
<script src="requeteJquery.js"></script>

<?php
require("header.php");
?>
<div class="container-title">
    <h1>Missile</h1>
</div>
<div class="container"width=100%;>

    <div class="row">

        <div class="col" id="div_avec_scrollFirst">
        
            <div class="flecheFirst"> <input type="image" src="./image/btn_gauche.png" id="defilement_gaucheFirst" alt="Submit" width="48" height="100px"></div>
                <div class=image >
                <a href="#" ></a> <img src="./image/missileTurque.jpg" class="rounded" alt="test" width="300px"></a>
                <div class=prixAndButton>
                            <div class=prix > <p>getPrix </p></div>
                            <div class=btnAjou ><button id="btn" onclick="ajoutItem(this.value)" value="1" class="btn btn-warning">Ajouter</button></div>
                    </div>
                </div>
                <div class=image >
                <a href="#" ></a> <img src="./image/missile pakistan.jpg" class="rounded" alt="test" width="300px"></a>
                <div class=prixAndButton>
                            <div class=prix > <p>getPrix </p></div>
                            <div class=btnAjou ><input id="btn" onclick="ajoutItem(this.value)" type="button" value="2" class="btn btn-warning">Ajouter</input></div>
                    </div>
                </div>
                <div class=image >
                <a href="#" ></a> <img src="./image/missile.jpg" class="rounded" alt="test" width="300px"></a>
                <div class=prixAndButton>
                            <div class=prix > <p>getPrix </p></div>
                            <div class=btnAjou ><input id="btn" onclick="ajoutItem(this.value)" type="button" value="3" class="btn btn-warning">Ajouter</input></div>
                    </div>
                </div>
                <div class=image >
                <a href="#" ></a> <img src="./image/falloutEcran.png" class="rounded" alt="test" width="300px"></a>
                <div class=prixAndButton>
                            <div class=prix > <p>getPrix </p></div>
                            <div class=btnAjou ><input id="btn" onclick="ajoutItem(this.value)" type="button" value="4" class="btn btn-warning">Ajouter</input></div>
                    </div>
                </div>
                <div class=image >
                <a href="#" ></a> <img src="./image/falloutEcran.png" class="rounded" alt="test" width="300px"></a>
                <div class=prixAndButton>
                            <div class=prix > <p>getPrix </p></div>
                            <div class=btnAjou ><input id="btn" onclick="ajoutItem(this.value)" type="button" value="5" class="btn btn-warning">Ajouter</input></div>
                    </div>
                </div>
                <div class=image >
                <a href="#" ></a> <img src="./image/falloutEcran.png" class="rounded" alt="test" width="300px"></a>
                <div class=prixAndButton>
                            <div class=prix > <p>getPrix </p></div>
                            <div class=btnAjou ><input id="btn" onclick="ajoutItem(this.value)" type="button" value="6" class="btn btn-warning">Ajouter</input></div>
                    </div>
                </div>
               
                <div class="flecheDroiteFirst" ><input type="image" src="./image/btn-droit.png" id="defilement_droiteFirst" alt="Submit" width="48" height="100px"></div>
           
             </div>
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

            <div class=image >
                <a href="#" ></a> <img src="./image/guns1.jpg" class="rounded" alt="test" width="300px"></a>
                <div class=prixAndButton>
                        <div class=prix > <p>getPrix </p></div>
                        <div class=btnAjou ><button type="button" class="btn btn-warning">Ajouter</button></div>
                </div>
            </div>
            <div class=image >
            <a href="#" ></a> <img src="./image/guns2.png" class="rounded" alt="test" width="300px"></a>
            <div class=prixAndButton>
                        <div class=prix > <p>getPrix </p></div>
                        <div class=btnAjou ><button type="button" class="btn btn-warning">Ajouter</button></div>
                </div>
            </div>
            <div class=image >
            <a href="#" ></a> <img src="./image/guns3.png" class="rounded" alt="test" width="300px"></a>
            <div class=prixAndButton>
                        <div class=prix > <p>getPrix </p></div>
                        <div class=btnAjou ><button type="button" class="btn btn-warning">Ajouter</button></div>
                </div>
            </div>
            <div class=image >
            <a href="#" ></a> <img src="./image/guns4.png" class="rounded" alt="test" width="300px"></a>
            <div class=prixAndButton>
                        <div class=prix > <p>getPrix </p></div>
                        <div class=btnAjou ><button type="button" class="btn btn-warning">Ajouter</button></div>
                </div>
            </div>
            <div class=image >
            <a href="#" ></a> <img src="./image/guns6.png" class="rounded" alt="test" width="300px"></a>
            <div class=prixAndButton>
                        <div class=prix > <p>getPrix </p></div>
                        <div class=btnAjou><button type="button" class="btn btn-warning">Ajouter</button></div>
                </div>
            </div>
            <div class=image >
            <a href="#" ></a> <img src="./image/guns7.png" class="rounded" alt="test" width="300px"></a>
            <div class=prixAndButton>
                        <div class=prix > <p>getPrix </p></div>
                        <div class=btnAjou ><button type="button" class="btn btn-warning">Ajouter</button></div>
                </div>
            </div>
            

            <div class="flecheDroite" ><input type="image" src="./image/btn-droit.png" id="defilement_droite" alt="Submit" width="48" height="100px"></div>

        </div>

    </div>
</div>

<?php
require("footer.php");
?>