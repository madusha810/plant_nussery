@extends('layouts.formlayout')

@section('content')

    <div class="container">
    <div class="jambotron"></div>

    <h1>Apply Jobs</h1>

        
        <div class="my-5"></div>
        @foreach ($errors->all() as $error)

        <div class="alert alert-danger" role="alert"> 
            {{ $error }}

        </div>
            
        @endforeach 

     
        <form action="/addimage" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <div class="form-group">
            <label><strong>Name:</strong></label>
            <input type="text" name="name" class="form-control" placeholder="Enter Your FullName">
            </div>
            <div class="form-group">
            <label><strong>Birthday:</strong></label>
            <input type="date" name="dob" class="form-control" placeholder="Enter Ypur Birthday">
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
               <lable><strong>male</strong></lable>  
            </div>
            <div class="col-md-1">
            <input type="radio" name="gender" class="" value="male" placeholder="male">
            </div>
            <div class="col-md-1">
               <lable><strong>female</strong></lable>  
            </div>
            <div class="col-md-1">
                <input type="radio" name="gender" class="" value="female" placeholder="female">
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

            <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Save Data </button>
            </div>
            
        </form>
    </div>
@endsection