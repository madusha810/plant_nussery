<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Mail;
use\App\Mail\sendmail;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee');
    }

    public function store(Request $request)
    {
        $employee = new Employee();

        $this->validate( $request,[
            'name'=>'required|max:50|min:3',
            'email'=>'required|max:50|min:5',
            'pno'=>'required|max:10|min:10',
            'address'=>'required|max:100|min:5',
            'gender'=>'required',
            'experience'=>'required',
            
        ]);

        $employee->name = $request->input('name');
        $employee->dob = $request->input('dob');
        $employee->email = $request->input('email');
       // $employee->post = $request->input('post');
        $employee->pno = $request->input('pno');        
        $employee->address = $request->input('address');
        $employee->gender = $request->input('gender');
        $employee->experience = $request->input('experience');
       // $employee->image = $request->input('image');

        if ($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();//get image
            $filename = time().'.'.$extension;
            $file->move('uploads/employee/',$filename);
            $employee->image = $filename;
        } else {
            return $request;
            $employee->image = '';
        }

        $employee->save();

        return redirect()->back()->with('success','Application Submitted');
    }


    public function display()
    {
        $employees = Employee::all();
        return view('admin.employeeform')->with('employees',$employees);

    }

    public function edit($id)
    {
        $employees = Employee::find($id);
        return view('admin.employeeupdateform')->with('employees',$employees);
    }

    public function update(Request $request, $id)
    {
        $employees = Employee::find($id);

        $this->validate( $request,[
            'name'=>'required|max:50|min:3',
            'email'=>'required|max:50|min:5',
            'pno'=>'required|max:10|min:10',
            'address'=>'required|max:100|min:5',
            'gender'=>'required',
            'experience'=>'required',
            
        ]);


        $employees->name = $request->input('name');
        $employees->dob = $request->input('dob');
        $employees->email = $request->input('email');
        $employees->pno = $request->input('pno');
        $employees->address = $request->input('address');
        $employees->gender = $request->input('gender');
        $employees->experience = $request->input('experience');

        if ($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();//get image
            $filename = time().'.'.$extension;
            $file->move('uploads/employee/',$filename);
            $employees->image = $filename;
        } 

        $employees->save();

        return redirect('/employeepage')->with('employees',$employees);

    }
    public function deleteemployye($id)
    {
        $employees = Employee::find($id); 
        $employees->delete();

        $employees = Employee::all();
        return view('admin.employeeform')->with('employees',$employees);
    }

    public function viewdetails($id){

        $employee = Employee::find($id);

        return view('admin.employeedetails')->with('employee',$employee);

    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function emailform($id){
        $data = Employee::find($id);
        return view('admin.employeeemailform')->with('data',$data);
    }

    public function mail(Request $request,$id){

        $data = array(
            'message' => $request->message,
        );

        Mail::to($request->email)->send(new sendmail($data));
      
        $employee = Employee::find($id);
        $employee->confirm = 1;
        $employee->message = $request->message;
        $employee->save();

      
        $employees = Employee::all();
        return view('admin.employeeform')->with('employees',$employees);

    }
}
