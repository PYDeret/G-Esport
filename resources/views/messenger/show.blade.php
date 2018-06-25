@include('layouts.header')
  <section class="content-wrap">

    @include('layouts.header_profile')
    <div class="container youplay-content">

      <div class="row">

        <div class="col-md-9">

          @include('layouts.msg_header')

          <table class="youplay-messages table table-hover">
            <tbody>
                @each('messenger.partials.messages', $thread->messages, 'message')
            </tbody>
          </table>
          <form action="{{ route('users.messages.update', $thread->id) }}" method="post">
            {{ method_field('put') }}
            {{ csrf_field() }}
            <input type="hidden" value="{{Auth::user()->id}}" name="idUsr" />
            <div class="youplay-input">
              <input type="text" placeholder="Sujet" name="subject" value="{{ $thread->subject }}">
            </div>
            <div class="youplay-textarea">
              <textarea placeholder="Message" name="message" rows="5"></textarea>
            </div>
            <button class="btn btn-default">Envoyer</button>
          </form>

        </div>
        @include('layouts.user_right')
      </div>
    </div>
@include('layouts.footer')
