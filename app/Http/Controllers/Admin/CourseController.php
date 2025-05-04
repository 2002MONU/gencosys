<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::get();
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course.add-course');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|unique:courses,name',
            'fee' => 'required|numeric',
            'brief' => 'required|string',
            'status' => 'required|in:0,1',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

         if($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail')->getClientOriginalExtension();
            $imageName = time() . '.' . $image;
            $image = $request->file('thumbnail')->move(public_path('images/courses'), $imageName);
        }
        $course = new Course();
        $course->name = $request->course_name;
        $course->fees = $request->fee;
        $course->brief = $request->brief;
        $course->status = $request->status;
        $course->thumbnail = $imageName;
        $course->save();


        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::find($id);
        return view('admin.course.edit-course',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'course_name' => 'required|unique:courses,name,' . $id,
            'fee' => 'required|numeric',
            'brief' => 'required|string',
            'status' => 'required|in:0,1',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $course = Course::find($id);
        if($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail')->getClientOriginalExtension();
            $imageName = time() . '.' . $image;
            $image = $request->file('thumbnail')->move(public_path('images/courses'), $imageName);
            $course->thumbnail = $imageName;
        }
        $course->name = $request->course_name;
        $course->fees = $request->fee;
        $course->brief = $request->brief;
        $course->status = $request->status;
        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Course::find($id);
        if ($delete) {
            // Delete the image file from the public directory
            $imagePath = public_path('images/courses/' . $delete->thumbnail);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Delete the record from the database
            $delete->delete();

            return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
        }

        return redirect()->route('courses.index')->with('error', 'Course not found.');
    }
}
