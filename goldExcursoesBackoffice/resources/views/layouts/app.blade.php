    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/layout/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layout/shared_classes.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layout/sidebar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layout/aside_content.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layout/header.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layout/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layout/general.css') }}" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    </head>
    <body>
        <div class="dark_panel"></div>
        
        <div id="app">
            
            <header class="topo">
        
                <!-- Authentication Links -->
                @guest
                    <div class='flex-container float-right'>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                    @else
                         @include('layouts.header')
                   
                        </div>
                            @endguest

               
                </header>
                @if(!Auth::guest())
                        <div class="sidebar sidebar_mobile">
                        <nav>
                            @include('layouts.sidebar')
                        </nav>
                    </div>
                @endif

                    <main class="@guest py-4 @else main_content @endguest" role="main">
                        @yield('content')
                    </main>

                @if(!Auth::guest())
                <aside id="aside_user" class="hideAside fixed">

                     @include('layouts.aside')

                </aside> 
                @endif
                </div>
            </body>
            </html>




    
            