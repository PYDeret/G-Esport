    <div class="youplay-banner banner-top youplay-banner-parallax small" style="max-height: 450px;">
      <div class="image" style="background-image: url('{{ asset('images/game-journey-1400x460.jpg')}} ')">
      </div>

      <div class="youplay-user-navigation">
        <div class="container">
          <ul>
            <li class="active"><a href="{{ route('users.edit', Auth::user()->id ) }}">Dernières activités</a>
            </li>
            <li><a href="{{ route('users.profile', Auth::user()->id ) }}">Profil</a>
            </li>
            <li><a href="user-messages.html">Messages <span class="badge">6</span></a>
            </li>
            <li><a href="user-settings.html">Settings</a>
            </li>
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
              <h2>{{ Auth::user()->name }}</h2>
              <div class="location"><i class="fa fa-map-marker"></i> Los Angeles</div>
              <div class="activity">
                <div>
                  <div class="num">69</div>
                  <div class="title">Posts</div>
                </div>
                <div>
                  <div class="num">12</div>
                  <div class="title">Games</div>
                </div>
                <div>
                  <div class="num">689</div>
                  <div class="title">Followers</div>
                </div>
              </div>
            </div>
          </div>

          <div class="container mt-20">
            <a href="#!" class="btn btn-sm btn-default ml-0">Add Friend</a>
            <a href="#!" class="btn btn-sm btn-default">Private Message</a>
          </div>
        </div>
      </div>
    </div>