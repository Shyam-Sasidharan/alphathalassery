<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Library;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('books.index')->with('books', Book::with('library')->search()->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
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
            'pdf'=>'nullable|mimes:pdf'
        ]);
        $data = request()->except('_token');
        if (request()->hasFile('pdf')) {
            $data['pdf'] = upload(request()->pdf, 'user_files/books');
        }
        if (Book::create($data)){
            return redirect()->route('book')->with('success', 'Library Book Details has been added');
        }
        return redirect()->route('book')->with('error', 'Could not add library book details');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectFormRequest request()
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Book $book)
    {
        request()->validate([
            'pdf'=>'nullable|mimes:pdf'
        ]);
        $data = request()->except('_token');
        if (request()->hasFile('pdf')) {
            if ($book && $book->pdf && is_file(public_path($book->pdf))){
                @unlink(public_path($book->pdf));
            }
            $data['pdf'] = upload(request()->pdf, 'user_files/books');
        } 
        if ($book->update($data)){
            return redirect()->route('book')->with('success', 'Library Book Details has been updated');
        }
        return redirect()->route('book')->with('error', 'Could not update library book details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Book $book)
    {
        try {
            $book->delete();
            return redirect()->back()->with('success', 'Book Details has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the book details');
        }
    }
}
