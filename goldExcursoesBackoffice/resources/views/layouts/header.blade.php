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
