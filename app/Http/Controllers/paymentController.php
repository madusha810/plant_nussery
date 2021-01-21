<?php
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use Stripe\Charge;
use Auth;

use DB;
use PDF;
use App\Payment;

  //StripelabApp2020 -- ** stripe password **--- 

class paymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('orders.stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {

      $total = $request->subTotal+$request->delCost;
      $name = $request->name;
            
      \Stripe\Stripe::setApiKey('sk_test_KR9lKgGPWxaztyLRCIDNyQ0X00fDZ1UOcu');

      // Token is created using Checkout or Elements!
      // Get the payment token ID submitted by the form:
      $token = $_POST['stripeToken'];
/*
      $charge = \Stripe\Charge::create([
        'amount' => $total * 100,
        'currency' => 'lkr',
        'description' => 'Payment from '.$name,
        'source' => $token,
        'metadata' => ['order_id' => '6735'],
      ]);*/
      //return redirect('/pdfview?download=pdf');
              return "ok";
              return back();
    }



    public function pay(Request $request){

      $total = $request->subTotal+$request->delCost;
      $name = $request->name;
            
      \Stripe\Stripe::setApiKey('sk_test_KR9lKgGPWxaztyLRCIDNyQ0X00fDZ1UOcu');
      // Get the payment token ID submitted by the form:
      $token = $_POST['stripeToken'];

      $charge = \Stripe\Charge::create([
        'amount' => $total * 100,
        'currency' => 'lkr',
        'description' => 'Payment from '.$name,
        'source' => $token,
        'metadata' => ['order_id' => '6735'],
      ]);
    
       $paymentData = new payment;

       $paymentData->subTotal = $request->subTotal;
       $paymentData->deliveryCost = $request->delCost;
       $paymentData->homeTown = $request->homeTown;
       $paymentData->deliveryAddress = $request->delAddress;

       $payment = $request->subTotal+$request->delCost;
       
       $paymentData->payment = $payment;
       $paymentData->customerId = Auth::user()->id;

       $customerId = Auth::user()->id;

       $paymentData->save(); //------insert to payment

       $insertedId = $paymentData->id;

       //----update order table

       $query=DB::update("update orders set refNo='$insertedId', status='confirmed' where customerId='$customerId' and status='notconfirmed' ");
       // return "paid"; 
   
       return view('orders.paymentSuccess')->with('refNo',$insertedId);
   
       }


    public function pdfview(Request $request)
    {
      $refNo = $request->id;
      $paymentData=Payment::find($refNo);

      $orderData = DB::table('orders')->join('items','items.id','=','orders.productId')
      ->select('quantity','items.price','plantname')
      ->where('orders.refNo','=',$refNo)->get();

        view()->share('orderData',$orderData);
        view()->share('paymentData',$paymentData);

        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            return $pdf->download('pdfview.pdf');
        }
        return view('pdfview');
    }

}