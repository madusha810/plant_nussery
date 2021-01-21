<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!-- CSS Files -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="../assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="../assets/demo/demo.css" rel="stylesheet" />

<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
  font-family: Arial, Helvetica, sans-serif;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

  <div class="sidebar" data-color="blue">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
   
    <div class="sidebar-wrapper" id="sidebar-wrapper">
      <ul class="nav">
        <li class="active ">
          <a href="/dashboard">
            <img src="https://img.icons8.com/material-sharp/24/000000/details.png" style="float:left">
            <p>Dashboard</p>
          </a>
        </li>
        <li>
          <a href="/plant">
            <img src="https://img.icons8.com/windows/32/000000/potted-plant.png" style="float:left">
            <p>Plant</p>
          </a>
        </li>
        <li>
          <a href="/manage">
          <img src="https://img.icons8.com/windows/32/000000/request-service.png" style="float:left"> 
            <p>Manage website</p>
          </a>
        </li>
        <li>
          <a href="/advertiesment">
          <img src="https://img.icons8.com/ios-filled/50/000000/post-ads.png" style="float:left;width:15%;">
            <p>advertiesment</p>
          </a>
        </li>
        <li>
          <a href="/employeepage">
          <img src="https://img.icons8.com/material-sharp/24/000000/find-matching-job.png" style="float:left;">
            <p>Applications</p>
          </a>
        </li>
        <li>
            <a href="/supplierpage">
            <img src="https://img.icons8.com/material-sharp/24/000000/supplier.png" style="float:left;width:10%;">
              <p>Suppliers</p>
            </a>
          </li>

          <li>
            <a href="/admin/orders">
            <img src="https://img.icons8.com/material-sharp/24/000000/supplier.png" style="float:left;width:10%;">
              <p>Orders</p>
            </a>
          </li>

          <li>
            <a href="/admin/delivery">
            <img src="https://img.icons8.com/material-sharp/24/000000/supplier.png" style="float:left;width:10%;">
              <p>Delivery Prices</p>
            </a>
          </li>
        <li>
          <a href="./typography.html">
          
            <p></p>
          </a>
        </li>
        
      </ul>
    </div>
  </div>
  <div class="main-panel" id="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <div class="navbar-toggle">
            <button type="button" class="navbar-toggler">
              <span class="navbar-toggler-bar bar1"></span>
              <span class="navbar-toggler-bar bar2"></span>
              <span class="navbar-toggler-bar bar3"></span>
            </button>
          </div>
         
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar navbar-kebab"></span>
          <span class="navbar-toggler-bar navbar-kebab"></span>
          <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
          
          <ul class="navbar-nav">
            
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} <span class=""></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                  <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();" style="color:black;margin-left:20px;">
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
    <!-- End Navbar -->
    <div class="panel-header panel-header-sm">
     <h1 style="color:white;text-align:center">User list</h1>
    </div>

<div class="container">
    <br>
    <br>
  <form action="">
    
    <img src="{{asset('uploads/user/'.$user->image)}}" alt="image" class="rounded-circle form-group" width="30%" height="auto" style="margin-left:45%;">
    <br>
    <br>
    <div class="row">
      <div class="col-25">
        <label for="">Name :</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="firstname" value="{{$user->name}}" style="border:none;text-align:center;font-size:20px;background-color:tansparent;" disabled>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Email :</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="lastname" value="{{$user->email}}" style="border:none;text-align:center;font-size:20px;background-color:tansparent;" disabled>
        <hr>
      </div>
    </div>

    <div class="row">
        <div class="col-25">
          <label for="lname">Contact :</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="lastname" value="{{$user->contact}}" style="border:none;text-align:center;font-size:20px;background-color:tansparent;" disabled>
          <hr>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Address :</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="lastname" value="{{$user->address}}" style="border:none;text-align:center;font-size:20px;background-color:tansparent;" disabled>
          <hr>
        </div>
      </div>
  
      <script src="../assets/js/core/jquery.min.js"></script>
  
      <script src="../assets/js/core/bootstrap.min.js"></script>
      <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
      
      
      
      <script src="../assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
</body>
</html>