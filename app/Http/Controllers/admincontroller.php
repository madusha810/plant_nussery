<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\payment;
use App\deliveryCost;

class admincontroller extends Controller
{
    public function userlist(){

        $data = User::all();

        return view('admin.dashboard')->with('user',$data);
    }

    public function admin($id){
        $data = User::find($id);

        if($data->usertype){
            $data->usertype = 0;
        }

        else{
            $data->usertype = 1;
        }

        $data->save();

        return redirect()->back();
    }

    public function removeuser($id){
        $data = User::find($id);

        $data->delete();

        return  redirect()->back();
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewinfo($id){

        $data = User::find($id);

        return view('admin.details')->with('user',$data);
    }

    public function orders(){
        $paymentsData = DB::table('payments')->join('users','users.id','=','payments.customerId')
        ->select('payments.id','payment','homeTown','deliveryAddress','name','payments.status')
        ->get();

//return $paymentsData;
        return view('admin.orders')->with('paymentsData',$paymentsData);
    }

    public function vieworder($id){

        $refNo = $id;
        $customerData = DB::table('payments')->join('users','users.id','=','payments.customerId')
        ->select('payments.id','email','homeTown','deliveryAddress','name','contact')
        ->where('payments.id','=',$refNo)->get();
//return $customerData;
        $paymentData=Payment::find($refNo);
        $paymentData->status = 'checked';
        $paymentData->save();
        $orderData = DB::table('orders')->join('items','items.id','=','orders.productId')
        ->select('quantity','items.price','plantname','orders.refNo')
        ->where('orders.refNo','=',$refNo)->get();
        return view('admin.vieworder')->with('paymentData',$paymentData)->with('orderData',$orderData)->with('customerData',$customerData);

    }

    public function delivery(){
        $deliveryData = deliveryCost::all();
        return view('admin.delivery_index')->with('deliveryData',$deliveryData);
    }

    public function addcity(Request $request){

        $this->validate( $request,[
            'town'=>'required|max:50|min:3',
            'cost'=>'numeric|required',     
        ]);

        $deliveryCost = new deliveryCost;
        $deliveryCost->homeTown = $request->town;
        $deliveryCost->delivery_cost = $request->cost;

        $deliveryCost->save();
        return redirect()->back();

    }

    public function remove_city($id){
        $delivery = deliveryCost::find($id);
        $delivery->delete();
        return redirect()->back()->with('success' ,'Removed');;;
    }

}
