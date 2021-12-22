<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctors;
use App\Models\Appointment;
class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id()){
         if(Auth::User()->usertype=="0"){
            $doctor=doctors::all();
            return view('user.home',compact('doctor'));
         }
         else{
             return view('admin.home');
         }
        }
        else{
            
            return redirect()->back();
        }
    }
    public function index(){
        //this line is for enbling to stay on the homepage of either the admin or user dashboards when we refresh the page
        // if(Auth::id()){
        //     return redirect('/home');
        // }
        // else{
            $doctor=doctors::all();
        return view('user.home',compact('doctor'));
        // }
        
    }
    
    public function appointment(Request $request){
        $appointment=new Appointment;
        
        $appointment->name=$request->name;
        $appointment->email=$request->email;
        $appointment->phone=$request->number;
        $appointment->selectedDoctor=$request->selectedDoctor;
        $appointment->message=$request->message;
        $appointment->date=$request->date;
        $appointment->status="In Progress";
        if(Auth::id()){
            $appointment->user_id=Auth::user()->id;
        }
        
        $appointment->save();
        
        return redirect()->back()->with("message","APPOINTMENT MADE SUCCESSFULLY");
    }

    public function myappointment(){
     
     
        if(Auth::id()){
            //this code here will get  the specific appointments made by  a  user  who  is  logged in
            if(Auth::user()->usertype==0){
            $userId=Auth::user()->id;
            $appointment =appointment::where('user_id',$userId)->get();
            return view("user.myAppointments",compact("appointment"));   
            }
        }
       else{
           return redirect()->back();
       }
    }
    
    public function cancel($id){
        $data=appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}