@section('navbar')
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @guest
        @if (Route::has('login'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login', ['language'=>app()->getLocale()]) }}">{{ __('Login') }}</a>
        </li>
        @endif
        @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register', ['language'=>app()->getLocale()]) }}">{{ __('Register')
                }}</a>
        </li>
        @endif
        @else
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                @if (Auth::user()->unreadNotifications()->count() > 0)
                <span class="badge badge-warning navbar-badge">{{Auth::user()->unreadNotifications()->count()}}</span>
                @endif

            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">{{Auth::user()->unreadNotifications()->count()}}
                    Notifications</span>
               @foreach (Auth::user()->unreadNotifications as $notification)
                <div class="dropdown-divider"></div>
                <a href="{{route('show_demande' , $notification->data['demande']['id'])}}" class="dropdown-item">
                   Une demande sur la piece:
                   <strong>{{$notification->data['demande']['pieces'][0]['lib_piece']}}</strong>
                   a été ajoutée!
                </a>
               @endforeach

            </div>
        </li>
        <!-- Full screen -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre> <i class="fa fa-language"
                    style="padding-right: 10%"></i>
                {{ strtoupper(App::getLocale()) }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                {{-- @if (count(Route::current()->parameters()) <= 1 ) <a
                    href="{{ route(Route::currentRouteName(), 'ar') }}" class="dropdown-item">Arabe</a>
                    <a href="{{ route(Route::currentRouteName(), 'fr') }}" class="dropdown-item">Français</a>
                    @else
                    @php
                    // dd(json_encode(Route::current()->parameters));
                    echo '<a
                        href="{{ route(Route::currentRouteName(), '.json_encode(Route::current()->parameters).') }}"
                        class="dropdown-item">Arabe</a>';
                    echo '<a
                        href="{{ route(Route::currentRouteName(), '.json_encode(Route::current()->parameters).') }}"
                        class="dropdown-item">Français</a>';
                    @endphp
                    @endif --}}


            </div>
        </li>
        @endguest

    </ul>
</nav>
<!-- /.navbar -->
@endsection
