<?php

namespace App\Http\Controllers;

use App\Models\Center;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('study.index')->with('centres', Center::search()->orderBy('created_at')->latest()->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('study.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->validate(\request(), [
        	'location' => 'required',
            'center' => 'required',
            'address' => 'required',
            'coordinator' => 'required',
            'phone' => 'required',
            'image' => 'nullable|image'
        ]);

        $data = request()->except('_token');      
        if (request()->hasFile('image')) {
            $data['image'] = upload(request()->image, 'user_files/centers');
        }
        if (Center::create($data)){
            return redirect()->route('study_centre')->with('success', 'Study Center has been added');
        }
        return redirect()->route('study_centre')->with('error', 'Could not add study centre');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Center $study_centre)
    {
        return view('study.edit', compact('study_centre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( Center $study_centre)
    {
        $this->validate(\request(), [
            'location' => 'required',
            'center' => 'required',
            'address' => 'required',
            'coordinator' => 'required',
            'phone' => 'required',
            'image' => 'nullable|image'
        ]);
        $data = request()->except('_token');       
        if (request()->hasFile('image')) {
            if ($study_centre->image && is_file(public_path($study_centre->image))){
                @unlink(public_path($study_centre->image));
            }
            $data['image'] = upload(request()->image, 'user_files/centers');
        }   
        if ($study_centre->update($data)){
            return redirect()->route('study_centre')->with('success', 'Study Center has been updated');
        }
        return redirect()->route('study_centre')->with('error', 'Could not update Study Center ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Center $study_centre)
    {
        try {
            if ($study_centre->image && is_file(public_path($study_centre->image))) {
                @unlink(public_path($study_centre->image));
            }
            $study_centre->delete();
            return redirect()->back()->with('success', 'Study Center has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the selected Study Center');
        }
    }
}
