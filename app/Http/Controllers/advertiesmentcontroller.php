<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\advertiement;

class advertiesmentcontroller extends Controller
{
    public function storeadd(Request $request){

        $id = $request->id; 
       
        $advertiement = advertiement::find($id);

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/advertiement/',$filename);
            $advertiement->image = $filename;
        }
            $advertiement->date = $request->input('date');
        $advertiement->save();
      
        $add = advertiement::all();
        return view('admin.advetiesment')->with('add',$add);
    }

    public function showadd(){

        $add = advertiement::all();
        return view('admin.advetiesment')->with('add',$add);
    }

    public function editaddform($id){

        $add = advertiement::find($id);
        return view('admin.editadvetiesment')->with('add',$add);
    }

    public function deleteadd($id){

        $newadd = advertiement::find($id);
        $newadd->delete();


        $add = advertiement::all();
        return view('admin.advetiesment')->with('add',$add);
    }

    public function __construct()
   {
       $this->middleware('auth');
   }

   public function storenewadd(Request $request){
       $newadd = new advertiement();

       if($request->hasfile('image')){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/advertiement/',$filename);
        $newadd->image = $filename;
    }
        $newadd->url = $request->input('url');
        $newadd->date = $request->input('date');

        $newadd->save();

        $add = advertiement::all();
        return view('admin.advetiesment')->with(['add' =>$add,'message'=>'post is success']);
   }
}
