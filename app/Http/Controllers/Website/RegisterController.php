<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function step1()
    {
        $courses = Course::where('status', 1)->get();
        return view('website.register', compact('courses'));
    }

    public function storeStep1(Request $request)
    {
       // return $request;
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students,email',
            'mobile' => 'required',
            'course_id' => 'required|exists:courses,id',
        ]);

        session([
            'student' => $request->only('first_name', 'last_name', 'email', 'mobile', 'course_id')
        ]);

        return redirect()->route('register.step2');
    }

    public function step2()
    {
        $studentData = session('student');
      //  dd($studentData);
        $course = Course::findOrFail($studentData['course_id']);
        $courses  = Course::get();
        return view('website.registerStep2', compact('course','courses','studentData'));
    }

    public function storeStep2(Request $request)
    {
        // Validate the new course ID
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        // Update the session data with the new course ID
        $studentData = session('student');
        $studentData['course_id'] = $request->course_id;
        session(['student' => $studentData]);

        // Redirect to the confirmation page
        return redirect()->route('register.confirmation');
    }

    public function confirmation()
    {

        $student = session('student');
        // dd($student);
        $course = Course::findOrFail($student['course_id']);
        return view('website.confirmation', compact('student', 'course'));
    }

    public function submit()
    {
        $data = session('student');

        $student = Student::create($data);
       
        session()->forget('student');

        return redirect()->route('register.success',['id' => $student->id]);
    }

    public function success(Request $request)
    {
        $studentId = $request->id;
        return view('website.success', compact('studentId'));
    }

}
