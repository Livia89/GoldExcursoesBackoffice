
    @include('layouts.header')
    
    
<div id="container-master" @if (!Auth::guest()) class="flex-container" @endif > 
    @if(!Auth::guest())
        <div id='sidebar_menu'>
            @include('layouts.sidebar')
            
        </div>
        @endif
  
        
    <main class=" @guest py-4 @else main_content @endguest" role="main">
        <div  class='container' id="content"> 
            
            @yield('content') 	
        </div>
        @include('layouts.footer')


{{-- @if(!Auth::guest())
<aside id="aside_user" class="hideAside fixed display-none">

        @include('layouts.aside')

</aside> 
@endif  --}}
</main>
  
</div>
     