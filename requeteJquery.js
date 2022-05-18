$(document).ready(function() {
    $('.button').click(function() {
        var clickBtnValue = $(this).val();
        var idPanier = $(this).data('id');
        console.log(idPanier);
        var ajaxurl = 'receptionDonnees.php',
            data = { 'item_src': clickBtnValue, 'id_panier': idPanier };
        $.post(ajaxurl, data, function(response) {
            //Response div goes here.
            alert("Item ajouté au panier !");
        });
    });
});