<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', "Gold Excursões")</title>


 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!-- Styles -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/layout/app.css?' . date('YmdHis')) }}" rel="stylesheet"> 
    <link href="{{ asset('css/layout/sidebar.css?' . date('YmdHis')) }}" rel="stylesheet">
    <link href="{{ asset('css/layout/aside_content.css?' . date('YmdHis')) }}" rel="stylesheet">
    <link href="{{ asset('css/layout/header.css?' . date('YmdHis')) }}" rel="stylesheet">
    <link href="{{ asset('css/layout/main.css?' . date('YmdHis')) }}" rel="stylesheet">
    <link href="{{ asset('css/layout/general.css?' . date('YmdHis')) }}" rel="stylesheet">
    <link href="{{ asset('css/layout/shared_classes.css? ' . date('YmdHis')) }}" rel="stylesheet">
    <link href="{{ asset('css/layout/media_querys.css? ' . date('YmdHis')) }}" rel="stylesheet">


</head>
<body>
    <div class="dark_panel"></div>
  
<header class="topo">

	<div class="float-left flex-container">

	

		<figure class="logo">

            <a href="#"><img src="{{asset('images/logos/logoGE.png')}}" alt="logo" width="149px" height="50px"></a>


		</figure>

		
        @if(Auth::check())
            
            <div data-side="left" class="btn_menu margin-side-10">
                
                <a href="#"><span class="btn"></span></a>
                
            </div>
        @endif

		

		<ul class="display-none">

			<li><a href="#" class="margin-side-20">Dashboard</a></li>

			<li><a href="#" class="margin-side-20">Users</a></li>

			<li><a href="#" class="margin-side-20">Settings</a></li>

		</ul>

	</div>

	

	<div class="float-right flex-container">

    @guest
    
        <li class="nav-item">
             {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
      
    
    @else
   	

		
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
    
            
		<figure class="img_user">
            <a href="{{url('/')}}" title="{{ config('app.name', 'Laravel') }}"><img src="{{ asset('images/avatar/avatar.png') }}" ></a>

		</figure>

        <div data-side="right" style='visibility: hidden' class="btn_menu margin-side-20">

            <a href="#"><span class="btn"></span></a>

        </div>


        @endguest 

		

	</div>

</header>



