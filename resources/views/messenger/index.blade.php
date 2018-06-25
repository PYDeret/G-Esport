@include('layouts.header')
  <section class="content-wrap">

    @include('layouts.header_profile')
    <div class="container youplay-content">

      <div class="row">

        <div class="col-md-9">

          @include('layouts.msg_header')

          <?= $threads; ?>

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
                            <a href="#" class="message-description-name" title="View Message"><?= $thread->subject; ?></a>
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
