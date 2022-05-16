
<?php

session_start();
include('./controller/user.class.php');
include("./modele/connexion.php");
if ($_SESSION["connecter"] != "yes") {
    header("location:authentification.php");
    exit();
}
$manager = new UserManager($pdo);
$user = $manager->getById($_SESSION['id_user']);
if (date("H") < 18)  //PAGE QUI S'AFFICHE EN SE CONNECTANT
    $bienvenue = "Bonjour "  . $user->getPseudo();
else
    $bienvenue = "Bonsoir "  . $user->getPseudo();
?>


<?php
require("header.php");
?>
<div class="container-title">
    <h1>Missile</h1>
</div>
<div class="container"width=100%;>

    <div class="row">

        <div class="col" id="div_avec_scrollFirst">
        
            <div class="flecheFirst"> <input type="image" src="./public/image/btn_gauche.png" id="defilement_gaucheFirst" alt="Submit" width="48" height="100px"></div>
                <div class=image >
                <a href="#" ></a> <img src="./public/image/missileTurque.jpg" class="rounded" alt="test" width="auto" height="200px"></a>
                <div class=prixAndButton>
                            <div class=prix > <p>getPrix </p></div>
                            <div class=btnAjou ><button type="button" class="btn btn-warning">Ajouter</button></div>
                    </div>
                </div>
                <div class=image >
                <a href="#" ></a> <img src="./public/image/missile pakistan.jpg" class="rounded" alt="test" width="auto" height="200px"></a>
                <div class=prixAndButton>
                            <div class=prix > <p>getPrix </p></div>
                            <div class=btnAjou ><button type="button" class="btn btn-warning">Ajouter</button></div>
                    </div>
                </div>
                <div class=image >
                <a href="#" ></a> <img src="./public/image/missile.jpg" class="rounded" alt="test" width="auto" height="200px"></a>
                <div class=prixAndButton>
                            <div class=prix > <p>getPrix </p></div>
                            <div class=btnAjou ><button type="button" class="btn btn-warning">Ajouter</button></div>
                    </div>
                </div>
                <div class=image >
                <a href="#" ></a> <img src="./public/image/China.jpg" class="rounded" alt="test" width="auto" height="200px"></a>
                <div class=prixAndButton>
                            <div class=prix > <p>getPrix </p></div>
                            <div class=btnAjou ><button type="button" class="btn btn-warning">Ajouter</button></div>
                    </div>
                </div>
                <div class=image >
                <a href="#" ></a> <img src="./public/image/panzer.JPG" class="rounded" alt="test" width="auto" height="200px"></a>
                <div class=prixAndButton>
                            <div class=prix > <p>getPrix </p></div>
                            <div class=btnAjou ><button type="button" class="btn btn-warning">Ajouter</button></div>
                    </div>
                </div>
                <div class=image >
                <a href="#" ></a> <img src="./public/image/Bombe-B61.jpg" class="rounded" alt="test" width="auto" height="200px"></a>
                <div class=prixAndButton>
                            <div class=prix > <p>getPrix </p></div>
                            <div class=btnAjou ><button type="button" class="btn btn-warning">Ajouter</button></div>
                    </div>
                </div>
               
                <div class="flecheDroiteFirst" ><input type="image" src="./public/image/btn-droit.png" id="defilement_droiteFirst" alt="Submit" width="48" height="100px"></div>
           
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

            <div class="fleche"> <input type="image" src="./public/image/btn_gauche.png" id="defilement_gauche" alt="Submit" width="48" height="100px"></div>

            <div class=image >
                <a href="#" ></a> <img src="./public/image/guns1.jpg" class="rounded" alt="test" width="auto" height="200px"></a>
                <div class=prixAndButton>
                        <div class=prix > <p>getPrix </p></div>
                        <div class=btnAjou ><button type="button" class="btn btn-warning">Ajouter</button></div>
                </div>
            </div>
            <div class=image >
            <a href="#" ></a> <img src="./public/image/guns2.png" class="rounded" alt="test" width="auto" height="200px"></a>
            <div class=prixAndButton>
                        <div class=prix > <p>getPrix </p></div>
                        <div class=btnAjou ><button type="button" class="btn btn-warning">Ajouter</button></div>
                </div>
            </div>
            <div class=image >
            <a href="#" ></a> <img src="./public/image/guns3.png" class="rounded" alt="test" width="auto" height="200px"></a>
            <div class=prixAndButton>
                        <div class=prix > <p>getPrix </p></div>
                        <div class=btnAjou ><button type="button" class="btn btn-warning">Ajouter</button></div>
                </div>
            </div>
            <div class=image >
            <a href="#" ></a> <img src="./public/image/guns4.png" class="rounded" alt="test" width="auto" height="200px"></a>
            <div class=prixAndButton>
                        <div class=prix > <p>getPrix </p></div>
                        <div class=btnAjou ><button type="button" class="btn btn-warning">Ajouter</button></div>
                </div>
            </div>
            <div class=image >
            <a href="#" ></a> <img src="./public/image/guns6.png" class="rounded" alt="test" width="auto" height="200px"></a>
            <div class=prixAndButton>
                        <div class=prix > <p>getPrix </p></div>
                        <div class=btnAjou><button type="button" class="btn btn-warning">Ajouter</button></div>
                </div>
            </div>
            <div class=image >
            <a href="#" ></a> <img src="./public/image/guns7.png" class="rounded" alt="test" width="auto" height="200px"></a>
            <div class=prixAndButton>
                        <div class=prix > <p>getPrix </p></div>
                        <div class=btnAjou ><button type="button" class="btn btn-warning">Ajouter</button></div>
                </div>
            </div>
            

            <div class="flecheDroite" ><input type="image" src="./public/image/btn-droit.png" id="defilement_droite" alt="Submit" width="48" height="100px"></div>

        </div>

    </div>
</div>

<?php
require("footer.php");
?>