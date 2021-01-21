<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;

class usercontroller extends Controller
{


   public function view($id){

    $data = User::find($id);

    return view('profile')->with('data',$data);
   }

   public function storeuserinfo(Request $request){

    $this->validate($request,[
        
        'contact' => 'required|max:11|min:10',
        'address' => 'required|max:50|min:5',
        'image' => 'mimes:jpeg,jpg,png',
        'email' => 'required|string|email|max:255',
    ]);

        $id = $request->id;

        $data = User::find($id);

        $data->email = $request->email;
        $data->contact = $request->contact;
        $data->address = $request->address;

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/user/',$filename);
            $data->image = $filename;
        }
       

        $data->save();

        return redirect()->back();
   }

   public function __construct()
   {
       $this->middleware('auth');
   }

  
   
}
