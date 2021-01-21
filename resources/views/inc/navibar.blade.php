<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Green Gaurdian Plant Nursery</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/employee">Application</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/supplier">Supply</a>
        </li>
        <li class="nav-item">
          @if (Auth::guest())
            <a class="nav-link" href="/viewproducts">Order product</a>        
          @else
            <a class="nav-link" href="/home">Order product</a>
          @endif
        </li>
      </ul>
      <span class="navbar-text">                       
        @if (Auth::guest()) 
          <a href="{{ route('login') }}">Login</a> &nbsp;&nbsp;
          <a href="{{ route('register') }}">Register</a>
        @else
          <!-- authenticated-------->
          <a href="/order/view/notconfirmed"><i class="fa fa-shopping-cart" style="font-size:25px"></i></a> &nbsp;&nbsp;
          <img src="{{asset('uploads/user/'.Auth::user()->image)}}" alt="image" class="rounded-circle" width="auto" height="28vh" style="">&nbsp;
          <a href="/userdetail{{Auth::user()->id}}">{{ Auth::user()->name }}</a> &nbsp;
          <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
          Logout
          </a> 
          <!-- authenticated end-------->
    
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        @endif
      </span>
    </div>
  </nav>