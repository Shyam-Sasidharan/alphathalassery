<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\Notification;
use App\Mail\Quote;
use App\Mail\Admission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{


    /**
     * Home page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.index');
    }

    /**
     * Language Switcher
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleLang()
    {
        session()->put('lang', session('lang', 'en') === 'en' ? 'ar': 'en');
        return redirect()->back();
    }

    public function about()
    {
        return view('frontend.about');
    }


    public function contact()
    {
        $this->validate(\request(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required|min:5',
            'captcha' => 'required|captcha'
        ]);


        $content = [
            'subject' => 'You have received a new enquiry from '.config('app.name'),
            'title' => 'Hello!',
            'paragraph' => \request('name'). ' has requested an information at '.config('app.name').'. Details about the request is shown below.'
        ];

        Mail::to('alphits@gmail.com')->send(new Notification(array_merge($content, \request()->except('_token'))));
        
        return redirect()->to('contact')->with('success', 'Enquiry has been submitted. We will Contact you Soon');
    }

    public function get_publication()
    {
        $this->validate(\request(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'pub_name' => 'required',
            'address' => 'required'
        ]);


        $content = [
            'subject' => 'You have received a new enquiry from '.config('app.name'),
            'title' => 'Hello!',
            'pub_name' => \request('pub_name', 'General Enquiry'),
            'paragraph' => \request('name'). ' has requested an information at '.config('app.name').'. Details about the request is shown below.'
        ];
        Mail::to('alphits@gmail.com')->send(new Quote(array_merge($content, \request()->except('_token'))));

        return redirect()->to('publications')->with('success', 'Enquiry has been submitted');
    }

    public function register()
    {
        $colleges = [
            'ahirs' => 'Alpha Higher Institute of Religious Sciences',
            'tacrs' => 'Tely Alpha Center For Religious Sciences',
        ];

        foreach (['certificate', 'photo', 'fee'] as $fileField) {
            if (isset($_FILES[$fileField]) && (int) ($_FILES[$fileField]['error'] ?? UPLOAD_ERR_OK) === UPLOAD_ERR_NO_FILE) {
                \request()->files->remove($fileField);
                unset($_FILES[$fileField]);
            }
        }

        if (! \request()->filled('college')) {
            \request()->merge(['college' => 'ahirs']);
        }

        request()->flash();
        $this->validate(\request(), [
            'college' => 'required|in:ahirs,tacrs',
            'course' => 'required',
            'centre' => '',
            'language' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'dob' => 'required',
            'sex' => 'required',
            'nationality' => 'required',
            'marital' => 'required',
            'diocese' => '',
            'parish' => '',
            'qualification' => 'required',
            'occupation' => '',
            'address' => 'required',
            'certificate' => 'nullable|mimes:pdf',
            'photo' => 'nullable|image',
            'fee' => 'nullable|mimes:pdf,xlsx,xls',
            'captcha' => 'required|captcha'
        ], ['captcha'=>'Invalid captcha']);

        $admissionData = \request()->except('_token', 'certificate', 'photo', 'fee');
        $admissionData['college'] = $colleges[\request('college')];
    
        $filename = null;
        $photo = null;
        $fee = null;
        $file = \request()->file('certificate');
        $filephoto = \request()->file('photo');
        $filefee = \request()->file('fee');
        if($file && $file->isValid()){
            $filename = explode('.', $file->getClientOriginalName())[0] . '-'.time().'.'.$file->getClientOriginalExtension();
            $admissionData['certificate']=$filename;
            $file->move(public_path('user_files/admission'), $filename);
        }
        if($filephoto && $filephoto->isValid()){
            $photo = explode('.', $filephoto->getClientOriginalName())[0] . '-'.time().'.'.$filephoto->getClientOriginalExtension();
            $admissionData['photo']=$photo;
            $filephoto->move(public_path('user_files/admission'), $photo);
        }
        if($filefee && $filefee->isValid()){
            $fee = explode('.', $filefee->getClientOriginalName())[0] . '-'.time().'.'.$filefee->getClientOriginalExtension();
            $admissionData['fee']=$fee;
            $filefee->move(public_path('user_files/admission'), $fee);
        }

        
        $admission = new \App\Models\Admission($admissionData);
        //$admission = $admissionData;
        $admission->save();

        $content = [
            'subject' => $admissionData['college'].' registration from '.\request('name'),
            'title' => 'Hello!',
            'paragraph' => \request('name'). ' has submitted a registration for '.$admissionData['college'].'. Details about the request is shown below.',
            'template' => 'emails.admission_template',
            'certificate' => $filename?public_path("user_files/admission/{$filename}"):'',
            'photo' => $photo? public_path("user_files/admission/{$photo}"):'',
            'fee' => $fee?public_path("user_files/admission/{$fee}"):''
        ];

        
        $allContent = array_merge($content, $admissionData);
        
        Mail::to('alphits@gmail.com')->send(new Admission($allContent));
        

        
        return back()->with('success', 'Application has been submitted. Our officers will contact you soon...');
    }

}
