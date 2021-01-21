<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\image;
use App\paragraph;
use App\contact;

class imagecontroller extends Controller
{
    public function viewimagepage(){

        $data = image::all();

        return view('admin.imagepage')->with('data',$data);
    }

    public function storeimage(Request $request){

        $id = $request->id;
        $datas = image::find($id);

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/imageslder/',$filename);
            $datas->image = $filename;
        }

        $datas->save();
        $data = image::all();
        return view('admin.imagepage')->with('data',$data);
    }

    public function deleteimage($id){

        $datas = image::find($id);

        $datas->delete();
        $data = image::all();
        return view('admin.imagepage')->with('data',$data);
    }

    public function viewpragraphform(){

        
       
        $info = paragraph::all();

        return view('admin.paragraphform')->with('info',$info);
    }

    public function storeparagraph(Request $request){

    $id = $request->id;
    $paragraph = paragraph::find($id);
    
    $paragraph->firstparagraph = $request->firstparagraph;
    $paragraph->secondparagraph = $request->secondparagraph;

    $paragraph->save();

    return redirect()->back();

    }

    public function viewcontactform(){

        $contact = contact::all();

        return view('admin.contact')->with('contact',$contact);
    }

    public function storecontact(Request $request){

        $id = $request->id;

        $contact = contact::find($id);

        $contact->hotline = $request->hotline;
        $contact->email = $request->email;
        $contact->fax = $request->fax;

        $contact->save();

        return redirect()->back();
    }

    public function showeditimage($id){

        $image = image::find($id);
        return view('admin.editimage')->with('image',$image);
    }

    public function __construct()
   {
       $this->middleware('auth');
   }
}
