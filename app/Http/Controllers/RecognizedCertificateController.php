<?php

namespace App\Http\Controllers;

use App\Models\RecognizedCertificate;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RecognizedCertificateController extends Controller
{
    public function index()
    {
        return view('recognized_certificates.index')
            ->with('certificates', RecognizedCertificate::search()->latest()->paginate(15));
    }

    public function create()
    {
        return view('recognized_certificates.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'description' => 'nullable',
            'certificate' => 'required|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:8192',
            'status' => 'required|in:0,1',
        ]);

        $data = request()->only('title', 'description', 'status');
        $data['certificate'] = upload(request()->file('certificate'), 'user_files/recognized_certificates');

        if (RecognizedCertificate::create($data)) {
            return redirect()->route('recognized_certificate')->with('success', 'Recognized certificate has been added');
        }

        return redirect()->route('recognized_certificate')->with('error', 'Could not add recognized certificate');
    }

    public function edit(RecognizedCertificate $recognized_certificate)
    {
        return view('recognized_certificates.edit', compact('recognized_certificate'));
    }

    public function update(RecognizedCertificate $recognized_certificate)
    {
        $this->validate(request(), [
            'title' => 'required',
            'description' => 'nullable',
            'certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:8192',
            'status' => 'required|in:0,1',
        ]);

        $data = request()->only('title', 'description', 'status');

        if (request()->hasFile('certificate') && request()->file('certificate')->isValid()) {
            if ($recognized_certificate->certificate && is_file(public_path($recognized_certificate->certificate))) {
                @unlink(public_path($recognized_certificate->certificate));
            }
            $data['certificate'] = upload(request()->file('certificate'), 'user_files/recognized_certificates');
        }

        if ($recognized_certificate->update($data)) {
            return redirect()->route('recognized_certificate')->with('success', 'Recognized certificate has been updated');
        }

        return redirect()->route('recognized_certificate')->with('error', 'Could not update recognized certificate');
    }

    public function delete(RecognizedCertificate $recognized_certificate)
    {
        try {
            if ($recognized_certificate->certificate && is_file(public_path($recognized_certificate->certificate))) {
                @unlink(public_path($recognized_certificate->certificate));
            }
            $recognized_certificate->delete();

            return redirect()->back()->with('success', 'Recognized certificate has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the selected recognized certificate');
        }
    }
}
