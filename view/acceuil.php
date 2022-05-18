
<?php

session_start();
include('../controller/user.class.php');
include('../controller/item.class.php');
include("../modele/connexion.php");
if ($_SESSION["connecter"] != "yes") {
    header("location:authentification.php");
    exit();
}

/* -------------------------------- Création instance userManager et user -------------------------------- */

$manager = new UserManager($pdo);
$user = $manager->getUserById($_SESSION['id_user']);

/* -------------------------------- Création instance itemManager et item -------------------------------- */

$itemManager = new ItemManager($pdo);


if (date("H") < 18) 
    $bienvenue = "Bonjour "  . $user->getPseudo();
else
    $bienvenue = "Bonsoir "  . $user->getPseudo();
?>

<script src="http://code.jquery.com/jquery.js" type="text/javascript"></script>
<script src="../public/requeteJquery.js"></script>

<?php
require("header.php");
?>
<div class="container-title">
    <h1>Missile</h1>
</div>

<div class="container"width=100%;>

    <div class="row">

        <div class="col" id="div_avec_scrollFirst">
        
            <div class="flecheFirst"> <input type="image" src="../public/image/btn_gauche.png" id="defilement_gaucheFirst" alt="Submit" width="48" height="100px"></div>
                <div class=image >
                <a href="#" ></a> <img src="../public/image/missileTurque.jpg" class="rounded" alt="test" width="auto" height="200px"></a>
                <div class=prixAndButton>
                            <div class=btnAjou ><button class="button btn btn-warning" value="../public/image/missileTurque.jpg" data-id="<?php echo $user->getId() ?>">Ajouter</button></div>
                    </div>
                </div>
                <div class=image >
                <a href="#" ></a> <img src="../public/image/missile pakistan.jpg" class="rounded" alt="test" width="auto" height="200px"></a>
                <div class=prixAndButton>
                            <div class=btnAjou ><button class="button btn btn-warning" value="../public/image/missile pakistan.jpg" data-id="<?php echo $user->getId() ?>">Ajouter</button></div>
                    </div>
                </div>
                <div class=image >
                <a href="#" ></a> <img src="../public/image/missile.jpg" class="rounded" alt="test" width="auto" height="200px"></a>
                <div class=prixAndButton>
                            <div class=btnAjou ><button class="button btn btn-warning" value="../public/image/missile.jpg" data-id="<?php echo $user->getId() ?>">Ajouter</button></div>
                    </div>
                </div>
                <div class=image >
                <a href="#" ></a> <img src="../public/image/China.jpg" class="rounded" alt="test" width="auto" height="200px"></a>
                <div class=prixAndButton>
                            <div class=btnAjou ><button class="button btn btn-warning" value="../public/image/china.jpg" data-id="<?php echo $user->getId() ?>">Ajouter</button></div>
                    </div>
                </div>
                <div class=image >
                <a href="#" ></a> <img src="../public/image/panzer.JPG" class="rounded" alt="test" width="auto" height="200px"></a>
                <div class=prixAndButton>
                            <div class=btnAjou ><button class="button btn btn-warning" value="../public/image/panzer.JPG" data-id="<?php echo $user->getId() ?>">Ajouter</button></div>
                    </div>
                </div>
                <div class=image >
                <a href="#" ></a> <img src="../public/image/Bombe-B61.jpg" class="rounded" alt="test" width="auto" height="200px"></a>
                <div class=prixAndButton>
                            <div class=btnAjou ><button class="button btn btn-warning" value="../public/image/Bombe-B61.jpg" data-id="<?php echo $user->getId() ?>">Ajouter</button></div>
                    </div>
                </div>
               
                <div class="flecheDroiteFirst" ><input type="image" src="../public/image/btn-droit.png" id="defilement_droiteFirst" alt="Submit" width="48" height="100px"></div>
           
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

            <div class="fleche"> <input type="image" src="../public/image/btn_gauche.png" id="defilement_gauche" alt="Submit" width="48" height="100px"></div>

            <div class=image >
                <a href="#" ></a> <img src="../public/image/guns1.jpg" class="rounded" alt="test" width="auto" height="200px"></a>
                <div class=prixAndButton>
                        <div class=btnAjou ><button class="button btn btn-warning" value="../public/image/guns1.jpg" data-id="<?php echo $user->getId() ?>">Ajouter</button></div>
                </div>
            </div>
            <div class=image >
            <a href="#" ></a> <img src="../public/image/guns2.png" class="rounded" alt="test" width="auto" height="200px"></a>
            <div class=prixAndButton>
                        <div class=btnAjou ><button class="button btn btn-warning" value="../public/image/guns2.jpg" data-id="<?php echo $user->getId() ?>">Ajouter</button></div>
                </div>
            </div>
            <div class=image >
            <a href="#" ></a> <img src="../public/image/guns3.png" class="rounded" alt="test" width="auto" height="200px"></a>
            <div class=prixAndButton>
                        <div class=btnAjou ><button class="button btn btn-warning" value="../public/image/guns3.jpg" data-id="<?php echo $user->getId() ?>">Ajouter</button></div>
                </div>
            </div>
            <div class=image >
            <a href="#" ></a> <img src="../public/image/guns4.png" class="rounded" alt="test" width="auto" height="200px"></a>
            <div class=prixAndButton>
                        <div class=btnAjou ><button class="button btn btn-warning" value="../public/image/guns4.jpg" data-id="<?php echo $user->getId() ?>">Ajouter</button></div>
                </div>
            </div>
            <div class=image >
            <a href="#" ></a> <img src="../public/image/guns6.png" class="rounded" alt="test" width="auto" height="200px"></a>
            <div class=prixAndButton>
                        <div class=btnAjou><button class="button btn btn-warning" value="../public/image/guns6.jpg" data-id="<?php echo $user->getId() ?>">Ajouter</button></div>
                </div>
            </div>
            <div class=image >
            <a href="#" ></a> <img src="../public/image/guns7.png" class="rounded" alt="test" width="auto" height="200px"></a>
            <div class=prixAndButton>
                        <div class=btnAjou ><button class="button btn btn-warning" value="../public/image/guns7.jpg" data-id="<?php echo $user->getId() ?>">Ajouter</button></div>
                </div>
            </div>
            

            <div class="flecheDroite" ><input type="image" src="../public/image/btn-droit.png" id="defilement_droite" alt="Submit" width="48" height="100px"></div>

        </div>

    </div>
</div>

<?php
require("footer.php");
?>