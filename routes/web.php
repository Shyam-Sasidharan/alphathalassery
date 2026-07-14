<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register', function () {
    return redirect()->route('login');
});

Auth::routes(['register' => false]);


/**
 * Admin Routes
 */

Route::middleware(['auth'])->group(function (){

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::prefix('admin')->group(function(){

        Route::get('courses', "CourseController@index")->name('course');
        Route::get('home_contents', "HomeContentController@index")->name('home_content');
        Route::prefix('home_content')->name("home_content.")->group(function(){
            Route::get('{home_content}/edit', 'HomeContentController@edit')->name('edit');
            Route::post('{home_content}/edit', 'HomeContentController@update')->name('edit');
        });
        Route::prefix('course')->name("course.")->group(function(){
            Route::get('create', 'CourseController@create')->name('create');
            Route::post('create', 'CourseController@store')->name('create');
            Route::get('{course}/edit', 'CourseController@edit')->name('edit');
            Route::post('{course}/edit', 'CourseController@update')->name('edit');
            Route::get('{course}/delete', 'CourseController@delete')->name('delete');
        });

        Route::get('semesters', "SemesterController@index")->name('semester');
        Route::prefix('semester')->name("semester.")->group(function(){
            Route::get('create', 'SemesterController@create')->name('create');
            Route::post('create', 'SemesterController@store')->name('create');
            Route::get('{semester}/edit', 'SemesterController@edit')->name('edit');
            Route::post('{semester}/edit', 'SemesterController@update')->name('edit');
            Route::get('{semester}/delete', 'SemesterController@delete')->name('delete');
        });


        Route::get('categories', "CategoryController@index")->name('category');
        Route::prefix('category')->name("category.")->group(function(){
            Route::get('create', 'CategoryController@create')->name('create');
            Route::post('create', 'CategoryController@store')->name('create');
            Route::get('{category}/edit', 'CategoryController@edit')->name('edit');
            Route::post('{category}/edit', 'CategoryController@update')->name('edit');
            Route::get('{category}/delete', 'CategoryController@delete')->name('delete');
        });

        Route::get('download_categories', "DownloadCategoryController@index")->name('download_category');
        Route::prefix('download_category')->name("download_category.")->group(function(){
            Route::get('create', 'DownloadCategoryController@create')->name('create');
            Route::post('create', 'DownloadCategoryController@store')->name('create');
            Route::get('{download_category}/edit', 'DownloadCategoryController@edit')->name('edit');
            Route::post('{download_category}/edit', 'DownloadCategoryController@update')->name('edit');
            Route::get('{download_category}/delete', 'DownloadCategoryController@delete')->name('delete');
        });

        Route::get('libraries', "LibraryController@index")->name('library');
        Route::prefix('library')->name("library.")->group(function(){
            Route::get('create', 'LibraryController@create')->name('create');
            Route::post('create', 'LibraryController@store')->name('create');
            Route::get('{library}/edit', 'LibraryController@edit')->name('edit');
            Route::post('{library}/edit', 'LibraryController@update')->name('edit');
            Route::get('{library}/delete', 'LibraryController@delete')->name('delete');
        });

        Route::get('gallery', "GalleryController@index")->name('gallery');
        Route::get('page_banners', "PageBannerController@index")->name('page_banner');
        Route::prefix('page_banner')->name("page_banner.")->group(function(){
            Route::get('{page_banner}/edit', 'PageBannerController@edit')->name('edit');
            Route::post('{page_banner}/edit', 'PageBannerController@update')->name('edit');
        });
        Route::get('recognized_certificates', "RecognizedCertificateController@index")->name('recognized_certificate');
        Route::prefix('recognized_certificate')->name("recognized_certificate.")->group(function(){
            Route::get('create', 'RecognizedCertificateController@create')->name('create');
            Route::post('create', 'RecognizedCertificateController@store')->name('create');
            Route::get('{recognized_certificate}/edit', 'RecognizedCertificateController@edit')->name('edit');
            Route::post('{recognized_certificate}/edit', 'RecognizedCertificateController@update')->name('edit');
            Route::get('{recognized_certificate}/delete', 'RecognizedCertificateController@delete')->name('delete');
        });
        Route::get('gallery_folders', "GalleryFolderController@index")->name('gallery_folder');
        Route::prefix('gallery_folder')->name("gallery_folder.")->group(function(){
            Route::get('create', 'GalleryFolderController@create')->name('create');
            Route::post('create', 'GalleryFolderController@store')->name('create');
            Route::get('{gallery_folder}/edit', 'GalleryFolderController@edit')->name('edit');
            Route::post('{gallery_folder}/edit', 'GalleryFolderController@update')->name('edit');
            Route::get('{gallery_folder}/delete', 'GalleryFolderController@delete')->name('delete');
        });
        Route::prefix('gallery')->name("gallery.")->group(function(){
            Route::get('create', 'GalleryController@create')->name('create');
            Route::post('create', 'GalleryController@store')->name('create');
            Route::get('{gallery}/edit', 'GalleryController@edit')->name('edit');
            Route::post('{gallery}/edit', 'GalleryController@update')->name('edit');
            Route::get('{gallery}/delete', 'GalleryController@delete')->name('delete');
        });
        Route::get('publications', "PublicationController@index")->name('publications');
        Route::prefix('publications')->name("publications.")->group(function(){
            Route::get('create', 'PublicationController@create')->name('create');
            Route::post('create', 'PublicationController@store')->name('create');
            Route::get('{publications}/edit', 'PublicationController@edit')->name('edit');
            Route::post('{publications}/edit', 'PublicationController@update')->name('edit');
            Route::get('{publications}/delete', 'PublicationController@delete')->name('delete');
        });

        Route::get('books', "BookController@index")->name('book');
        Route::prefix('book')->name("book.")->group(function(){
            Route::get('create', 'BookController@create')->name('create');
            Route::post('create', 'BookController@store')->name('create');
            Route::get('{book}/edit', 'BookController@edit')->name('edit');
            Route::post('{book}/edit', 'BookController@update')->name('edit');
            Route::get('{book}/delete', 'BookController@delete')->name('delete');
        });

        Route::get('hand-books', "HandBookController@index")->name('hand-book');
        Route::prefix('hand-book')->name("hand-book.")->group(function(){
            Route::get('create', 'HandBookController@create')->name('create');
            Route::post('create', 'HandBookController@store')->name('create');
            Route::get('{hand_book}/edit', 'HandBookController@edit')->name('edit');
            Route::post('{hand_book}/edit', 'HandBookController@update')->name('edit');
            Route::get('{hand_book}/delete', 'HandBookController@delete')->name('delete');
        });

        Route::get('news', "NewsController@index")->name('news');
        Route::prefix('news')->name("news.")->group(function(){
            Route::get('create', 'NewsController@create')->name('create');
            Route::post('create', 'NewsController@store')->name('create');
            Route::get('{news}/edit', 'NewsController@edit')->name('edit');
            Route::post('{news}/edit', 'NewsController@update')->name('edit');
            Route::get('{news}/delete', 'NewsController@delete')->name('delete');
        });
        Route::get('downloads', "DownloadController@index")->name('downloads');
        Route::prefix('downloads')->name("downloads.")->group(function(){
            Route::get('create', 'DownloadController@create')->name('create');
            Route::post('create', 'DownloadController@store')->name('create');
            Route::get('{downloads}/edit', 'DownloadController@edit')->name('edit');
            Route::post('{downloads}/edit', 'DownloadController@update')->name('edit');
            Route::get('{downloads}/delete', 'DownloadController@delete')->name('delete');
        });
        Route::get('study_centres', "CenterController@index")->name('study_centre');
        Route::prefix('study_centre')->name("study_centre.")->group(function(){
            Route::get('create', 'CenterController@create')->name('create');
            Route::post('create', 'CenterController@store')->name('create');
            Route::get('{study_centre}/edit', 'CenterController@edit')->name('edit');
            Route::post('{study_centre}/edit', 'CenterController@update')->name('edit');
            Route::get('{study_centre}/delete', 'CenterController@delete')->name('delete');
        });
        Route::get('faq', "FaqController@index")->name('faq');
        Route::prefix('faq')->name("faq.")->group(function(){
            Route::get('create', 'FaqController@create')->name('create');
            Route::post('create', 'FaqController@store')->name('create');
            Route::get('{faq}/edit', 'FaqController@edit')->name('edit');
            Route::post('{faq}/edit', 'FaqController@update')->name('edit');
            Route::get('{faq}/delete', 'FaqController@delete')->name('delete');
        });
        Route::get('professors', "ProfessorController@index")->name('professor');
        Route::prefix('professor')->name("professor.")->group(function(){
            Route::get('create', 'ProfessorController@create')->name('create');
            Route::post('create', 'ProfessorController@store')->name('create');
            Route::get('{professor}/edit', 'ProfessorController@edit')->name('edit');
            Route::post('{professor}/edit', 'ProfessorController@update')->name('edit');
            Route::get('{professor}/delete', 'ProfessorController@delete')->name('delete');
        });
    });
});
/**
 * Frontend Routes
 */

