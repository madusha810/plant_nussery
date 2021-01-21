<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Invoice</title>
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
	
		<table>
			<tr>
				<td>
					<p class="total">Invoice No: {{ $paymentData->id }}</p>
					<h2>Green Gardian Plant Nursery</h2>
					greengardianplantnursery@gmail.com <br> 055 5656 565

					<hr>
					<h4 class="title1">Customer Details</h4>
					
					{{ Auth::user()->name }} <br>
					{{ Auth::user()->email }} <br>
					{{ Auth::user()->contact }}

					<h4 class="title1">Delivery Details</h4>
					{{ $paymentData->deliveryAddress }} <br>
					{{ $paymentData->homeTown }}
					<br><br>

				</td>
				
			</tr>
		</table>

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
	</div>
</body>
</html>