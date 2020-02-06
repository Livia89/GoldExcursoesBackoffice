
           

                @include('layouts.header')

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




    
            