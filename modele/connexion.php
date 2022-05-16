<?php
try {
    $pdo = new PDO("mysql:host=devbdd.iutmetz.univ-lorraine.fr;dbname=gamard3u_bdd_php", "gamard3u_appli", "32021323");
} catch (PDOException $e) {
    echo $e->getMessage();
}
