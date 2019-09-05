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
        <script src="{{ asset('js/sidebar.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/layout/app.css?' . date('YmdHis')) }}" rel="stylesheet"> 
        <link href="{{ asset('css/layout/sidebar.css?' . date('YmdHis')) }}" rel="stylesheet">
        <link href="{{ asset('css/layout/aside_content.css?' . date('YmdHis')) }}" rel="stylesheet">
        <link href="{{ asset('css/layout/header.css?' . date('YmdHis')) }}" rel="stylesheet">
        <link href="{{ asset('css/layout/main.css?' . date('YmdHis')) }}" rel="stylesheet">
        <link href="{{ asset('css/layout/general.css?' . date('YmdHis')) }}" rel="stylesheet">
        <link href="{{ asset('css/layout/shared_classes.css? ' . date('YmdHis')) }}" rel="stylesheet">
        <link href="{{ asset('css/layout/media_querys.css? ' . date('YmdHis')) }}" rel="stylesheet">
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

               <div id="container-master" class="flex-container"> 
                </header>
                @if(!Auth::guest())
                        <div id='sidebar_menu'>
                            @include('layouts.sidebar')
                        </nav>
                    </div>
                @endif
                
                    <main class="@guest py-4 @else main_content @endguest" role="main">
                        @yield('content')
                    </main>

                @if(!Auth::guest())
                <aside id="aside_user" class="hideAside fixed display-none">

                     @include('layouts.aside')

                </aside> 
                @endif
                </div>

            </div>
            </body>
            </html>




    
            