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
</head>

<body>
  <!--<div class="page-preloader preloader-wrapp">
    <img src="/images/logo.png" alt="">
    <div class="preloader"></div>
  </div>-->

  <nav class="navbar-youplay navbar navbar-default navbar-fixed-top ">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="off-canvas" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index-2.html">
          <img src="/images/logo.png" alt="">
        </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown dropdown-hover ">
            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      Store <span class="caret"></span> <span class="label">games</span>
                    </a>
            <div class="dropdown-menu">
              <ul role="menu">
                <li><a href="store-1.html">Store Style 1</a>
                </li>
                <li><a href="store-2.html">Store Style 2</a>
                </li>
                <li><a href="cart.html">Cart</a>
                </li>
              </ul>
              <ul role="menu">
                <li><a href="store-product-1.html">Product Style 1</a>
                </li>
                <li><a href="store-product-2.html">Product Style 2</a>
                </li>
                <li><a href="checkout.html">Checkout</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="dropdown dropdown-hover ">
            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      Blog <span class="caret"></span> <span class="label">news</span>
                    </a>
            <div class="dropdown-menu">
              <ul role="menu">
                <li><a href="blog-1.html">Blog Style 1</a>
                </li>
                <li><a href="blog-2.html">Blog Style 2</a>
                </li>
                <li><a href="blog-3.html">Blog Style 3</a>
                </li>
              </ul>
              <ul role="menu">
                <li><a href="blog-post-1.html">Blog Post 1</a>
                </li>
                <li><a href="blog-post-2.html">Blog Post 2</a>
                </li>
                <li><a href="blog-post-3.html">Blog Post 3</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="dropdown dropdown-hover ">
            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      Features <span class="caret"></span> <span class="label">full list</span>
                    </a>
            <div class="dropdown-menu">
              <ul role="menu">
                <li class="dropdown dropdown-submenu pull-left ">
                  <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">User</a>
                  <div class="dropdown-menu">
                    <ul role="menu">
                      <li><a href="user-activity.html">Activity</a>
                      </li>
                      <li><a href="user-profile.html">Profile</a>
                      </li>
                      <li><a href="user-messages.html">Messages</a>
                      </li>
                      <li><a href="user-messages-compose.html">Messages Compose</a>
                      </li>
                      <li><a href="user-settings.html">Settings</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li><a href="forums.html">Forums</a>
                </li>
                <li><a href="forums-topics.html">Forums Topics</a>
                </li>
                <li><a href="forums-single-topic.html">Single Topic</a>
                </li>
                <li><a href="matches-list.html">Matches List</a>
                </li>
                <li><a href="match.html">Match</a>
                </li>
                <li><a href="match-2.html">Match with Maps</a>
                </li>
              </ul>
              <ul role="menu">
                <li><a href="widgets.html">Widgets <span class="badge bg-default">New</span></a>
                </li>
                <li><a href="components.html">Components</a>
                </li>
                <li><a href="coming-soon.html">Coming Soon</a>
                </li>
                <li><a href="contact.html">Contact Us</a>
                </li>
                <li><a href="search.html">Search</a>
                </li>
                <li><a href="login.html">Login</a>
                </li>
                <li><a href="404.html">404</a>
                </li>
                <li><a href="blank.html">Blank</a>
                </li>
              </ul>
            </div>
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