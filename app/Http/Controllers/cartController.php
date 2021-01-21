<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Auth;
use DB;



class cartController extends Controller
{

    static function checkCart(){
        $customerId = Auth::user()->id;
        $query=DB::select("select count(*) as orders from orders where customerId = '$customerId' and status = 'notconfirmed'  ");
        foreach($query as $a){
            return $a->orders;
        }
        return $query->orders;
    }
}