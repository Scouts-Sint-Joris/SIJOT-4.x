<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- Meta csrf token --}}

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <a class="nav-link" href="">
                            <i class="fas fa-map-marker-alt"></i> Takken
                        </a>

                        <a class="nav-link" href="{{ route('verhuur.index') }}">
                            <i class="fa fa-home"></i> Verhuur
                        </a>

                        <a class="nav-link" href="">
                            <i class="fa fa-user-plus"></i> Lid worden
                        </a>

                        <a class="nav-link" href="">
                            <i class="fa fa-camera-retro"></i> Foto's
                        </a>

                        <a class="nav-link" href="">
                            <i class="fa fa-envelope"></i> Contact
                        </a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if (auth()->check())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $currentUser->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home')}}">
                                        <i class="fas fa-fw fa-cog"></i> Beheer
                                    </a>

                                    <a class="dropdown-item" href="">
                                        <i class="fas fa-fw fa-wrench"></i> Instellingen
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-fw fa-sign-out-alt"></i> Afmelden
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf {{-- Form field protection --}}
                                    </form>
                                </div>
                            </li>
                        @else 
                            <a class="nav-link" href="{{ route('login') }}" target="_blank">
                                <i class="fa fa-sign-in-alt"></i> Aanmelden
                            </a>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h5>Scouts en Gidsen Sint-Joris, Turnhout</h5>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ route('disclaimer.index') }}">Disclaimer</a></li>
                                <li><a href="{{ route('disclaimer.privacy') }}">Privacy Statement</a></li>
                                <li><a href="{{ route('login') }}">Aanmelden</a></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li><a href="https://www.hopper.be/winkel">Hopper Winkel</a></li>
                                <li><a href="https://www.hopper.be/jeugdverblijf">Hopper Jeugdverblijven</a></li>
                                <li><a href="https://www.scoutsengidsenvlaanderen.be/">Scouts en Gidsen Vlaanderen</a></li>
                                <li><a href="http://www.gouwkempen.be/">Gouw Kempen</a></li>
                            </ul>
                        </div>
                    </div>
                    <ul class="nav">
                        <li class="nav-item"><a href="https://www.facebook.com/sintjoristurnhout/" class="nav-link social-facebook pl-0"><i class="fab fa-facebook fa-lg"></i></a></li>
                        <li class="nav-item"><a href="" class="nav-link social-youtube"><i class="fab fa-youtube fa-lg"></i></a></li>
                        <li class="nav-item"><a href="" class="nav-link social-twitter"><i class="fab fa-twitter fa-lg"></i></a></li>
                        <li class="nav-item"><a href="https://github.com/Scouts-Sint-Joris" class="nav-link social-github"><i class="fab fa-github fa-lg"></i></a></li>
                    </ul>
                    <br>
                </div>
                <div class="col-md-2">
                    <h5 class="text-md-right">Contacteer ons</h5>
                    <hr>
                </div>
                <div class="col-md-5">
                    <form method="POST" action="">
                        @csrf {{-- Form field protection --}}

                        <fieldset class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Uw email adres">
                        </fieldset>
                        <fieldset class="form-group">
                            <textarea class="form-control" id="exampleMessage" placeholder="Bericht"></textarea>
                        </fieldset>
                        <fieldset class="form-group text-xs-right">
                            <button type="button" class="btn btn-secondary-outline">Verstuur</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.12';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
