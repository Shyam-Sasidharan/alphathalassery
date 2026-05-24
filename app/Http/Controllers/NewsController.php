<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news.index')->with('news', News::search()->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
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
        $data['slug'] = '';   

        if (News::create($data)){
            return redirect()->route('news')->with('success', 'News has been added');
        }
        return redirect()->route('news')->with('error', 'Could not add news');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectFormRequest request()
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(News $news)
    {
        $data = request()->except('_token');
        $data['slug'] = '';   

        if ($news->update($data)){
            return redirect()->route('news')->with('success', 'News has been updated');
        }
        return redirect()->route('news')->with('error', 'Could not update news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(News $news)
    {
        try {
            $news->delete();
            return redirect()->back()->with('success', 'News has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the news');
        }
    }
}
