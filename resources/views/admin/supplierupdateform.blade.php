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
        <h1>Supplier Details</h1>
        <br>
        @foreach ($errors->all() as $error)

        <div class="alert alert-denger" role="alert"> 
            {{ $error }}

        </div>
            
        @endforeach
        <form action="" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}

            
           
            

           <div class="form-group">
            <label><strong>Name:</strong></label>
            <input type="text" name="name" class="form-control" value="{{$suppliers->name}}" disabled>
            </div>
            <div class="form-group">
            <label><strong>Email:</strong></label>
            <input type="email" name="email" class="form-control" value="{{$suppliers->email}}" disabled>
            </div>
            <div class="form-group">
            <label><strong>Phone NO:</strong></label>
            <input type="text" name="pno" class="form-control" value="{{$suppliers->pno}}" disabled>
            </div>
            <div class="form-group">
            <label><strong>Address:</strong></label>
            <input type="text" name="address" class="form-control" value="{{$suppliers->address}}" disabled>
            </div>
            <div class="form-group">
            </div>
            <div class="form-group">
            <label><strong>Plantname:</strong></label>
            <input type="text" name="plantname" class="form-control" value="{{$suppliers->plantname}}" disabled>
            </div>
            <div class="form-group">
            <label><strong>Plantprice:</strong></label>
            <input type="text" name="plantprice" class="form-control" value="{{$suppliers->plantprice}}" disabled>
            </div>
            <div class="form-group">
            <label><strong>Quantity:</strong></label>
            <input type="text" name="quantity" class="form-control" value="{{$suppliers->quantity}}" disabled>
            </div>
            <div class="form-group">
            <lable><strong>Image: </strong> </lable>  <br> <br>
            <img src="{{ asset('uploads/supplier/' . $suppliers->image) }}"width="200px;" heigth="200px;" alt="Image">
            </div>

          
           
        </form>
    </div>
</body>
</html>