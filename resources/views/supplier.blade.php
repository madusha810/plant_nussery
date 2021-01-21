@extends('layouts.formlayout')

@section('content')

    <div class="container">
    <div class="jambotron"></div>

    <h1>Register Suppliers</h1>

        
        <div class="my-5"></div>
        @foreach ($errors->all() as $error)

        <div class="alert alert-danger" role="alert"> 
            {{ $error }}

        </div>
            
        @endforeach 

        @include('inc.messages')
        <form action="{{ route('addimage') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <div class="form-group">
            <label><strong>Name:</strong></label>
            <input type="text" name="name" class="form-control" placeholder="Enter Your FullName">
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
            <label><strong>Plantname:</strong></label>
            <input type="text" name="plantname" class="form-control" placeholder="Enter Your Plantname">
            </div>
            <div class="form-group">
            <label><strong>Plantprice:</strong></label>
            <input type="text" name="plantprice" class="form-control" placeholder="Enter Your Plantprice">
            </div>
            <div class="form-group">
            <label><strong>Quantity:</strong></label>
            <input type="number" name="quantity" class="form-control" placeholder="Enter Your Quantity">
            </div>
            <div class="form-group">
            <lable><strong>Upload Your Plant Photos: </strong> </lable>  <br> <br>
            <input type="file" name="image" class="">
            </div>

            <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">submit</button>
            </div>
            
        </form>
    </div>
    @endsection