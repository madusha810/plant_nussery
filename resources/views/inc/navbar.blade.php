<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#">Green gaurdian plantnussery</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/home" style="color:white;font-size:20px;" >Home</a></li>
          <li><a href="/userdetail{{Auth::user()->id}}" style="color:white;font-size:20px;" >User profile</a></li>
          <li><a href="/employee" style="color:white;font-size:20px;" >Application</a></li>
          <li><a href="/supplier" style="color:white;font-size:20px;" >Supply</a></li>
          <li><a href="/orderproduct" style="color:white;font-size:20px;" >Order product</a></li>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <img src="{{asset('uploads/user/'.Auth::user()->image)}}" alt="image" class="rounded-circle" width="20%" height="auto" style="">
              <ul class="dropdown-menu" role="menu">
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
        </ul>
      </div>
    </div>
  </nav>