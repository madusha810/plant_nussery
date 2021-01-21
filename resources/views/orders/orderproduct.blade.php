@extends('layouts.formlayout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
<br>
            <img src="{{asset('uploads/plant/'.$productData->image)}}" alt="image" class="img-responsive" width="100%" height="auto">   
            <br>

        </div>
        <div class="col-sm-8">
            <br><br>
            <h2><a href="#">{{ $productData->plantname }}</a></h2>
            <p>
                <strong>{{ $productData->amount }}</strong> items remaining
                <h4>Unit Price : LKR {{ $productData->price }}.00</h4>
                
                <form action="/order/item" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="Quantity" value="{{ $productData->amount }}">
                    <input type="hidden" name="unitPrice" value="{{ $productData->price }}">
                    <input type="hidden" name="id" value="{{ $productData->id }}">
                    Quantity <br>
                    <input type="number" name="buyingQuantity" class="" style="text-align:right" min="1" max="{{ $productData->amount }}" required>
                    <br>
                    <br>
                    <input type="submit" value="Order Now" class="btn btn-success">

                </form>
            
            </p>


        </div>
    </div>
<br>
<hr>
    <div class="row">
        <hr>
        <div class="col-sm-12" style="text-align:">
            <h5><strong>Products you may like</strong></h5><br>
            @foreach ($allproducts->chunk(4) as $product)
                <div class="row">
                    @foreach ($product as $item)
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                {{ $item->plantname }} <br><br>
                                <a href="/orderproduct/{{ $item->id }}">
                                <img src="{{asset('uploads/plant/'.$item->image)}}" alt="" class="img-responsive" width="auto" height="130vh">
                                </a>
                                <br><br>
                            LKR: <strong>{{ $item->price }}.00</strong> | <small>{{ $item->amount }} Available</small>
                            </div>
                        </div> <br>
                    </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

</div>



@endsection