<?php

namespace App\Http\Controllers;

use App\Models\HandBook;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Library;
use Symfony\Component\HttpFoundation\File\UploadedFile as SymfonyUploadedFile;

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
        $request = request();
        $this->removeInvalidUploadedFiles($request);
        $file = $this->getUploadedPdf($request);

        $data = $request->except('_token', 'file');
        if ($file) {
            $data['file'] = upload($file, 'user_files/hand-books');
        } else {
            return redirect()->back()->withInput()->with('error', 'Please select a valid hand book PDF');
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
        $request = request();
        $this->removeInvalidUploadedFiles($request);
        $file = $this->getUploadedPdf($request);

        $data = $request->except('_token', 'file');
        if ($file) {
            if ($hand_book && $hand_book->file && is_file(public_path($hand_book->file))){
                @unlink(public_path($hand_book->file));
            }
            $data['file'] = upload($file, 'user_files/hand-books');
        } elseif ($request->input('file')) {
            return redirect()->back()->withInput()->with('error', 'Selected PDF was not uploaded. Please choose the PDF again.');
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

    private function removeInvalidUploadedFiles(Request $request)
    {
        $request->files->replace($this->cleanUploadedFiles($request->files->all()));

        if (!$request->files->has('file')) {
            $request->request->remove('file');
        }
    }

    private function cleanUploadedFiles(array $files)
    {
        foreach ($files as $key => $file) {
            if (is_array($file)) {
                $file = $this->cleanUploadedFiles($file);

                if (empty($file)) {
                    unset($files[$key]);
                    continue;
                }

                $files[$key] = $file;
                continue;
            }

            if (!$file instanceof SymfonyUploadedFile) {
                unset($files[$key]);
            }
        }

        return $files;
    }

    private function getUploadedPdf(Request $request)
    {
        $file = $request->files->get('file');

        if (!$file instanceof SymfonyUploadedFile && isset($_FILES['file']) && is_array($_FILES['file'])) {
            $uploadedFile = $_FILES['file'];
            $tmpName = isset($uploadedFile['tmp_name']) ? $uploadedFile['tmp_name'] : null;

            if ($tmpName && is_uploaded_file($tmpName)) {
                $file = new SymfonyUploadedFile(
                    $tmpName,
                    isset($uploadedFile['name']) ? $uploadedFile['name'] : 'hand-book.pdf',
                    isset($uploadedFile['type']) ? $uploadedFile['type'] : null,
                    isset($uploadedFile['size']) ? $uploadedFile['size'] : null,
                    isset($uploadedFile['error']) ? $uploadedFile['error'] : UPLOAD_ERR_OK,
                    true
                );
            }
        }

        if (!$file instanceof SymfonyUploadedFile || !$file->isValid()) {
            return null;
        }

        return strtolower($file->getClientOriginalExtension()) === 'pdf' ? $file : null;
    }
}
