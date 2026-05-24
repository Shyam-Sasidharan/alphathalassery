<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses.index')->with('courses', Course::search()->orderBy('created_at')->latest()->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->validate(\request(), [
            'name' => 'required',
            'home_content' => 'required',
            'content' => 'required',
            'duration' => '',
            'fee' => '',
            'image' => 'nullable|image',
            'heading' => '',
            'pdf' => 'nullable|mimes:pdf'
        ]);

        $data = request()->except('_token');
        $data['slug'] = '';
        if (request()->hasFile('image')) {
            $data['image'] = upload(request()->image, 'user_files/course');
        }
        if (request()->hasFile('pdf')) {
            $data['pdf'] = upload(request()->pdf, 'user_files/course');
        }
        if (Course::create($data)){
            return redirect()->route('course')->with('success', 'Course has been added');
        }
        return redirect()->route('course')->with('error', 'Could not add course');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( Course $course)
    {
        $this->validate(\request(), [
            'name' => 'required',
            'home_content' => 'required',
            'content' => 'required',
            'duration' => '',
            'fee' => '',
            'image' => 'nullable|image',
            'heading' => '',
            'pdf' => 'nullable|mimes:pdf'
        ]);
        $data = request()->except('_token'); 
        $data['slug'] = ''; 
        if (request()->hasFile('image')) {
            if ($course && $course->image && is_file(public_path($course->image))){
                @unlink(public_path($course->image));
            }
            $data['image'] = upload(request()->image, 'user_files/course');
        }  
        if (request()->hasFile('pdf')) {
            if ($course && $course->pdf && is_file(public_path($course->pdf))){
                @unlink(public_path($course->pdf));
            }
            $data['pdf'] = upload(request()->pdf, 'user_files/course');
        } 
        if ($course->update($data)){
            return redirect()->route('course')->with('success', 'Course has been updated');
        }
        return redirect()->route('course')->with('error', 'Could not update course ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Course $course)
    {
        try {
            $course->delete();
            return redirect()->back()->with('success', 'Course record has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the selected course');
        }
    }
}
