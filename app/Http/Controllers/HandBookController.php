<?php

namespace App\Http\Controllers;

use App\Models\HandBook;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Library;

class HandBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hand-books.index')->with('hand_books', HandBook::paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hand-books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectFormRequest request()
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        request()->validate([
            'file'=>'nullable|mimes:pdf'
        ]);
        $data = request()->except('_token');
        if (request()->hasFile('file')) {
            $data['file'] = upload(request()->file, 'user_files/hand-books');
        }
        if (HandBook::create($data)){
            return redirect()->route('hand-book')->with('success', 'HandBook Details has been added');
        }
        return redirect()->route('hand-book')->with('error', 'Could not add hand-book details');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(HandBook $hand_book)
    {
        return view('hand-books.edit', compact('hand_book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectFormRequest request()
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HandBook $hand_book)
    {
        request()->validate([
            'file'=>'nullable|mimes:pdf'
        ]);
        $data = request()->except('_token');
        if (request()->hasFile('file')) {
            if ($hand_book && $hand_book->file && is_file(public_path($hand_book->file))){
                @unlink(public_path($hand_book->file));
            }
            $data['file'] = upload(request()->file, 'user_files/hand-books');
        } 
        if ($hand_book->update($data)){
            return redirect()->route('hand-book')->with('success', 'HandBook Details has been updated');
        }
        return redirect()->route('hand-book')->with('error', 'Could not update hand-book details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(HandBook $hand_book)
    {
        try {
            $hand_book->delete();
            return redirect()->back()->with('success', 'HandBook Details has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the hand-book details');
        }
    }
}
