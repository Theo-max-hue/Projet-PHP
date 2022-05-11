$(function(){
    $(document).on('click','.trash',function(){ //a modif
        var del_id= $(this).attr('id');
        var $ele = $(this).parent().parent();
        $.ajax({
            type:'POST',
            url:'user.class.php',
            data:{'del_id':del_id},
            success: function(data){
                 if(data=="YES"){
                    $ele.fadeOut().remove();
                 }else{
                        alert("can't delete the row")
                 }
             }

            });
        });
});