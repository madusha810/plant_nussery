<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>employee form</title>
</head>

<body background="../images/p4.jpg">

    <div class="container">
    <div class="jambotron"></div>

    <h1>Apply Employees</h1>

        
        
            
    
 
       
        <form action="" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
          

            <div class="form-group">
            <label><strong>Name:</strong></label>
            <input type="text" name="name" class="form-control" value="{{$employee->name}}" disabled>
            </div>
            <div class="form-group">
            <label><strong>Birthday:</strong></label>
            <input type="date" name="dob" class="form-control" value="{{$employee->dob}}" disabled>
            </div>
            <div class="form-group">
            <label><strong>Email:</strong></label>
            <input type="email" name="email" class="form-control" value="{{$employee->email}}" disabled>
            </div>
            <div class="form-group">
            <label><strong>Phone NO:</strong></label>
            <input type="text" name="pno" class="form-control" value="{{$employee->pno}}" disabled>
            </div>
            <div class="form-group">
            <label><strong>Address:</strong></label>
            <input type="text" name="address" class="form-control" value="{{$employee->address}}" disabled>
            </div>
            <div class="form-group">
            <label><strong>Gender:</strong></label>
            <input type="textarea" name="gender" class="form-control" value="{{$employee->gender}}" disabled>
            </div>
            <div class="form-group">
            <label><strong>Experience:</strong></label>
            <input type="textarea" name="experience" class="form-control" value="{{$employee->experience}}" disabled>
            </div>
            
            
            <div class="form-group">
            <lable><strong>Image : </strong> </lable>  <br> <br>
            <img src="{{ asset('uploads/employee/' . $employee->image) }}"width="200px;" heigth="200px;" alt="Image">
            </div>

           
          
        </form>
    </div>
</body>
</html>