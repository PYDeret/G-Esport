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

        <h3 class="mt-40 mb-20">Informations</h3>
        <form method="POST" id="aboutChange" action="{{ route('users.updateAbout') }}">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td>
                  <p>À propos de moi</p>
                </td>
                <td>
                  <textarea style="border: none;width: 100%;" name="aboutTxt">{{ Auth::user()->about }}</textarea>
                        {{ csrf_field() }}
                </td>
              </tr>
            </tbody>
          </table>
        </form>
          <a type="submit" class="btn btn-sm btn-default" onclick="event.preventDefault();
                                    document.getElementById('aboutChange').submit();"> Modifier </a>

        </div>
        @include('layouts.user_right')
      </div>
    </div>
@include('layouts.footer')