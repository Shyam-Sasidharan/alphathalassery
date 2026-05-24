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
        request()->flash();
        $this->validate(\request(), [
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
    
        $filename = null;
        $photo = null;
        $fee = null;
        $file = \request()->certificate;
        $filephoto = \request()->photo;
        $filefee = \request()->fee;
        if($file){
            $filename = explode('.', $file->getClientOriginalName())[0] . '-'.time().'.'.$file->getClientOriginalExtension();
            $admissionData['certificate']=$filename;
            \request()->certificate->move(public_path('user_files/admission'), $filename);
        }
        if($filephoto){
            $photo = explode('.', $filephoto->getClientOriginalName())[0] . '-'.time().'.'.$filephoto->getClientOriginalExtension();
            $admissionData['photo']=$photo;
            \request()->photo->move(public_path('user_files/admission'), $photo);
        }
        if($filefee){ 
            $fee = explode('.', $filefee->getClientOriginalName())[0] . '-'.time().'.'.$filefee->getClientOriginalExtension();
            $admissionData['fee']=$fee;
            \request()->fee->move(public_path('user_files/admission'), $fee);
        }

        
        $admission = new \App\Models\Admission($admissionData);
        //$admission = $admissionData;
        $admission->save();

        $content = [
            'subject' => 'You have received a new enquiry from '.\request('name'),
            'title' => 'Hello!',
            'paragraph' => \request('name'). ' has requested an information at '.config('app.name').'. Details about the request is shown below.',
            'template' => 'emails.admission_template',
            'certificate' => $filename?public_path("user_files/admission/{$filename}"):'',
            'photo' => $photo? public_path("user_files/admission/{$photo}"):'',
            'fee' => $fee?public_path("user_files/admission/{$fee}"):''
        ];

        
        $allContent = array_merge($content, \request()->except('_token', 'certificate', 'photo', 'fee'));
        
        Mail::to('alphits@gmail.com')->send(new Admission(array_merge($content, \request()->except('_token', 'certificate', 'photo', 'fee'))));
        

        
        return back()->with('success', 'Application has been submitted. Our officers will contact you soon...');
    }

}
