<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use DB;

class adminitemcontroller extends Controller
{
    public function store(Request $request){

        $this->validate($request,[
        
            'plantname' => 'required|max:20|min:4|unique:items',
            'price' => 'required|max:4|min:3',
            'amount' => 'required|max:3|min:2',
            'image' => 'required|mimes:jpeg,jpg,png',
            'fertilizer' => 'required|max:100|min:5',
            'sproutingtime' => 'required|min:5|max:200',
        ]);

        $data = new item;

        $data->plantname = $request->plantname;
        $data->price = $request->price;
        $data->fertilizer = $request->fertilizer;
        $data->sproutingtime = $request->sproutingtime;
        $data->amount = $request->amount;

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/plant/',$filename);
            $data->image = $filename;
        }

        $data->save();
        $info = item::all();
        return view('admin.plant')->with('data',$info);


    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function display(){
        
        $data = item::all();

        return view('admin.plant')->with('data',$data);
    }

    public function remove($id){

        $newdata = item::find($id);
        $newdata->delete();

        $data = item::all();
        return view('admin.plant')->with('data',$data);
    }

    public function edit($id){

        $edititem = item::find($id);

        return view('admin.editplant')->with('edititem',$edititem);
    }

    public function edititem(Request $request){

        $id = $request->id;

        $edititem = item::find($id);

        $this->validate($request,[
        
            
            'price' => 'required|max:4|min:3',
             'image' => 'mimes:jpeg,jpg,png',
            'fertilizer' => 'required|max:100|min:5',
            'sproutingtime' => 'required|min:5|max:200',
        ]);

        $edititem->price = $request->price;
        $edititem->fertilizer = $request->fertilizer;
        $edititem->sproutingtime = $request->sproutingtime;

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/plant/',$filename);
            $edititem->image = $filename;
        }

        $edititem->save();
        $data = item::all();

        return view('admin.plant')->with('data',$data);


    }

    public function viewstock($id){

        $stock = item::find($id);

        return view('admin.stock')->with('stock',$stock);
    }

    public function increase(Request $request){

        

        $id = $request->id;

        $stock = item::find($id);

        

        $newamount = $stock->amount+$request->amount;
        $stock->amount = $newamount;
        

        $stock->save();
        $data = item::all();
        return view('admin.plant')->with('data',$data);

    }

    public function decrease(Request $request){

        $id = $request->id;

        $stock = item::find($id);

        if($stock->amount>0){

        $newamount = $stock->amount-$request->amount;
        $stock->amount = $newamount;
        $stock->save();
        }

        else{

        }
        $data = item::all();
        return view('admin.plant')->with('data',$data);
        

    }
}
