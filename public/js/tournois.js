$("input[name='equipe[]']").change(function() {
    console.log('in');
    var checked = $('input[name="equipe[]"]:checked');

    if(checked){
        if(checked.length == 1){

            if($(this).is(':checked')){
                $('input[name="equipe[]"]:not(:checked)').css('pointer-events','none');
                $('input[name="equipe[]"]:not(:checked)').each(function(){
                    $('label[for="'+$(this).prop('id')+'"]').hide(1000);
                });
            }   
        }

        if(checked.length == 0){

            if(!$(this).is(':checked')){
                $('input[name="equipe[]"]:not(:checked)').each(function(){
                    $('label[for="'+$(this).prop('id')+'"]').show(1000);
                });
            }  
        }  
    }
});


$('#btn_certif').on('click', function(){
    event.preventDefault();
                                        
    var myteam = $('li[style*="background-color:cornflowerblue"]').children('input').val();
    var otherteam = $('li[style*="background-color:cornflowerblue"]').parent().children('li:not([style*="background-color:cornflowerblue"])').children('input').val();
    
    $('input[name=myteam]').val(myteam);
    $('input[name=otherteam]').val(otherteam);

    document.getElementById('manche_res').submit();
})