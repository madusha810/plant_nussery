<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>employee updateform</title>
</head>
<body background="../images/p3.jpg">
    <div class="container">
    <div class="jambotron"></div>
         <br>
        <h1>Update Employee Application</h1>
        <br>
        @foreach ($errors->all() as $error)

        <div class="alert alert-denger" role="alert"> 
            {{ $error }}

        </div>
            
        @endforeach
        <form action="/updateimage/{{ $employees->id }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}

           <input type="hidden" name = "id" id ="id" value="{{ $employees->id }}">

           <div class="form-group">
            <label><strong>Name:</strong></label>
            <input type="text" name="name" class="form-control" placeholder="Enter Your FullName">
            </div>
            <div class="form-group">
            <label><strong>Birth Day:</strong></label>
            <input type="date" name="dob" class="form-control" placeholder="Enter Your Birthday">
            </div>
            <div class="form-group">
            <label><strong>Email:</strong></label>
            <input type="email" name="email" class="form-control" placeholder="Enter Your Email Address">
            </div>
            <div class="form-group">
            <label><strong>Phone NO:</strong></label>
            <input type="text" name="pno" class="form-control" placeholder="Enter Your phone number">
            </div>
            <div class="form-group">
            <label><strong>Address:</strong></label>
            <input type="text" name="address" class="form-control" placeholder="Enter Your Address">
            </div>
            <div class="form-group">
            <label><strong>Gender:</strong></label>
            <div class="row">
            <div class="col-md-1">
               <lable><strong>male - </strong></lable>  
            </div>
            <div class="col-md-1">
            <input type="radio" name="gender" class="" placeholder="male">
            </div>
            <div class="col-md-1">
               <lable><strong>female - </strong></lable>  
            </div>
            <div class="col-md-1">
                <input type="radio" name="gender" class="" placeholder="female">
            </div>
            <div class="col-md-8"></div>
            </div>
            </div>
            <div class="form-group">
            <label><strong>Experience:</strong></label>
            <input type="textarea" name="experience" class="form-control" placeholder="Enter Your Experience">
            </div>
            
            
            <div class="form-group">
            <lable><strong>Upload Your Photos: </strong> </lable>  <br> <br>
            <input type="file" name="image" class="">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Update Data </button>
        </form>
    </div>
</body>
</html>