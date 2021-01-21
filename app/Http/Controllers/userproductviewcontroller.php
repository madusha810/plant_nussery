<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;

class userproductviewcontroller extends Controller
{
    public function viewproduct(){

        $data = item::all();

        return view('productview')->with('data',$data);
    }
}
