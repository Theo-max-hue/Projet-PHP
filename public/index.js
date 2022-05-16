
document.getElementById("defilement_gaucheFirst").onclick = function(){
    document.getElementById("div_avec_scrollFirst").scrollLeft -= 250;
};

    document.getElementById("defilement_droiteFirst").onclick = function(){
    document.getElementById("div_avec_scrollFirst").scrollLeft += 250 ;
    console.log("sa marche pas putin");
};


    document.getElementById("defilement_gauche").onclick = function(){
    document.getElementById("div_avec_scroll").scrollLeft -= 250;
};

    document.getElementById("defilement_droite").onclick = function(){
    document.getElementById("div_avec_scroll").scrollLeft += 250 ;
};
