@include('layouts.header')
  <section class="content-wrap">

    @include('layouts.header_profile')
    <div class="container youplay-content">

      <div class="row">

        <div class="col-md-9">

          @include('layouts.msg_header')

          <form action="{{ route('users.messages.store', Auth::user()->id ) }}" method="post">
          {{ csrf_field() }}
           
                @if($users->count() > 0)
                    <select name="recipients" style="border: none;background-color: rgba(60,7,50,.1);border-radius: unset;height: 35px;margin-bottom: 20px;width: 100%;">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" <?php if(!empty($recipient) && $recipient == $user->id){ echo "selected"; }?>>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                @endif
              
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
