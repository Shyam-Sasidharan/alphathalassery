<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('library_category.index')->with('categories', Library::search()->orderBy('created_at')->latest()->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('library_category.create');
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
            'content' => ''
        ]);

        $data = request()->except('_token');
        $data['slug'] = '';       
        if (Library::create($data)){
            return redirect()->route('library')->with('success', 'Library Category has been added');
        }
        return redirect()->route('library')->with('error', 'Could not add Library Category');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Library $library)
    {
        return view('library_category.edit', compact('library'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( Library $library)
    {
        $this->validate(\request(), [
            'name' => 'required',
            'content' => ''
        ]);
        $data = request()->except('_token');
        $data['slug'] = '';        
        if ($library->update($data)){
            return redirect()->route('library')->with('success', 'Library Category has been updated');
        }
        return redirect()->route('library')->with('error', 'Could not update Library Category ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Library $library)
    {
        try {
            $library->delete();
            return redirect()->back()->with('success', 'Library Category has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the selected Library Category');
        }
    }
}
