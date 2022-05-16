function getUser(){
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open("GET", "connexion.php");

    requeteAjax.onload = function(){
        const resultat = requeteAjax.responseText;
        console.log(resultat);
    }
    requeteAjax.send();
}