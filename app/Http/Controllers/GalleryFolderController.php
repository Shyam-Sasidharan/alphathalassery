<?php

namespace App\Http\Controllers;

use App\Models\GalleryFolder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class GalleryFolderController extends Controller
{
    public function index()
    {
        return view('gallery_folders.index')->with('folders', GalleryFolder::search()->latest()->paginate(15));
    }

    public function create()
    {
        return view('gallery_folders.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
        ]);

        $data = request()->only('name', 'description');
        $data['slug'] = $this->uniqueSlug($data['name']);

        if (GalleryFolder::create($data)) {
            return redirect()->route('gallery_folder')->with('success', 'Gallery folder has been added');
        }

        return redirect()->route('gallery_folder')->with('error', 'Could not add gallery folder');
    }

    public function edit(GalleryFolder $gallery_folder)
    {
        return view('gallery_folders.edit', compact('gallery_folder'));
    }

    public function update(GalleryFolder $gallery_folder)
    {
        $this->validate(request(), [
            'name' => 'required',
        ]);

        $data = request()->only('name', 'description');
        if ($gallery_folder->name !== request('name')) {
            $data['slug'] = $this->uniqueSlug($data['name'], $gallery_folder->id);
        }

        if ($gallery_folder->update($data)) {
            return redirect()->route('gallery_folder')->with('success', 'Gallery folder has been updated');
        }

        return redirect()->route('gallery_folder')->with('error', 'Could not update gallery folder');
    }

    public function delete(GalleryFolder $gallery_folder)
    {
        try {
            $gallery_folder->galleries()->update(['gallery_folder_id' => null]);
            $gallery_folder->delete();

            return redirect()->back()->with('success', 'Gallery folder has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the selected gallery folder');
        }
    }

    private function uniqueSlug($name, $ignoreId = null)
    {
        $base = Str::slug($name);
        $slug = $base ?: 'gallery-folder';
        $count = 1;

        while ($this->slugExists($slug, $ignoreId)) {
            $slug = $base . '-' . $count++;
        }

        return $slug;
    }

    private function slugExists($slug, $ignoreId = null)
    {
        $query = GalleryFolder::where('slug', $slug);

        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        return $query->exists();
    }
}
