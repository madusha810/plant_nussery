<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\image;
use App\paragraph;
use App\advertiement;


class customhomecontroller extends Controller
{
    public function viewwelcomepage(){

        $data = image::all();
        $info = paragraph::all();
        $add = advertiement::all();
        

       
        return view('welcome')->with(['data' => $data,'info' => $info,'add' => $add]);

    }
}
