$("input[name=team]").change(function() {
    var checked = $('input[name=team]:checked');

    if(checked){
        if(checked.length == 4){

            if($(this).is(':checked')){
                $('input[name=team]:not(:checked)').css('pointer-events','none');
                $('input[name=team]:not(:checked)').each(function(){
                    $('label[for="'+$(this).prop('id')+'"]').hide(1000);
                });
            }   
        }

        if(checked.length == 3){

            if(!$(this).is(':checked')){
                $('input[name=team]:not(:checked)').each(function(){
                    $('label[for="'+$(this).prop('id')+'"]').show(1000);
                });
            }  
        }  
    }
});