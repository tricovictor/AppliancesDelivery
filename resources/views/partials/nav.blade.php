<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('home') }}"><i class="fas fa-home fa-2x"></i></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    @guest
    @else
      <ul class="nav navbar-nav">
        <li><a href="{{ route('friend')}}"><i class="fas fa-user-friends fa-2x" aria-hidden="true"></i></a></li>

        <i class="fas fa-user-friends"></i>
        <li><a href="{{ route('cart.show',Auth::user()->id) }}"><i class="fas fa-shopping-cart fa-2x" aria-hidden="true"></i></a></li>

      </ul>
      </ul>
    @endif
    @guest
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="{{ route('register') }}">Register</a>
        </li>

        <li class="dropdown">
          <a href="{{ route('login') }}">Login</a>
          </li>
      </ul>
    @else
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li>
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              {{('Logout')}}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
          </li>
      </ul>
    @endif      

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
