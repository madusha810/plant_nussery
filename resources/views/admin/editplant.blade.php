<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
  
  input[type=email], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
  }

  input[type=number], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
  }
  
  
  input[type=file], select, textarea {
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
    font-size: 15px;
  }
  
  input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    
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
    
    <div class="container">
        <br>
        <br>
        
       
      <form action="/edititemadmin" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}

        <input type="hidden" name="id" value="{{$edititem->id}}">
    
        <div class="centerize" style="text-align:center;">
        <img src="{{asset('uploads/plant/'.$edititem->image)}}" alt="image" class="rounded-circle form-group" width="30%" height="auto" style="">
        </div>
        <br>
        <br>
        
        
    
        <div class="row form-group{{ $errors->has('plantname') ? ' has-error' : '' }}" >
          <div class="col-25">
            <label for="">Plant name :</label>
          </div>
    
          <div class="col-75">
            <input type="text" id="fname" name="plantname" value="{{$edititem->plantname}}" disabled> 
            
    
            
            @if ($errors->has('plantname'))
            <span class="alert alert-danger" role="alert">
                <strong>{{ $errors->first('plantname') }}</strong>
            </span>
            @endif
            
           
          </div>
        </div>
    
    
        <div class="row form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            <div class="col-25">
              <label for="">Price of one unit :</label>
            </div>
            
            <div class="col-75">
              <input type="number" id="fname" name="price" value="{{$edititem->price}}" >
      
              
              @if ($errors->has('price'))
              <span class="alert alert-danger" role="alert">
                  <strong>{{ $errors->first('price') }}</strong>
              </span>
              @endif
              <hr>
            </div>
          </div>


          <div class="row form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
            <div class="col-25">
              <label for="">Amount :</label>
            </div>
            
            <div class="col-75">
              <input type="number" id="fname" name="amount" value="{{$edititem->amount}}" disabled>
      
              
              @if ($errors->has('amount'))
              <span class="alert alert-danger" role="alert">
                  <strong>{{ $errors->first('amount') }}</strong>
              </span>
              @endif
              <hr>
            </div>
          </div>
    
    
          <div class="row form-group{{ $errors->has('image') ? ' has-error' : '' }}">
            <div class="col-25">
              <label for="">Image :</label>
            </div>
            
            <div class="col-75">
              <input type="file" id="fname" name="image" value="" >
      
              
              @if ($errors->has('image'))
              <span class="alert alert-danger" role="alert">
                  <strong>{{ $errors->first('image') }}</strong>
              </span>
              @endif
              <hr>
            </div>
          </div>
    
          <div class="row form-group{{ $errors->has('fertilizer') ? ' has-error' : '' }}">
            <div class="col-25">
              <label for="">Type of fertilizer :</label>
            </div>
            
            <div class="col-75">
              <input type="text" id="fname" name="fertilizer" value="{{$edititem->fertilizer}}" >
      
              
              @if ($errors->has('fertilizer'))
              <span class="alert alert-danger" role="alert">
                  <strong>{{ $errors->first('fertilizer') }}</strong>
              </span>
              @endif
              <hr>
            </div>
          </div>
    
          <div class="row form-group{{ $errors->has('sproutingtime') ? ' has-error' : '' }}" >
            <div class="col-25">
              <label for="">Sprouting time :</label>
            </div>
      
            <div class="col-75">
              <input type="text" id="fname" name="sproutingtime" value="{{$edititem->sproutingtime}}"> 
              
      
              
              @if ($errors->has('sproutingtime'))
              <span class="alert alert-danger" role="alert">
                  <strong>{{ $errors->first('sproutingtime') }}</strong>
              </span>
              @endif
              
             
            </div>
          </div>
          <br>
          <br>
          
    
          <div class="row form-group" >
            <div class="col-25">
              
            </div>
      
            <div class="col-75">
              <button class="btn btn-primary" onclick="return confirm('are you sure want to update?')">update</a>
             <button type="reset" class="btn btn-danger" style="margin-left:3%;">
                Clear
             </button>
              
             
            </div>
          </div>
    
    
    
        
      </form>
    
    </div>
    


</body>
</html>









