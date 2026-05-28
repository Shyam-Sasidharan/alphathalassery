<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile as SymfonyUploadedFile;

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
        $request = request();
        $this->removeInvalidUploadedFiles($request);
        $doc = $this->getUploadedDoc($request);

        $this->validate($request, [
            'title' => 'required',
            'content' => '',
            'download_category_id' => ''
        ]);

        $data = $request->except('_token', 'doc');
        if ($doc) {
            $data['doc'] = upload($doc, 'user_files/downloads');
        } else {
            return redirect()->back()->withInput()->with('error', 'Please select a valid download file');
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
        $request = request();
        $this->removeInvalidUploadedFiles($request);
        $doc = $this->getUploadedDoc($request);

        $this->validate($request, [
            'title' => 'required',
            'content' => '',
            'download_category_id' => ''
        ]);
        $data = $request->except('_token', 'doc');
        if ($doc) {
            if ($downloads && $downloads->doc && is_file(public_path($downloads->doc))){
                @unlink(public_path($downloads->doc));
            }
            $data['doc'] = upload($doc, 'user_files/downloads');
        } elseif ($request->input('doc')) {
            return redirect()->back()->withInput()->with('error', 'Selected file was not uploaded. Please choose the file again.');
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

    private function removeInvalidUploadedFiles(Request $request)
    {
        $request->files->replace($this->cleanUploadedFiles($request->files->all()));

        if (!$request->files->has('doc')) {
            $request->request->remove('doc');
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

    private function getUploadedDoc(Request $request)
    {
        $doc = $request->files->get('doc');

        if (!$doc instanceof SymfonyUploadedFile && isset($_FILES['doc']) && is_array($_FILES['doc'])) {
            $uploadedDoc = $_FILES['doc'];
            $tmpName = isset($uploadedDoc['tmp_name']) ? $uploadedDoc['tmp_name'] : null;

            if ($tmpName && is_uploaded_file($tmpName)) {
                $doc = new SymfonyUploadedFile(
                    $tmpName,
                    isset($uploadedDoc['name']) ? $uploadedDoc['name'] : 'download-file',
                    isset($uploadedDoc['type']) ? $uploadedDoc['type'] : null,
                    isset($uploadedDoc['size']) ? $uploadedDoc['size'] : null,
                    isset($uploadedDoc['error']) ? $uploadedDoc['error'] : UPLOAD_ERR_OK,
                    true
                );
            }
        }

        if (!$doc instanceof SymfonyUploadedFile || !$doc->isValid()) {
            return null;
        }

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'xls', 'xlsx'];
        $extension = strtolower($doc->getClientOriginalExtension());

        return in_array($extension, $allowedExtensions) ? $doc : null;
    }
}
