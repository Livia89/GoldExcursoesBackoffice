<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', "Gold Excursões")</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/sidebar.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

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
    
            <div class="float-left flex-container">
    <figure class="logo">

        <a href="#"><img src="{{asset('images/logos/logoGE.png')}}" alt="logo" width="149px" height="50px"></a>

    </figure>
    <div data-side="left" class="btn_menu margin-side-10">

    <a href="#"><span class="btn"></span></a>

    </div>

    <ul class="display-none">

        <li><a href="#" class="margin-side-20">Dashboard</a></li>

        <li><a href="#" class="margin-side-20">Users</a></li>

        <li><a href="#" class="margin-side-20">Settings</a></li>

    </ul>

</div>

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
          
    
       

<div class="float-right flex-container">
<li class="dropdown">
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
    <ul class="display-none">

        <li><a href="#" class="margin-side-20"><i class="far fa-bell"></i></a></li>

        <li><a href="#" class="margin-side-20"><i class="fas fa-list-ul"></i></a></li>

        <li><a href="#" class="margin-side-20"><i class="fas fa-map-marker-alt"></i></a></li>

        </ul>

        <figure class="img_user">

             <a href="{{url('/')}}" title="{{ config('app.name', 'Laravel') }}"><img src="{{ asset('images/avatar/avatar.png') }}" ></a>

        </figure>
        <div data-side="right" class="btn_menu margin-side-20">

           <a href="#"><span class="btn"></span></a>

        </div>
    </div>
</div>
@endguest
