<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" id="csrf_token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript">
      var old = JSON.parse('{!! json_encode( session()->getOldInput() ) !!}');
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                  @if(!Auth::check())
                    <a class="navbar-brand" href="{{ url('/') }}">
                  @else
                    @if(Auth::user()->isAn('admin') || Auth::user()->isAn('secretary'))
                      <a class="navbar-brand" href="{{ url('/') }}">
                    @else
                      <a class="navbar-brand" href="{{ url('/student-groups') }}">
                    @endif
                  @endif
                  @guest
                    {{ config('app.name', 'Laravel') }}
                  @endguest
                  @auth
                      @if(Auth::user()->school)
                          <img src="{{ Auth::user()->school->urlLogo() }}" height="90" alt="{{ Auth::user()->school->name }}">
                      @else
                          It's a test!
                      @endif
                  @endauth
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto nav-pills" id="v-pills-tab" role="tablist">
                    @auth
                      <li class="nav-item">
                          <a class="nav-link" href="/">{{ __('Home') }}</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('student_groups.index') }}">Gerenciar turmas</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('student_transfers.index') }}">{{ __('Students Transfer') }}</a>
                      </li>
                    @endauth
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('grades.student_boletim') }}">Consultar boletim</a>
                            </li>
                        @else
                            <student-transfer-notification-component></student-transfer-notification-component>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        @include('flash::message')
                    </div>
                </div>
            </div>
            @yield('content')
        </main>
        <modals-container></modals-container>
        <v-dialog/>
    </div>
</body>
</html>
