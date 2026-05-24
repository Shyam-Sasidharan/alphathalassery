<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gallery.index')->with('galleries', Gallery::search()->orderBy('created_at')->latest()->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
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
            'image' => 'nullable|image'
        ]);

        $data = request()->except('_token');
        // $data['image'] = '';
        if (request()->hasFile('image')) {
            $data['image'] = upload(request()->image, 'user_files/gallery');
        }
        if (Gallery::create($data)){
            return redirect()->route('gallery')->with('success', 'Gallery has been added');
        }
        return redirect()->route('gallery')->with('error', 'Could not add gallery');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Gallery $gallery)
    {
        return view('gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( Gallery $gallery)
    {
        $this->validate(\request(), [
            'name' => 'required',
            'image' => 'nullable|image',
        ]);
        $data = request()->except('_token');        
        if (request()->hasFile('image')) {
            if ($gallery && $gallery->image && is_file(public_path($gallery->image))){
                @unlink(public_path($gallery->image));
            }
            $data['image'] = upload(request()->image, 'user_files/gallery');
        }   
        if ($gallery->update($data)){
            return redirect()->route('gallery')->with('success', 'Gallery has been updated');
        }
        return redirect()->route('gallery')->with('error', 'Could not update gallery ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Gallery $gallery)
    {
        try {
            if ($gallery->image && is_file(public_path($gallery->image))) {
                @unlink(public_path($gallery->image));
            }
            $gallery->delete();
            return redirect()->back()->with('success', 'Gallery record has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the selected gallery');
        }
    }
}
