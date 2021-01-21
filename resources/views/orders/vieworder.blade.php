@extends('layouts.formlayout')

@section('content')
@if (count($orderData)>0)
<div class="container"><br>
    @include('inc.messages')
    <form action="/order/checkout" method="post">
<div class="form-group row">
    <div class="col-sm-8"> <br>
        <div class="card">
            <div class="card-body">
                <h2>Shopping Cart <span style="font-size:0.6em">({{ count($orderData) }} items)</span></strong></h2><br>
                    <table class="table table-bordered">
                        <thead class="thead">
                            <th>#</th>
                            <th>Plant</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>...</th>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            
                                @foreach ($orderData as $item)
                                    <tr>
                                        <td>
                                            <a href="/orderproduct/{{ $item->productId }}"><img src="{{asset('uploads/plant/'.$item->image)}}" alt="image" width="50px" height="auto" class="img-responsive"></a>   </td>
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
                                        <td>
                                            <a href="/order/remove/{{ $item->id }}" onclick="return confirm('Order will be removed!');">
                                                &nbsp;&nbsp;<i class="fa fa-trash-alt" style="font-size:18px;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            
                        </tbody>
                    </table>  
            </div>
        </div>
<br>
        <div class="card">
            <div class="card-body">
                <h3>Delivery Details</h3>
            Home Town <br>
            <select id="box1" onChange="myNewFunction(this);" name="" class="form-control" required>
                <option value="" disabled selected>Select City</option>
                @foreach ($delCost as $city)
                <option value="{{ $city->delivery_cost }}">{{ $city->homeTown }}</option>
                @endforeach
            </select>
            
            Delivery Address <br>
            <textarea name="delAddress" id="" cols="30" rows="3" required class="form-control"></textarea>
            </div>
        </div>
<br>
    <a href="/home" class="btn btn-success">Shopping More</a>
    </div>
    <div class="col-sm-4"> <br>
        <div class="card">
           <div class="card-body">
            <h2>Order Summary</h2><br>
            <table class="table">
                <tr>
                    <td>Sub Total</td>
                    <td><?php echo $total; ?></td>
                </tr>
                <tr>
                    <td>Dilivery Cost</td>
                    <td class="num"><p id="cost"><span class="total" style="color:red"><small>fill delivery details</small></span> </p></td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong><p id="total"><span class="total" style="color:red"><small>fill delivery details</small></span></p></strong></td>
                </tr>
            </table>
            
                {{ csrf_field() }}
                <input type="hidden" name="delCost" value="" id="delCost">
                <input type="hidden" name="homeTown" value="" id="homeTown">
                <input type="hidden" name="subTotal" value="<?php echo $total; ?>">
                <input type="submit" name="" value="Buy" style="width:100%" class="btn btn-success">
            </form>
           </div>
        </div>
    </div>
</div>


</div>

<script>

function myNewFunction(sel) {
 // document.write(sel.options[sel.selectedIndex].value);
 var subtotal = '<?php echo $total; ?>'
 //alert(subtotal);
 document.getElementById("cost").innerHTML = sel.options[sel.selectedIndex].value;
 document.getElementById("total").innerHTML = parseFloat(sel.options[sel.selectedIndex].value) +parseFloat(subtotal) ;
 document.getElementById("delCost").value = parseFloat(sel.options[sel.selectedIndex].value);
 document.getElementById("homeTown").value = sel.options[sel.selectedIndex].text;

}


</script>
@else
      <div class="container">
          <div class="row">
              <div class="col-sm-12" style="margin-top:6vh;margin-bottom:10vh">
                  <br><br>
                <center>
                <h4>:-( Your cart is Empty</h4>
                <img src="{{ asset('assets/img/cart1.gif') }}" alt="" class="img-responsive">
                <br><br>
                <a href="/home" class="btn btn-success">Shop Now</a>
                <br><br>
                </center>
              </div>
          </div>
      </div>
   @endif

@endsection