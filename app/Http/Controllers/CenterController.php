<?php

namespace App\Http\Controllers;

use App\Models\Center;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile as SymfonyUploadedFile;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('study.index')->with('centres', Center::search()->orderBy('created_at')->latest()->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('study.create');
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
        $image = $this->getUploadedImage($request);

        $this->validate($request, [
            'location' => 'required',
            'center' => 'required',
            'address' => 'required',
            'coordinator' => 'required',
            'phone' => 'required',
        ]);

        $data = $request->except('_token', 'image');
        if ($image) {
            $data['image'] = upload($image, 'user_files/centers');
        } elseif ($request->input('image')) {
            return redirect()->back()->withInput()->with('error', 'Selected image was not uploaded. Please choose the image again.');
        }
        if (Center::create($data)){
            return redirect()->route('study_centre')->with('success', 'Study Center has been added');
        }
        return redirect()->route('study_centre')->with('error', 'Could not add study centre');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Center $study_centre)
    {
        return view('study.edit', compact('study_centre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( Center $study_centre)
    {
        $request = request();
        $this->removeInvalidUploadedFiles($request);
        $image = $this->getUploadedImage($request);

        $this->validate($request, [
            'location' => 'required',
            'center' => 'required',
            'address' => 'required',
            'coordinator' => 'required',
            'phone' => 'required',
        ]);
        $data = $request->except('_token', 'image');
        if ($image) {
            if ($study_centre->image && is_file(public_path($study_centre->image))){
                @unlink(public_path($study_centre->image));
            }
            $data['image'] = upload($image, 'user_files/centers');
        } elseif ($request->input('image')) {
            return redirect()->back()->withInput()->with('error', 'Selected image was not uploaded. Please choose the image again.');
        }
        if ($study_centre->update($data)){
            return redirect()->route('study_centre')->with('success', 'Study Center has been updated');
        }
        return redirect()->route('study_centre')->with('error', 'Could not update Study Center ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Center $study_centre)
    {
        try {
            if ($study_centre->image && is_file(public_path($study_centre->image))) {
                @unlink(public_path($study_centre->image));
            }
            $study_centre->delete();
            return redirect()->back()->with('success', 'Study Center has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the selected Study Center');
        }
    }

    private function removeInvalidUploadedFiles(Request $request)
    {
        $request->files->replace($this->cleanUploadedFiles($request->files->all()));

        if (!$request->files->has('image')) {
            $request->request->remove('image');
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

    private function getUploadedImage(Request $request)
    {
        $image = $request->files->get('image');

        if (!$image instanceof SymfonyUploadedFile && isset($_FILES['image']) && is_array($_FILES['image'])) {
            $uploadedImage = $_FILES['image'];
            $tmpName = isset($uploadedImage['tmp_name']) ? $uploadedImage['tmp_name'] : null;

            if ($tmpName && is_uploaded_file($tmpName)) {
                $image = new SymfonyUploadedFile(
                    $tmpName,
                    isset($uploadedImage['name']) ? $uploadedImage['name'] : 'center-image',
                    isset($uploadedImage['type']) ? $uploadedImage['type'] : null,
                    isset($uploadedImage['size']) ? $uploadedImage['size'] : null,
                    isset($uploadedImage['error']) ? $uploadedImage['error'] : UPLOAD_ERR_OK,
                    true
                );
            }
        }

        if (!$image instanceof SymfonyUploadedFile || !$image->isValid()) {
            return null;
        }

        $imageInfo = @getimagesize($image->getPathname());

        return $imageInfo ? $image : null;
    }
}
