<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

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


      // download students to csv file 
      public function export()
      {
          $students = Student::all();
  
          // Generate CSV data
          $csvData = "ID,First Name,Last Name,Email,Mobile,Course Name,Fees,Created At\n";
  
          foreach ($students as $student) {
              $csvData .= "{$student->id},{$student->first_name},{$student->last_name},{$student->email},{$student->mobile},{$student->course->name},{$student->course->fees},{$student->created_at}\n";
          }
  
          $fileName = 'students_' . date('Y-m-d_H-i-s') . '.csv';
  
          // Return CSV response
          return Response::make($csvData, 200, [
              'Content-Type' => 'text/csv',
              'Content-Disposition' => "attachment; filename=\"$fileName\"",
          ]);
      }
}
