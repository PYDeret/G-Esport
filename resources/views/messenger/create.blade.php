@include('layouts.header')
  <section class="content-wrap">

    @include('layouts.header_profile')
    <div class="container youplay-content">

      <div class="row">

        <div class="col-md-9">

          @include('layouts.msg_header')

          <form action="{{ route('users.messages.store', Auth::user()->id ) }}" method="post">
          {{ csrf_field() }}
            <div class="youplay-input">
              <!--<input type="text" placeholder="Send To" name="message-to">-->
                @if($users->count() > 0)
                    <div class="checkbox">
                        @foreach($users as $user)
                            <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]"
                                                                    value="{{ $user->id }}">{!!$user->name!!}</label>
                        @endforeach
                    </div>
                @endif
            </div>
            <input type="hidden" value="{{Auth::user()->id}}" name="idUsr" />
            <div class="youplay-input">
              <input type="text" placeholder="Subject" name="subject">
            </div>
            <div class="youplay-textarea">
              <textarea placeholder="Message" name="message" rows="5"></textarea>
            </div>
            <button class="btn btn-default">Send</button>
          </form>

        </div>
        @include('layouts.user_right')
      </div>
    </div>
@include('layouts.footer')
