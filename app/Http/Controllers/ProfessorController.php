<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile as SymfonyUploadedFile;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('professors.index')->with('professors', Professor::search()->orderBy('created_at')->latest()->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professors.create');
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
            'name' => 'required',
            'content' => 'required',
        ]);

        $data = $request->except('_token', 'image');
        if ($image) {
            $data['image'] = upload($image, 'user_files/professors');
        } else {
            return redirect()->back()->withInput()->with('error', 'Please select a valid professor image');
        }
        if (Professor::create($data)){
            return redirect()->route('professor')->with('success', 'Professor has been added');
        }
        return redirect()->route('professor')->with('error', 'Could not add professor');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Professor $professor)
    {
        return view('professors.edit', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( Professor $professor)
    {
        $request = request();
        $this->removeInvalidUploadedFiles($request);
        $image = $this->getUploadedImage($request);

        $this->validate($request, [
            'name' => 'required',
            'content' => 'required',
        ]);
        $data = $request->except('_token', 'image');
        if ($image) {
            if ($professor && $professor->image && is_file(public_path($professor->image))){
                @unlink(public_path($professor->image));
            }
            $data['image'] = upload($image, 'user_files/professors');
        } elseif ($request->input('image')) {
            return redirect()->back()->withInput()->with('error', 'Selected image was not uploaded. Please choose the image again.');
        }
        if ($professor->update($data)){
            return redirect()->route('professor')->with('success', 'Professor has been updated');
        }
        return redirect()->route('professor')->with('error', 'Could not update professor ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Professor $professor)
    {
        try {
            $professor->delete();
            return redirect()->back()->with('success', 'Professor has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the selected professor');
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
                    isset($uploadedImage['name']) ? $uploadedImage['name'] : 'professor-image',
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
