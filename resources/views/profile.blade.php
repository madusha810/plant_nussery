@extends('layouts.formlayout')
@section('content')
    
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <a href="/order/view/confirmed" class="btn btn-primary" style="float:right">My Orders</a>
    </div>
  </div>
</div>



<div class="container">
  
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-6">
                        <center><img src="{{asset('uploads/user/'.$data->image)}}" alt="image" class="img-thumbnail" ></center>
                        <br><br>
                        <h2><center>{{$data->name}}</center></h2>
                    </div>
                    <div class="col-sm-6">
                        <form action="/userinfo" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                        
                            <input type="hidden" name="id" value="{{$data->id}}">
                        
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" >  
                                <label for="">Name</label>  
                                <input type="text" id="fname" name="firstname" value="{{$data->name}}"  class="form-control" disabled>       
                                @if ($errors->has('name'))
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                              
                            </div>
                        
                        
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">  
                                  <label for="">Email</label>
                                  <input type="email" id="fname" name="email" class="form-control" value="{{$data->email}}" >      
                                  @if ($errors->has('email'))
                                  <br>
                                  <span class="alert alert-danger" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                                  @endif
                              </div>
                        
                              <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}"> 
                                  <label for="">Contact</label>   
                                  <input type="text" id="fname" name="contact" class="form-control" value="{{$data->contact}}" >
                                  @if ($errors->has('contact'))
                                  <br>
                                  <span class="alert alert-danger" role="alert">
                                      <strong>{{ $errors->first('contact') }}</strong>
                                  </span>
                                  @endif
                              </div>
                        
                              <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                  <label for="">Address</label>
                                  <input type="text" id="fname" name="address" class="form-control" value="{{$data->address}}" >
                                  @if ($errors->has('address'))
                                  <br>
                                  <span class="alert alert-danger" role="alert">
                                      <strong>{{ $errors->first('address') }}</strong>
                                  </span>
                                  @endif
                              </div>
                        
                              <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}" >
                                  <label for="">Image</label>
                                  <input type="file" id="fname" name="image" class="form-control" value="">  
                                  @if ($errors->has('image'))
                                  <br>
                                  <span class="alert alert-danger" role="alert">
                                      <strong>{{ $errors->first('image') }}</strong>
                                  </span>
                                  @endif
                              </div>
                              <br>
                              <div class="form-group" >
                                  <button type="submit" class="btn btn-primary">
                                    update
                                 </button>
                                 <button type="reset" class="btn btn-danger">
                                    Clear
                                 </button>
                              </div>
                        
                        
                        
                            
                          </form>
                    </div>
                </div>

            </div> <!--- card body--> 
        </div>
    </div>
</div>
    
</div>
<br><br>

@endsection