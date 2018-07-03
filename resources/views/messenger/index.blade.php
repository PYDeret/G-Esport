@include('layouts.header')
  <section class="content-wrap">

    @include('layouts.header_profile')
    <div class="container youplay-content">

      <div class="row">

        <div class="col-md-9">

          @include('layouts.msg_header')

          <table class="youplay-messages table table-hover">
            <tbody>
                <?php foreach($threads as $key => $thread): ?>

                    <tr class="message-unread">
                        <td class="message-from">

                            <a href="#" class="message-from-name"><?= $thread->name; ?></a>
                            <br>
                            <span class="date"><?= $thread->updated_at; ?></span>
                        </td>
                        <td class="message-description">
                            <a href="{{ route('users.messages.show', $thread->id ) }}" class="message-description-name" title="View Message"><?= $thread->subject; ?></a>
                            <br>
                            <div class="message-excerpt"><?= $thread->body; ?></div>
                        </td>
                        <td class="message-action">
                            <!--<span class="messages-count">+4</span>-->
                            <a class="message-delete" href="#"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
              
                <?php endforeach; ?>

            </tbody>

          </table>


        </div>
    @include('layouts.user_right')
      </div>
    </div>
@include('layouts.footer')
<script>
function loadMsg(){

    var arrayBodies = new Array();

    $('.message-excerpt').each(function(){
        arrayBodies.push($(this).text());
    });

    $.ajax({ 
        type: "GET", 
        url: "/getMessages", 
        data: "", 
        dataType: "json", 
        success: function (response) { 
            $.each(response, function(){


                if(! arrayBodies.includes($(this)[0].body) ){

                    var id = "/users/messages/show/"+$(this)[0].id;
                    
                    $( "tbody" ).prepend( '<tr class="message-unread">'+
                        '<td class="message-from">'+

                            '<a href="#" class="message-from-name">'+$(this)[0].name+'</a>'+
                            '<br>'+
                            '<span class="date">'+$(this)[0].updated_at+'</span>'+
                        '</td>'+
                        '<td class="message-description">'+
                            '<a href="<?php echo url('/') ?>'+id+'" class="message-description-name" title="View Message">'+$(this)[0].subject+'</a>'+
                            '<br>'+
                            '<div class="message-excerpt">'+$(this)[0].body+'</div>'+
                        '</td>'+
                        '<td class="message-action">'+
                            '<a class="message-delete" href="#"><i class="fa fa-times"></i></a>'+
                        '</td>'+
                    '</tr>');
                }
            });
        } 
   }); 
}

$(document).ready(function(){
    window.setInterval(function(){
        loadMsg();
}, 3000);
})
</script>
