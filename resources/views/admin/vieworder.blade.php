<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Order</title>
  <style type="text/css">
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		.title1{
			background-color: #aed5f5;
			padding: 4px;
		}

		.total{
			text-align: right;
		}
	</style>
</head>
<body>

      
      <div class="container">
       

                    
      
      
                <p class="total">   
                  Invoice No: {{ $paymentData->id }}
                </p>
                <h2>Customer Payment</h2>
                <hr>
                <h4 class="title1">Customer Details</h4>
                @foreach ($customerData as $customerData)
                    
               
                {{ $customerData->name }} <br>
                {{ $customerData->email }} <br>
                {{ $customerData->contact }}

                <br><br>
                <h4 class="title1">Delivery Details</h4>
                {{ $customerData->deliveryAddress }} <br>
                {{ $customerData->homeTown }}
                <br><br>
                @endforeach
   


      <h4 class="title1">Invoice Details</h4>
      <strong>Charges</strong> <br>

      <table>
          <tr>
              <th>#</th>
              <th>Item</th>
              <th>Unit Price (LKR)</th>
              <th>Quantity</th>
              <th class="total">Amount (LKR)</th>
          </tr>
          @foreach ($orderData as $key => $order)
          <tr>
              <td>{{ ++$key }}</td>
              <td>{{ $order->plantname }}</td>
              <td>{{ $order->price }}.00</td>
              <td>{{ $order->quantity }}</td>
              <td class="total"><?php echo  $order->price*$order->quantity.".00"; ?></td> 
              
          </tr>
          @endforeach
          
      </table>

      <br><br>

      <table>
          <tr>
              <td><strong>Total</strong></td>
              <td></td>
              <td></td>
              <td></td>
              <td class="total">{{ $paymentData->subTotal }}.00</td>
          </tr>
          <tr>
              <td><strong>Delivery Cost</strong></td>
              <td></td>
              <td></td>
              <td></td>
              <td class="total">{{ $paymentData->deliveryCost }}.00</td>
          </tr>
          <tr>
              <td><strong>Total Payment</strong></td>
              <td></td>
              <td></td>
              <td></td>
              <td class="total"><strong>{{ $paymentData->payment }}.00</strong></td>
          </tr>
      </table>
        <div style="padding-bottom:10vh"></div>
        </div>

 
  <script src="../assets/js/core/jquery.min.js"></script>
  
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  
  
  
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
 
  
 
</body>

</html>