$(document).ready(function() {
    $('.button').click(function() { // fonction qui se lance sur un onclick du bouton avec la classe button
        var clickBtnValue = $(this).val(); // affectation des valeurs
        var idPanier = $(this).data('id');
        var ajaxurl = '../modele/receptionDonnees.php',
            data = { 'item_src': clickBtnValue, 'id_panier': idPanier };// envoi de la src de l'img et l'id du panier à la page receptionDonnes.php
        $.post(ajaxurl, data, function(response) {
            alert("Item ajouté au panier !"); // si la requête a bien fonctionné, affiche msg
        });
    });
});