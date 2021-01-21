@extends('layouts.formlayout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <div class="card" style="text-align:center">
        <div class="card-body">
            <h2>Payment Success</h2><br>
            <center><img src="{{ asset('assets/img/tick2.gif') }}" alt="" class="img-responsive"></center>
            <br><br>
            <a href="/pdfview?download=pdf&&id={{ $refNo }}"> <button class="btn btn-success" style="width:100%;padding:3vh"> Download Reciept </button></a>
       
        </div>
        </div>
        <br><br>
    </div>
    </div>
</div>


@endsection