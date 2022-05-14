function ajoutItem(id) {
    // Fetching Button value
    let btnValue = id;
    console.log(btnValue);

    // jQuery Ajax Post Request
    $.ajax({
        type: "POST",
        url: "panier.php",
        data: btnValue,
        success: function(response) {
            $('#divAffichageResultat').html(response);
            console.log(response);
        },
        error: function(response) {
            console.log(response);
        }
    });
};