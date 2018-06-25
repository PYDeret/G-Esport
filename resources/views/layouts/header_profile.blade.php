    <div class="youplay-banner banner-top youplay-banner-parallax small" style="max-height: 450px;">
      <div class="image" style="background-image: url('{{ asset('images/game-journey-1400x460.jpg')}} ')">
      </div>

      <div class="youplay-user-navigation">
        <div class="container">
          <ul>
            <li <?php if (strpos(url()->current(), 'profile') == false && strpos(url()->current(), 'messages') == false) {
                  echo 'class="active"';
              }?>>
              <a href="{{ route('users.edit', Auth::user()->id ) }}">Dernières activités</a>
            </li>
            <?php if(strpos(url()->current(), 'check') == false): ?>
            <li <?php if (strpos(url()->current(), 'profile') !== false) {
                  echo 'class="active"';
              }?>>
              <a href="{{ route('users.profile', Auth::user()->id ) }}">Profil</a>
            </li>
            <li <?php if (strpos(url()->current(), 'messages') !== false) {
                  echo 'class="active"';
              }?>>
              <a href="{{ route('users.messages', Auth::user()->id ) }}">Messages</a>
            </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>

      <div class="info" style="max-height: 240px;">
        <div>
          <div class="container youplay-user">
            <a href="{{ asset('images/user-photo.jpg')}}" class="angled-img image-popup">
              <div class="img">
                <img src="{{ asset('images/user-photo.jpg')}}" alt="">
              </div>
              <i class="fa fa-search-plus icon"></i>
            </a>
            <div class="user-data">
              <h2><?php if(!empty($user[0]->name_dude)): echo $user[0]->name_dude; elseif(!empty(Auth::user()->name)): echo Auth::user()->name; endif;?></h2>
            </div>
          </div>

          <div class="container mt-20">
            <a href="#!" class="btn btn-sm btn-default">Envoyer un message</a>
          </div>
        </div>
      </div>
    </div>