<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('professors.index')->with('professors', Professor::search()->orderBy('created_at')->latest()->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professors.create');
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
            'content' => 'required',
            'image' => 'nullable|image'
        ]);

        $data = request()->except('_token');
        if (request()->hasFile('image')) {
            $data['image'] = upload(request()->image, 'user_files/professors');
        }
        if (Professor::create($data)){
            return redirect()->route('professor')->with('success', 'Professor has been added');
        }
        return redirect()->route('professor')->with('error', 'Could not add professor');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Professor $professor)
    {
        return view('professors.edit', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( Professor $professor)
    {
        $this->validate(\request(), [
            'name' => 'required',
            'content' => 'required',
            'image' => 'nullable|image'
        ]);
        $data = request()->except('_token');
        if (request()->hasFile('image')) {
            if ($professor && $professor->image && is_file(public_path($professor->image))){
                @unlink(public_path($professor->image));
            }
            $data['image'] = upload(request()->image, 'user_files/professors');
        }  
        if ($professor->update($data)){
            return redirect()->route('professor')->with('success', 'Professor has been updated');
        }
        return redirect()->route('professor')->with('error', 'Could not update professor ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Professor $professor)
    {
        try {
            $professor->delete();
            return redirect()->back()->with('success', 'Professor has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the selected professor');
        }
    }
}
