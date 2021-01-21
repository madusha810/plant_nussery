<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
<!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.16.0/css/mdb.min.css" rel="stylesheet">


    
  <style>

/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
 .StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

.subt{
    font-size: 2em
}

  </style>
</head>
<body>
  <script src="https://js.stripe.com/v3/"></script>

  @include('inc.navibar')

  <div class="container">
    <br>
      <h4><strong>Review and Pay</strong></h4>
      <hr>
  </div>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
            <form action="/order/pay/now" method="post" id="payment-form">
                {{ csrf_field() }}
                <div class="panel-heading display-table" >
              
                  
              <div class="row">
                    <div class="col-sm-8"> 
                        <h4 class="" >Payment Details</h4>
                        <span class="subt"><strong>LKR <?php echo $orderData->subTotal+$orderData->delCost ?>.00</strong></span>
                    </div>
                  <div class="col-sm-4"><img class="img-responsive" src="http://i76.imgup.net/accepted_c22e0.png"></div>
              </div>
                     
              
                      
                                  
              
              
              <hr>
                <div class="form-row">
        
                  <label for="" class="card-text">Name</label>
                
                <input type="text" name="name" id="" value="{{ Auth::user()->name }}" class="form-control" readonly>
               <br><br>
                <input type="hidden" name="subTotal" id="" value="{{ $orderData->subTotal }}" class="form-control" readonly>
                <input type="hidden" name="delCost" id="" value="{{ $orderData->delCost }}" class="form-control">
                
                <label for="" class="card-text">Home Town</label>
                <input type="text" name="homeTown" id="" value="{{ $orderData->homeTown }}" class="form-control" readonly>
            
                <br><br>
                <label for="" class="card-text">Deleviry Address </label>
                <br>
                <textarea name="delAddress" id=""  rows="3" class="form-control" readonly>{{ $orderData->delAddress }}</textarea>
        <br>
                Card Details
                  <div id="card-element" style="width:100%">
                    @csrf
                    <!-- A Stripe Element will be inserted here. -->
                  </div>
              
                  <!-- Used to display form errors. -->
                  <div id="card-errors" role="alert"></div>
                </div>
              <br>
                <button class="btn btn-success" style="width:100%;padding:3vh">Pay Now</button></div>
              </form>

              </div>
            </div>
        </div>
    </div>
</div>

<script>
  // Create a Stripe client.
var stripe = Stripe('pk_test_zCXLDuejKHWLGOLpUoSPac1s00aI9jttDh');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>



</body>
<br><br>
@include('inc.footer')
</html>