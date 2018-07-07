<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>G-Esport</title>

  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('youplay/css/youplay-light.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css')}}" />
  <link rel="icon" href="/images/favicon.ico" />
  <link rel="icon" type="image/png" href="/images/logo.png" />
</head>

<body>

  <nav class="navbar-youplay navbar navbar-default navbar-fixed-top ">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="off-canvas" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">
          <img src="/images/logo.png" alt="">
        </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="/news">Actualités</a>
          </li>
          <li><a href="/tournois">Tournois</a>
          </li>
          <li><a href="/videos">Vidéos</a>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">

          @guest

          <li class="dropdown dropdown-hover">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#">
              {{ __('Se connecter') }}
            </a>
            <div class="dropdown-menu">
              <ul role="menu">
                <li>
                  <form method="POST" action="{{ route('login') }}" style="padding:15px">
                        @csrf

                        <div class="form-group row mb-0">
                            <label for="email" class="col-sm-8 col-form-label text-md-right">{{ __('Adresse E-mail') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <label for="password" class="col-md-8 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Se rappeler de moi') }}
                                    </label>
                                </div>
                            </div>
                        </div>


                    <div class="form-group row mb-0">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                          {{ __('Se connecter') }}
                        </button>
                      </div>
                    </div>

                    <div class="form-group row mb-0" style="margin-top:15px">
                      <div class="col-md-12">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                          {{ __('Mot de passe oublié') }}
                        </a>
                      </div>
                    </div>
                  </form>
                </li>
              </ul>
            </div>
          </li>

          @else

          <li class="dropdown dropdown-hover">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu">
              <ul role="menu">
                <li>
                  <a href="{{ route('users.edit', Auth::user()->id ) }}">Voir mon profil</a>
                </li>
                <li>
                  <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Se déconnecter') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>
            </ul>
          </div>
        </li>

        @endguest

        <li>
          <a class="search-toggle" href="search.html">
            <i class="fa fa-search"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>