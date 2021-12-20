<?php

namespace App\Http\Controllers;
use App\Models\Doctors;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addview(){
        return view('admin.add_doctor');
    }
    public function upload(Request $request){
        $doctor= new Doctors;
        $image=$request->file;
        $imagename=time().".".$image->getClientOriginalExtension();
        $request->file->move("doctor_image",$imagename);
        $doctor->image=$imagename;
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;
        
        $doctor->save();
        
        return redirect()->back()->with("message","DOCTOR  ADDED  SUCCESSFULLY");
    }
}