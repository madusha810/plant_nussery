@extends('layouts.formlayout')

@section('content')

<div class="container"><br>
    @include('inc.messages')
    <form action="/order/checkout" method="post">
<div class="row">
    <div class="col-sm-12">
        <div class="well">
            <h2><strong>Orders <span style="font-size:0.6em">({{ count($orderData) }} items)</span></strong></h2><br>
            <table class="table table-bordered">
                <thead class="thead">
                    <th>#</th>
                    <th>Plant</th>
                    <th>Unit Price (LKR)</th>
                    <th>Quantity</th>
                    <th>Price (LKR)</th>
                    <th>Ordered time</th>
                    <th>...</th>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    
                        @foreach ($orderData as $item)
                            <tr>
                                <td>
                                    <a href="/orderproduct/{{ $item->productId }}">
                                        <img src="{{asset('uploads/plant/'.$item->image)}}" alt="image" width="50px" height="auto" class="img-responsive">   
                                    </a>
                                </td>
                                <td>{{ $item->plantname }}</td>
                                <td>{{ $item->price }}.00</td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    <?php  
                                        $eachtotal = $item->price*$item->quantity;
                                        echo $eachtotal.".00";
                                        $total = $total+$eachtotal;
                                    ?>
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="/order/remove/{{ $item->id }}" onclick="return confirm('Order will be removed!');">
                                        <i class="fa fa-trash-alt" style="font-size:18px;"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    
                </tbody>
            </table>  
        </div>



    <p><a href="/home" class="btn btn-success">Shopping More</a></p>
    </div>
    
</div>



</div>




@endsection