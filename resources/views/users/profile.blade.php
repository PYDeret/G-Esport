@include('layouts.header')
  <section class="content-wrap">

    @include('layouts.header_profile')
    
    <div class="container youplay-content">

      <div class="row">

        <div class="col-md-9">

          <h3 class="mt-0 mb-20">{{ Auth::user()->name }}</h3>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td style="width: 200px;">
                  <p>Email</p>
                </td>
                <td>
                  <p>
                    {{ Auth::user()->email }}
                  </p>
                </td>
              </tr>
              <tr>
                <td style="width: 200px;">
                  <p>École</p>
                </td>
                <td>
                  <p>
                    ESGI
                  </p>
                </td>
              </tr>
              <form method="POST" id="passwd_change" action="{{ route('users.update') }}">
                <tr>
                    <td>
                    <p>Modifier mon mot de passe</p>
                    </td>
                    <td>
                    <p>  
                        <input type="password" value="" name="passwd"/>
                    </p>
                    </td>
                </tr>
                <tr>
                    <td>
                    <p>Confirmer mon nouveau mot de passe</p>
                    </td>
                    <td>
                    <p>
                        <input type="password" value="" name="passwd_confirmation"/>
                        {{ csrf_field() }}
                    </p>
                    </td>
                </tr>
              </form>
            </tbody>
          </table>

          <a type="submit" class="btn btn-sm btn-default" onclick="event.preventDefault();
                                    document.getElementById('passwd_change').submit();"> Modifier </a>

          <h3 class="mt-40 mb-20">Mes comptes</h3>
          <form method="POST" id="lolChange" action="{{ route('users.updateLol') }}">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td style="width: 200px;">
                    <p>League of Legends</p>
                    </td>
                    <td>
                    <p>
                        <input type="text" value="<?= $lolAcc ?>" name="lolLogin" />
                        <input type="hidden" value="{{ Auth::user()->id }}" name="idUsr" />
                        {{ csrf_field() }}
                    </p>
                    </td>
                </tr>
                </tbody>
            </table>
          </form>

          <a type="submit" class="btn btn-sm btn-default" onclick="event.preventDefault();
                                    document.getElementById('lolChange').submit();"> Modifier </a>

          <h3 class="mt-40 mb-20">Personal Information</h3>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td style="width: 200px;">
                  <p>Current City</p>
                </td>
                <td>
                  <p><a href="#">New York</a>
                  </p>
                </td>
              </tr>
              <tr>
                <td>
                  <p>Favorite games</p>
                </td>
                <td>
                  <p><a href="#">Bloodborne</a>, <a href="#">Dark Souls II</a>, <a href="#">Kingdoms of Amalur</a>, <a href="#">The Witcher</a>
                  </p>
                </td>
              </tr>
              <tr>
                <td>
                  <p>About Me</p>
                </td>
                <td>
                  <p>Netus. Nascetur arcu amet accumsan natoque. Augue aptent euismod sed magna diam nostra, molestie mi felis. Egestas nisl ante posuere dui Nostra tempus pulvinar at dui augue mattis placerat iaculis hac arcu rutrum.</p>

                  <p>Vel <strong>class</strong> lectus auctor interdum. Mi <strong>nec</strong> senectus commodo sed suscipit vitae parturient, risus vivamus quisque dolor aliquet amet. Etiam penatibus nascetur netus. Non leo eu vitae sem laoreet. Varius in
                    augue. Mollis convallis.</p>
                </td>
              </tr>
            </tbody>
          </table>

        </div>

        <!-- Right Side -->
        <div class="col-md-3">
          <div class="side-block">
            <h4 class="block-title">About</h4>
            <div class="block-content">
              Ecce dabo Pinkman Isai OK? Sicut locutus est tibi, et datus est, et hic sine Semper consequat volumus ... et ille in urbe ista licet? Et infernus, ubi tu non Virginiae ornare vel ipsum. Ut enim Albuquerque et ille eum iure hic, et ego ducam te ad iustitiam.
            </div>
          </div>
          <div class="side-block">
            <h4 class="block-title">Location</h4>
            <div class="block-content pt-5">
              <div class="responsive-embed responsive-embed-16x9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d423284.59051352815!2d-118.41173249999999!3d34.0204989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z0JvQvtGBLdCQ0L3QtNC20LXQu9C10YEsINCa0LDQu9C40YTQvtGA0L3QuNGPLCDQodCo0JA!5e0!3m2!1sru!2sru!4v1430158354122"
                width="600" height="450"></iframe>
              </div>
            </div>
          </div>
        </div>
        <!-- Right Side -->

      </div>

    </div>
@include('layouts.footer')