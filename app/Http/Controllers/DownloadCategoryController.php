<?php

namespace App\Http\Controllers;

use App\Models\DownloadCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class DownloadCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('download_category.index')->with('categories', DownloadCategory::search()->orderBy('created_at')->latest()->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('download_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->validate(\request(), [
            'name' => 'required'
        ]);

        $data = request()->except('_token');      
        if (DownloadCategory::create($data)){
            return redirect()->route('download_category')->with('success', 'Download Category has been added');
        }
        return redirect()->route('download_category')->with('error', 'Could not add Download Category');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(DownloadCategory $download_category)
    {
        return view('download_category.edit', compact('download_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( DownloadCategory $download_category)
    {
        $this->validate(\request(), [
            'name' => 'required'
        ]);
        $data = request()->except('_token');
        if ($download_category->update($data)){
            return redirect()->route('download_category')->with('success', 'Download Category has been updated');
        }
        return redirect()->route('download_category')->with('error', 'Could not update Download Category ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(DownloadCategory $download_category)
    {
        try {
            $download_category->delete();
            return redirect()->back()->with('success', 'Download Category has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the selected Download Category');
        }
    }
}
