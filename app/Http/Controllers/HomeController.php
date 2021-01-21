<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use App\contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = item::all();
        $contact = contact::all();

        return view('home')->with(['data' => $data,'contact' => $contact]);
    }
}
