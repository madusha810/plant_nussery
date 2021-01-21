<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Mail;
use\App\Mail\sendmail;

class SupplierControler extends Controller
{
    public function index()
    {
        return view('supplier');
    }

    public function store(Request $request)
    {
        $supplier = new Supplier();

        $this->validate( $request,[
            'name'=>'required|max:50|min:3',
            'email'=>'required|max:50|min:5',
            'pno'=>'required|max:10|min:10',
            'address'=>'required|max:100|min:5',
            'plantname'=>'required|max:100|min:3',
            'plantprice'=>'required|max:100|min:2',
            'quantity'=>'required|max:100|min:2',
        
            

            
        ]);

        $supplier->name = $request->input('name');
        $supplier->email = $request->input('email');
        $supplier->pno = $request->input('pno');        
        $supplier->address = $request->input('address');
        $supplier->plantname = $request->input('plantname');
        $supplier->plantprice = $request->input('plantprice');
        $supplier->quantity = $request->input('quantity');
       // $employee->image = $request->input('image');

        if ($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();//get image
            $filename = time().'.'.$extension;
            $file->move('uploads/supplier/',$filename);
            $supplier->image = $filename;
        } else {
            return $request;
            $supplier->image = '';
        }

        $supplier->save();

        return redirect()->back()->with('success','Application Submitted');
    }


    public function display()
    {
        $suppliers = Supplier::all();
        return view('admin.supplierform')->with('suppliers',$suppliers);

    }

    public function view($id)
    {
        $suppliers = Supplier::find($id);
        return view('admin.supplierupdateform')->with('suppliers',$suppliers);
    }

    public function update(Request $request, $id)
    {
        $suppliers = Supplier::find($id);

        $this->validate( $request,[
            'name'=>'required|max:50|min:3',
            'email'=>'required|max:50|min:5',
            'pno'=>'required|max:10|min:10',
            'address'=>'required|max:100|min:5',

            
        ]);


        $suppliers->name = $request->input('name');
        $suppliers->email = $request->input('email');
        $suppliers->pno = $request->input('pno');
        $suppliers->address = $request->input('address');
        $suppliers->plantname = $request->input('plantname');
        $suppliers->plantprice = $request->input('plantprice');
        $suppliers->amount = $request->input('quantity');

        if ($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();//get image
            $filename = time().'.'.$extension;
            $file->move('uploads/supplier/',$filename);
            $suppliers->image = $filename;
        } 

        $suppliers->save();

        return redirect('/supplierpage')->with('suppliers',$suppliers);

    }
    public function delete($id)
    {
        $suppliers = Supplier::find($id); 
        $suppliers->delete();

        return redirect('/supplierpage')->with('suppliers',$suppliers);
    }

    public function emailform($id){
        $data = Supplier::find($id);
        return view('admin.emailform')->with('data',$data);
    }

    public function mail(Request $request,$id){

        $data = array(
            'message' => $request->message,
        );

        Mail::to($request->email)->send(new sendmail($data));
      
        $supply = Supplier::find($id);
        $supply->confirm = 1;
        $supply->message = $request->message;
        $supply->save();

        $suppliers = Supplier::all();
        return view('admin.supplierform')->with('suppliers',$suppliers);

    }
}
