<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
  
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />

 
  
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
     
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="">
            <a href="/dashboard">
              <img src="https://img.icons8.com/material-sharp/24/000000/details.png" style="float:left">
              <p>Dashboard</p>
            </a>
          </li>
          <li class="active">
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
       <h1 style="color:white;text-align:center">Plants</h1>
      </div>
      
      <div class="content">
       
       
        <br>
        <br>
          

            <div class="centerize" style="text-align:center;">
            
                <a href="/addplant" class="btn btn-success" style=""><img src="https://img.icons8.com/material-sharp/24/000000/add.png">add new plant</a>
            </div>
          
            <br>
            <br>
            
            <form method="" action="">
            @foreach ($data as $datas)
          <div class="row">
          
            <img src="{{asset('uploads/plant/'.$datas->image)}}" alt="image" class="rounded-circle form-group" width="30%" height="auto" style="margin-left:35%;">   
                <input type="hidden" name="id" value="{{$datas->id}}"> 
            <br>
            <br>
               <div class="col-sm-12" style="text-align:center;font-size:20px;">
                <br>
                <br>
               <label style="margin-right:3%;"> Plant name :</label>{{$datas->plantname}}
               </div>

               <br>
               <br>

               <div class="col-sm-6" style="text-align:center;font-size:20px;">
                <label style="margin-right:3%;"> Price :</label>{{$datas->price}}
               </div>

               <div class="col-sm-6" style="text-align:center;font-size:20px;">
                <label style="margin-right:3%;"> Amount :</label>{{$datas->amount}}<label style="margin-left:2%;">plants</label>
               </div>

               <br>
               <br>

               <div class="col-sm-6" style="text-align:center;font-size:20px;">
                <label style="margin-right:3%;"> Fertilizer :</label>{{$datas->fertilizer}}
               </div>

               <div class="col-sm-6" style="text-align:center;font-size:20px;">
                <label style="margin-right:3%;"> Sprouting time :</label>{{$datas->sproutingtime}}
               </div>

              
               <div class="col-sm-12" >
                
          
                <div class="centerize" style="text-align:center;">
                  <a href="/edititem/{{$datas->id}}" class="btn btn-info" >edit</a>
                  <a href="/editstock/{{$datas->id}}" class="btn btn-secondary" style="margin-left:5%">update stock</a>
                  <a href="/removeitem/{{$datas->id}}" class="btn btn-danger" style="margin-left:5%" onclick="return confirm('are you sure?')">Remove from list</a>
                  
                </div>
                
              </div>
            
             
            
            
         

          </div>
          <br>
          <br>
          <hr style="width:50%;height:1px;background-color:black;">
          @endforeach
            </form>

        </div>
     
     
    </div>
  </div>
 
  <script src="../assets/js/core/jquery.min.js"></script>
  
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  
  
  
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
 
  
 
</body>

</html>