
<nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                      @if(Session::has('site_title'))
                          {{Session::get('site_title')}}
                      @else 
                        {{ config('app.name', 'Laravel') }}
                      @endif
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                  <ul class="nav navbar-nav">
                      <li><a href="/">Home</a></li>
                      <li><a href="/about">About</a></li>
                      {{-- <li><a href="/services">Services</a></li> --}}
                      <li><a href="/posts">Blog</a></li>
                      @if(Auth::user()) 
                        @if(Auth::user()->user_role!=3) 
                            <li><a href="/category">Categories</a></li>
                             <li><a href="/tag">Tags</a></li>
                        @endif 
                      @endif
                      @if(Auth::user()) 
                        @if(Auth::user()->user_role==1) 
                            <li><a href="/pending">Pending Confirmation</a></li>
                            <li><a href="/access">Access Level</a></li>
                            <li><a href="/settings">Settings</a></li>
                        @endif 
                      @endif
                  </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="/dashboard">Dashboard</a></li>
                                  @if(Auth::user()) 
                                    @if(Auth::user()->user_role!=3) 
                                        <li><a href="/posts/create">Create Post</a></li>
                                    @endif 
                                  @endif
                                  <li><a href="/profile">Profile Settings</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>