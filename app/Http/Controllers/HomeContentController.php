<?php

namespace App\Http\Controllers;

use App\Models\HomeContent;

class HomeContentController extends Controller
{
    public function index()
    {
        return view('home_contents.index')
            ->with('contents', HomeContent::search()->orderBy('section_key')->paginate(15));
    }

    public function edit(HomeContent $home_content)
    {
        return view('home_contents.edit', compact('home_content'));
    }

    public function update(HomeContent $home_content)
    {
        $this->validate(request(), [
            'title' => 'required',
            'description' => 'nullable',
        ]);

        if ($home_content->update(request()->only('title', 'description'))) {
            return redirect()->route('home_content')->with('success', 'Home content has been updated');
        }

        return redirect()->route('home_content')->with('error', 'Could not update home content');
    }
}
