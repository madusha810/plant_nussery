<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\item;
use App\order;
use App\payment;
use App\deliveryCost;

use Auth;
use DB;
use Session;


class ordercontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view($id){
        $allproducts=item::all();
        $product=item::find($id);
        $cart = cartController::checkCart();
        //return $cart;
        return view('orders.orderproduct')->with('productData',$product)->with('allproducts',$allproducts)->with('cart',$cart);
    }

    public function order(Request $request){

        $customerId = Auth::user()->id;
        //return $customerId;
        $unitPrice = $request->unitPrice;
        $quantity = $request->buyingQuantity; //---ordered quantiy
        
        //$price = $unitPrice*$quantity;//--price of total items

        $orderData=new order;
        
        $orderData->quantity=$quantity; //
        $orderData->price=$unitPrice; //
        //$orderData->diliveryAddress=$request->diliveryAddress; //
        $orderData->productId=$request->id; //-product id
        $orderData->customerId=$customerId; //-customer id
 
        $orderData->save();

        /*$oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart->add($product, $product->id);
        $array = array_dot([$request->id => ['price'=>$unitPrice]]);
        $request->session()->put('cart',$array);
        dd($request->session()->get('cart'));*/

        $newItemAmount = $request->Quantity - $request->buyingQuantity;
        $query=DB::update("update items set amount='$newItemAmount' where id='$request->id' ");
        return redirect('/order/view/notconfirmed');
        

    }

    public function viewOrder(){

        $customerId = Auth::user()->id;

        $orderData = DB::table('orders')->join('items','items.id','=','orders.productId')
        ->select('quantity','items.price','plantname','image','orders.id','orders.productId')
        ->where('orders.customerId','=',$customerId)->where('orders.status','=','notconfirmed')->get();

        $delCost = deliveryCost::all();
        //return $orderData;
        return view('orders.vieworder')->with('orderData',$orderData)->with('delCost',$delCost);
    }

    //--------======-============================================

    public function viewOrderConfirmed(){
        $customerId = Auth::user()->id;

        $orderData = DB::table('orders')->join('items','items.id','=','orders.productId')
        ->select('quantity','items.price','plantname','image','orders.id','orders.created_at','orders.productId')
        ->where('orders.customerId','=',$customerId)->where('orders.status','=','confirmed')->get();

        //return $orderData;
        return view('orders.orders')->with('orderData',$orderData);

    }

    public function removeOrder($id){
        $orderData=order::find($id);
        $orderedAmount = $orderData->quantity; //-ordered quantity
       // 

        $itemData = item::find($orderData->productId);

        $remainingAmount = $itemData->amount; //---remaining quantity of item table
        $newAmount = $remainingAmount+$orderedAmount; //--updated count refilling canceled orders

        $itemData->amount=$newAmount;

        $orderData->delete();
        $itemData->save();

        return redirect()->back()->with('success' ,'Order Removed');;

        //return $this->viewOrder();
        //

    }

    public function checkout(Request $request){

        return view('orders.makePayment')->with('orderData',$request);

        //return $delCost;
    }

    public function pay(Request $request){

       // return "hgshsgd";
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
    



}