Route::namespace('Frontend')->group(function(){
    Route::get('/', 'HomeController@index');
    Route::get('about', 'HomeController@about');
    Route::view('contact', 'frontend.contact');
    Route::get('service/{service}', function (\App\Models\Service $service) {
        return view('frontend.service')->withService($service);
    });
    Route::post('/contact', 'HomeController@contact')->name('contact');
    Route::post('/register', 'HomeController@register')->name('register');
    Route::post('/get_publication', 'HomeController@get_publication')->name('get_publication');
    Route::post('subscribe', 'HomeController@subscribe')->name('subscribe');
    Route::get('course/{slug}', function ($slug = NULL) {
        if (is_null($slug)) {
            return back()->with('error', 'Invalid Course');
        }
        $course = \App\Models\Course::whereSlug($slug)->first();
        if (is_null($course)) {
            return back()->with('error', 'Course not found');
        }
        return view('frontend.course')->withCourse($course);
    });
    Route::get('news/{slug}', function ($slug = NULL) {
        if (is_null($slug)) {
            return back()->with('error', 'Invalid Course');
        }
        $news = \App\Models\News::whereSlug($slug)->first();
        if (is_null($news)) {
            return back()->with('error', 'Course not found');
        }
        return view('frontend.news')->withNews($news);
    });
    Route::view('gallery', 'frontend.gallery');
    Route::get('recognized-certificates', function () {
        $certificates = \App\Models\RecognizedCertificate::where('status', 1)->latest()->get();

        return view('frontend.recognized-certificates', compact('certificates'));
    })->name('frontend.recognized_certificates');
    Route::get('recognized-certificate/{recognized_certificate}', function (\App\Models\RecognizedCertificate $recognized_certificate) {
        abort_unless($recognized_certificate->status, 404);

        return view('frontend.recognized-certificate', compact('recognized_certificate'));
    })->name('frontend.recognized_certificate');
    Route::view('courses', 'frontend.courses');
    Route::view('study-centres', 'frontend.study-centres');
    Route::view('publications', 'frontend.publications');
    Route::view('library', 'frontend.library');
    Route::view('downloads', 'frontend.downloads');
    Route::view('bible-apostolate', 'frontend.bible');
    Route::view('faq', 'frontend.faq');
    Route::view('hand-book', 'frontend.hand-book');
});
