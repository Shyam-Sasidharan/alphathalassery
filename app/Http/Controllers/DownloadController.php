<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('downloads.index')->with('downloads', Download::search()->orderBy('created_at')->latest()->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('downloads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->validate(\request(), [
            'title' => 'required',
            'content' => '',
            'doc' => 'nullable|mimes:jpg,jpeg,png,pdf,xls',
            'download_category_id' => ''
        ]);

        $data = request()->except('_token');
        // $data['image'] = '';
        if (request()->hasFile('doc')) {
            $data['doc'] = upload(request()->doc, 'user_files/downloads');
        }
        if (Download::create($data)){
            return redirect()->route('downloads')->with('success', 'Download Doc has been added');
        }
        return redirect()->route('downloads')->with('error', 'Could not add Doc');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Download $downloads)
    {
        return view('downloads.edit', compact('downloads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( Download $downloads)
    {
        $this->validate(\request(), [
            'title' => 'required',
            'content' => '',
            'doc' => 'nullable|mimes:jpg,jpeg,png,pdf,xls',
            'download_category_id' => ''
        ]);
        $data = request()->except('_token');        
        if (request()->hasFile('doc')) {
            if ($downloads && $downloads->doc && is_file(public_path($downloads->doc))){
                @unlink(public_path($downloads->doc));
            }
            $data['doc'] = upload(request()->doc, 'user_files/downloads');
        }   
        if ($downloads->update($data)){
            return redirect()->route('downloads')->with('success', 'Download Doc has been updated');
        }
        return redirect()->route('downloads')->with('error', 'Could not update doc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Download $downloads)
    {
        try {
            if ($downloads->doc && is_file(public_path($downloads->doc))) {
                @unlink(public_path($downloads->doc));
            }
            $downloads->delete();
            return redirect()->back()->with('success', 'Download record has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the selected doc');
        }
    }
}
