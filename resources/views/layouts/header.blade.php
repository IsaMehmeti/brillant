<nav class="navbar navbar-expand fixed-top be-top-header">
  <div class="container-fluid">
    <div class="be-navbar-header">
      <a href="/"> <img src="/img/logo-xx.png" style="width: 80%"> </a>
    </div>
   {{--  <div class="page-title"><span>Dashboard</span></div> --}}
    @if(Auth::check())
    <div class="be-right-navbar">
      <ul class="nav navbar-nav float-right be-user-nav">
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"><img src="/img/avatar.png" alt="Avatar"><span class="user-name">{{Auth::user()->name}}</span></a>
          <div class="dropdown-menu" role="menu">
            <div class="user-info">
              <div class="user-name">{{Auth::user()->name}} </div>
            </div><a class="dropdown-item" href="{{route('user.edit')}}"><span class="icon mdi mdi-face"></span>Profili</a>

            <a class="dropdown-item" href="{{ url('/logout') }}"><span class="icon mdi mdi-power"></span>Logout</a>
          </div>
        </li>
      </ul>

    </div>
    @else
      <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>

                           {{--  @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
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
                        @endguest
                    </ul>
      </div>
    @endif
  </div>
</nav>
