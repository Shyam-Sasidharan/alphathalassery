<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Category;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('publications.index')->with('publications', Publication::with('category')->search()->latest()->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publications.create');
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
            'author' => 'required',
            'price' => '',
            'category_id' => '',
            'image' => 'nullable|image'
        ]);

        $data = request()->except('_token');
        $data['slug'] = '';
        if (request()->hasFile('image')) {
            $data['image'] = upload(request()->image, 'user_files/publications');
        }
        if (Publication::create($data)){
            return redirect()->route('publications')->with('success', 'Publication has been added');
        }
        return redirect()->route('publications')->with('error', 'Could not add publication');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Publication $publications)
    {
        return view('publications.edit', compact('publications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( Publication $publications)
    {
        $this->validate(\request(), [
            'name' => 'required',
            'content' => 'required',
            'author' => 'required',
            'price' => '',
            'category_id' => '',
            'image' => 'nullable|image'
        ]);
        $data = request()->except('_token'); 
        $data['slug'] = '';       
        if (request()->hasFile('image')) {
            if ($publications && $publications->image && is_file(public_path($publications->image))){
                @unlink(public_path($publications->image));
            }
            $data['image'] = upload(request()->image, 'user_files/publications');
        }   
        if ($publications->update($data)){
            return redirect()->route('publications')->with('success', 'Publication has been updated');
        }
        return redirect()->route('publications')->with('error', 'Could not update publication ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Publication $publications)
    {
        try {
            if ($publications->image && is_file(public_path($publications->image))) {
                @unlink(public_path($publications->image));
            }
            $publications->delete();
            return redirect()->back()->with('success', 'Publication record has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the selected publication');
        }
    }
}
