<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Category;
use Symfony\Component\HttpFoundation\File\UploadedFile as SymfonyUploadedFile;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('publications.index')->with('publications', Publication::with('category')->search()->latest()->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publications.create');
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
            'author' => 'required',
            'price' => '',
            'category_id' => '',
        ]);

        $data = $request->except('_token', 'image');
        $data['slug'] = '';
        if ($image) {
            $data['image'] = upload($image, 'user_files/publications');
        } elseif ($request->input('image')) {
            return redirect()->back()->withInput()->with('error', 'Selected image was not uploaded. Please choose the image again.');
        }
        if (Publication::create($data)){
            return redirect()->route('publications')->with('success', 'Publication has been added');
        }
        return redirect()->route('publications')->with('error', 'Could not add publication');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Publication $publications)
    {
        return view('publications.edit', compact('publications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( Publication $publications)
    {
        $request = request();
        $this->removeInvalidUploadedFiles($request);
        $image = $this->getUploadedImage($request);

        $this->validate($request, [
            'name' => 'required',
            'content' => 'required',
            'author' => 'required',
            'price' => '',
            'category_id' => '',
        ]);
        $data = $request->except('_token', 'image');
        $data['slug'] = '';       
        if ($image) {
            if ($publications && $publications->image && is_file(public_path($publications->image))){
                @unlink(public_path($publications->image));
            }
            $data['image'] = upload($image, 'user_files/publications');
        } elseif ($request->input('image')) {
            return redirect()->back()->withInput()->with('error', 'Selected image was not uploaded. Please choose the image again.');
        }
        if ($publications->update($data)){
            return redirect()->route('publications')->with('success', 'Publication has been updated');
        }
        return redirect()->route('publications')->with('error', 'Could not update publication ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Publication $publications)
    {
        try {
            if ($publications->image && is_file(public_path($publications->image))) {
                @unlink(public_path($publications->image));
            }
            $publications->delete();
            return redirect()->back()->with('success', 'Publication record has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the selected publication');
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
                    isset($uploadedImage['name']) ? $uploadedImage['name'] : 'publication-image',
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
