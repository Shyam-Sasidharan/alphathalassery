<?php

namespace App\Http\Controllers;

use App\Models\PageBanner;

class PageBannerController extends Controller
{
    public function index()
    {
        return view('page_banners.index')->with('banners', PageBanner::search()->orderBy('page_key')->paginate(15));
    }

    public function edit(PageBanner $page_banner)
    {
        return view('page_banners.edit', compact('page_banner'));
    }

    public function update(PageBanner $page_banner)
    {
        $this->validate(request(), [
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|max:4096',
        ]);

        $data = request()->only('title', 'description');

        if (request()->hasFile('image') && request()->file('image')->isValid()) {
            $data['image'] = upload(request()->file('image'), 'user_files/page_banners');
        }

        if ($page_banner->update($data)) {
            return redirect()->route('page_banner')->with('success', 'Page banner has been updated');
        }

        return redirect()->route('page_banner')->with('error', 'Could not update page banner');
    }
}
