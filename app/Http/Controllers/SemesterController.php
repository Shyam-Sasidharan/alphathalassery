<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Course;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('semesters.index')->with('semesters', Semester::with('course')->search()->latest()->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('semesters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectFormRequest request()
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $data = request()->except('_token');

        if (Semester::create($data)){
            return redirect()->route('semester')->with('success', 'Semester Details has been added');
        }
        return redirect()->route('semester')->with('error', 'Could not add semester details');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Semester $semester)
    {
        return view('semesters.edit', compact('semester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectFormRequest request()
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Semester $semester)
    {
        $data = request()->except('_token');

        if ($semester->update($data)){
            return redirect()->route('semester')->with('success', 'Semester Details has been updated');
        }
        return redirect()->route('semester')->with('error', 'Could not update semester details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Semester $semester)
    {
        try {
            $semester->delete();
            return redirect()->back()->with('success', 'Semester Details has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the semester details');
        }
    }
}
