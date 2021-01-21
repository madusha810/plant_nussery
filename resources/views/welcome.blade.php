@extends('layouts.formlayout')

@section('content')
    <br>
<!-- slider content----------------------------------------------------->
<div class="row">
  <div class="col-sm-12">
    

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{asset('uploads/imageslder/1588334538.jpg')}}" alt="First slide">
        </div>
        @foreach($data as $datas)

    
    <img src="" width="600" height="400" alt="image" style="width:100%;height:auto">
    <div class="carousel-item ">
      <img class="d-block w-100" src="{{asset('uploads/imageslder/'.$datas->image)}}" alt="First slide">
    </div>

    @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <script>$('.carousel').carousel({
      interval: 2000
    })</script>
  </div>
</div>
<!-------***-------------->



<div class="row">
  <div class="container">

    <!-- -------about 1 ------------->
    <div class="row">
      <div class="col-sm-12">
        <br>
        <h2><strong>GREEN GUARDIAN PLANT NERSERY</strong></h2>
        <br>

        <div class="row" style="background-color:#ebeff7;padding:3vh;">
          <div class="col-sm-4">
            <span class="services" style="font-size:1.2em"><i class="fa fa-gift" style="font-size:25px"></i> &nbsp;&nbsp; ISLAND-WIDE DELIVERY</span>
          </div>
          <div class="col-sm-4">
            <span class="services" style="font-size:1.2em"><i class="fa fa-phone" style="font-size:25px"></i> &nbsp;&nbsp; HOT LINE: <small>+94 55 565 5656</small></span>
         
          </div>
          <div class="col-sm-4">
            <span class="services" style="font-size:1.2em"><i class="fa fa-shopping-cart" style="font-size:25px"></i> &nbsp;&nbsp; ORDER CUSTOMIZING</span>
         
          </div>
        </div>

        <br>
        @foreach($info as $infos)
        
        <p class="about1" style="font-size:1.3em">{{$infos->firstparagraph}}</p>
        <br>
         @endforeach
      </div>
    </div>
    <!---***----------->



    <!--------add-------------->
    <div class="row">
      <div class="col-sm-12">
        <div class="w3-content w3-section" style="max-width:500px">
          <p>Advertiement:</p>
          @foreach($add as $adds)
        
          <a href="{{$adds->url}}"><img src="{{asset('uploads/advertiement/'.$adds->image)}}" alt="image" class="newSlides" style="height:40vh;width:auto"></a>
          @endforeach
        </div>
      </div>
    </div>
    <!--***---------------->



    <!-- -------about 2 ------------->
    <div class="row">
      <div class="col-sm-12">
        <br>
        @foreach($info as $infos)
        <p class="about1" style="font-size:1.3em">{{$infos->secondparagraph}}</p>
        <br>
        @endforeach
      </div>
    </div>
    <!---***----------->


  </div>
</div>
        

<script>
  var myIndex = 0;
  carousel();
  
  function carousel() {
    var i;
    var x = document.getElementsByClassName("newSlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 3000); // Change image every 2 seconds
  }
  </script>


@endsection
