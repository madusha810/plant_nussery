
@extends('layouts.formlayout')

@section('content')
    

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
        <br>
        <br>
       </div>

      
       <div class="col-sm-12" >
        
  
        <div class="centerize" style="text-align:center;">
          
          <a href="/orderproduct/{{ $datas->id }}" class="btn btn-success" style="">order now</a>
         
          
        </div>
        
      </div>
    
     
    
    
 

  </div>
  <br>
  <br>
  <hr style="width:50%;height:1px;background-color:black;">
  @endforeach
    </form>


@endsection