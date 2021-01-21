@extends('layouts.formlayout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form action="/order/pay" method="post">
                {{ csrf_field() }}
                Name
                <input type="text" name="name" id="" value="{{ Auth::user()->name }}" class="form-control" readonly>
                Total Payment
                <input type="text" name="subTotal" id="" value="{{ $orderData->subTotal }}" class="form-control" readonly>
                <input type="hidden" name="delCost" id="" value="{{ $orderData->delCost }}" class="form-control">
                Home Town
                <input type="text" name="homeTown" id="" value="{{ $orderData->homeTown }}" class="form-control" readonly>
                Deleviry Address
                <textarea name="delAddress" id="" cols="30" rows="3" readonly>{{ $orderData->delAddress }}</textarea>
                
                <br>
                <input type="submit" value="Pay Now" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>


@endsection