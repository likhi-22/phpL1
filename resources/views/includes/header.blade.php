<nav class ="navbar">
    <div>
      @auth
      <div class="container-fluid">
      </div>
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::user()->role_id==1)
          <li><a class="active" href="{{route('adminHome')}}">Dashboard</a></li>
          <li><a href="{{route('users')}}">Users</a>
        @elseif (Auth::user()->role_id==2)
          <li><a class="active" href="{{route('userHome')}}">Dashboard</a></li>
          <li><a href="{{route('profile')}}">Profile</a></li>
        @endif
          <li><a href="{{route('logout')}}"><span class="glyphicon glyphicon-log-out"> Logout</a></li>
    </ul>
      @else
      <ul class="nav navbar-nav navbar-right">
          <li><a href="{{url('register')}}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
          <li><a href="{{url('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
      @endauth
    </div>
  </nav>