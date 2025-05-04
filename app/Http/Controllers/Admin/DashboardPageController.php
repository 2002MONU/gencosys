<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardPageController extends Controller
{
    public function dashboard(){
        if(auth()->guard('admin')){
            $course = Course::count('id');
            $student = Student::count('id');
           return view('admin.dashboard',compact('course','student'));

        }else{
            return redirect()->route('admin.login')->with('error','Do login first');
        }
    }


    public function registerStudent(){
        $registerStudent = Student::with('course')->get();
       return view('admin.registerStudent',compact('registerStudent'));
      }
}
