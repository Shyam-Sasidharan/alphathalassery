<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index')->with('categories', Category::search()->orderBy('created_at')->latest()->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
        $data['slug'] = '';       
        if (Category::create($data)){
            return redirect()->route('category')->with('success', 'Publication Category has been added');
        }
        return redirect()->route('category')->with('error', 'Could not add Publication Category');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( Category $category)
    {
        $this->validate(\request(), [
            'name' => 'required'
        ]);
        $data = request()->except('_token');
        $data['slug'] = '';        
        if ($category->update($data)){
            return redirect()->route('category')->with('success', 'Publication Category has been updated');
        }
        return redirect()->route('category')->with('error', 'Could not update Publication Category ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Category $category)
    {
        try {
            $category->delete();
            return redirect()->back()->with('success', 'Publication Category has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the selected Publication Category');
        }
    }
}
