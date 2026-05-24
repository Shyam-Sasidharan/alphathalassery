<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('faq.index')->with('faq', Faq::search()->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faq.create');
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

        if (Faq::create($data)){
            return redirect()->route('faq')->with('success', 'FAQ has been added');
        }
        return redirect()->route('faq')->with('error', 'Could not add faq');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Faq $faq)
    {
        return view('faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectFormRequest request()
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Faq $faq)
    {
        $data = request()->except('_token');

        if ($faq->update($data)){
            return redirect()->route('faq')->with('success', 'FAQ has been updated');
        }
        return redirect()->route('faq')->with('error', 'Could not update faq');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Faq $faq)
    {
        try {
            $faq->delete();
            return redirect()->back()->with('success', 'FAQ has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the faq');
        }
    }
}
