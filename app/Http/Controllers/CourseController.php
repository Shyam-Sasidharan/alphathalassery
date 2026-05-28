<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile as SymfonyUploadedFile;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses.index')->with('courses', Course::search()->orderBy('created_at')->latest()->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
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
        $pdf = $this->getUploadedPdf($request);

        $this->validate($request, [
            'name' => 'required',
            'home_content' => 'required',
            'content' => 'required',
            'duration' => '',
            'mode' => '',
            'type' => '',
            'intake' => '',
            'fee' => '',
            'heading' => '',
        ]);

        $data = $request->except('_token', 'image', 'pdf');
        $data['slug'] = '';
        $data['heading'] = $request->input('heading') ?: '';
        $data['image'] = '';
        $data['pdf'] = '';
        if ($image) {
            $data['image'] = upload($image, 'user_files/course');
        } elseif ($request->input('image')) {
            return redirect()->back()->withInput()->with('error', 'Selected image was not uploaded. Please choose the image again.');
        }
        if ($pdf) {
            $data['pdf'] = upload($pdf, 'user_files/course');
        } elseif ($request->input('pdf')) {
            return redirect()->back()->withInput()->with('error', 'Selected PDF was not uploaded. Please choose the PDF again.');
        }
        if (Course::create($data)){
            return redirect()->route('course')->with('success', 'Course has been added');
        }
        return redirect()->route('course')->with('error', 'Could not add course');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( Course $course)
    {
        $request = request();
        $this->removeInvalidUploadedFiles($request);
        $image = $this->getUploadedImage($request);
        $pdf = $this->getUploadedPdf($request);

        $this->validate($request, [
            'name' => 'required',
            'home_content' => 'required',
            'content' => 'required',
            'duration' => '',
            'mode' => '',
            'type' => '',
            'intake' => '',
            'fee' => '',
            'heading' => '',
        ]);
        $data = $request->except('_token', 'image', 'pdf');
        $data['slug'] = '';
        $data['heading'] = $request->input('heading') ?: '';
        if ($image) {
            if ($course && $course->image && is_file(public_path($course->image))){
                @unlink(public_path($course->image));
            }
            $data['image'] = upload($image, 'user_files/course');
        } elseif ($request->input('image')) {
            return redirect()->back()->withInput()->with('error', 'Selected image was not uploaded. Please choose the image again.');
        }
        if ($pdf) {
            if ($course && $course->pdf && is_file(public_path($course->pdf))){
                @unlink(public_path($course->pdf));
            }
            $data['pdf'] = upload($pdf, 'user_files/course');
        } elseif ($request->input('pdf')) {
            return redirect()->back()->withInput()->with('error', 'Selected PDF was not uploaded. Please choose the PDF again.');
        }
        if ($course->update($data)){
            return redirect()->route('course')->with('success', 'Course has been updated');
        }
        return redirect()->route('course')->with('error', 'Could not update course ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Course $course)
    {
        try {
            $course->delete();
            return redirect()->back()->with('success', 'Course record has been deleted');
        } catch (ModelNotFoundException $ex) {
            return redirect()->back()->with('error', 'Could not find the selected course');
        }
    }

    private function removeInvalidUploadedFiles(Request $request)
    {
        $request->files->replace($this->cleanUploadedFiles($request->files->all()));

        foreach (['image', 'pdf'] as $field) {
            if (!$request->files->has($field)) {
                $request->request->remove($field);
            }
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
        $image = $this->getUploadedFile($request, 'image', 'course-image');

        if (!$image) {
            return null;
        }

        return @getimagesize($image->getPathname()) ? $image : null;
    }

    private function getUploadedPdf(Request $request)
    {
        $pdf = $this->getUploadedFile($request, 'pdf', 'course-document');

        if (!$pdf) {
            return null;
        }

        return strtolower($pdf->getClientOriginalExtension()) === 'pdf' ? $pdf : null;
    }

    private function getUploadedFile(Request $request, $field, $fallbackName)
    {
        $file = $request->files->get($field);

        if (!$file instanceof SymfonyUploadedFile && isset($_FILES[$field]) && is_array($_FILES[$field])) {
            $uploadedFile = $_FILES[$field];
            $tmpName = isset($uploadedFile['tmp_name']) ? $uploadedFile['tmp_name'] : null;

            if ($tmpName && is_uploaded_file($tmpName)) {
                $file = new SymfonyUploadedFile(
                    $tmpName,
                    isset($uploadedFile['name']) ? $uploadedFile['name'] : $fallbackName,
                    isset($uploadedFile['type']) ? $uploadedFile['type'] : null,
                    isset($uploadedFile['size']) ? $uploadedFile['size'] : null,
                    isset($uploadedFile['error']) ? $uploadedFile['error'] : UPLOAD_ERR_OK,
                    true
                );
            }
        }

        return $file instanceof SymfonyUploadedFile && $file->isValid() ? $file : null;
    }
}
