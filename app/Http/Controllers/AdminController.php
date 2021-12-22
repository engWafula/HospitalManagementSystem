<?php

namespace App\Http\Controllers;
use App\Models\Doctors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\doctor;
use Notification;
use App\Notifications\HosipitalNotifications;
class AdminController extends Controller
{
    public function addview(){
        if(Auth::id()){
         if(Auth::user()->usertype==1){
            return view('admin.add_doctor');
         }
         else{
             return redirect()->back();
         }
        }
        else{
            return redirect("login");
        }
        
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
    public function showAppointments(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
        $appointment=appointment::all();
        return view('admin.showAppointments',compact('appointment'));
    }
    else{
        return redirect()->back();
    }
   }
   else{
       return redirect("login");
   }
    }

    public function approve($id){
        $data=appointment::find($id);
        $data->status="approved";
        $data->save();
        return redirect()->back();
    }

    public function doctors(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
        $doctor=doctors::all();
        return view('admin.doctors',compact('doctor'));
    }
    else{
        return redirect()->back();
    }
   }
   else{
       return redirect("login");
   }
    }

    public function cancel_appointment($id){
        $data=appointment::find($id);
        $data->status="Canceled";
        $data->save();
        return redirect()->back();
    }
    public function delete($id){
        $data=doctors::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function update($id ){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
        $data=doctors::find($id);
        return view('admin.updateDoctor',compact('data'));
    }
    else{
        return redirect()->back();
    }
   }
   else{
       return redirect("login");
   }
    }
    public function editDoctor(Request $request,$id){
       
        $doctor=doctors::find($id);
        $image=$request->file;
       if($image){
       
        $imagename=time().".".$image->getClientOriginalExtension();
        $request->file->move("doctor_image",$imagename);
        $doctor->image=$imagename;
       }
    
        
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;
        
        $doctor->save();
        
        return redirect()->back()->with("message","DOCTOR DETAILS UPDATED SUCCESSFULLY");
    }

    public  function send_mail($id){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
        $data=appointment::find($id);
        return view('admin.email_view',compact('data'));
    }
    else{
        return redirect()->back();
    }
   }
   else{
       return redirect("login");
   }
    }

    public function sendemail($id,Request $request){
        $data=appointment::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'body'=>$request->body,
            // "actiontext"=>$request->action_text,
            // "actionurl"=>$request->action_url,
            "endpart"=>$request->end_part
        ];
        Notification::send($data,new HosipitalNotifications($details));

        return redirect()->back()->with("message","MESSAGE SENT SUCCESSFULLY");
    }
}