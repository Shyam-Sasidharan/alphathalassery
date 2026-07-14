@extends('layouts.alpha')

@section('title', 'The Alpha Institute | Tely-Alpha Portal')

@section('css')
<style>
    .professor-carousel,
    .gallery-carousel {
        scrollbar-width: none;
    }

    .professor-carousel::-webkit-scrollbar,
    .gallery-carousel::-webkit-scrollbar {
        display: none;
    }

    .professor-card,
    .gallery-card {
        box-shadow: 0 18px 40px rgba(27, 28, 28, 0.08);
    }
</style>
@endsection

@section('content')
<!-- Latest Updates Ticker Section -->
<section class="mt-4 mb-4">
    <div class="max-w-[1400px] mx-auto px-[2%]">
        <div class="bg-primary-container/10 border-y border-outline-variant/20 overflow-hidden py-3 flex items-center">
            <div class="flex-none bg-primary text-on-primary px-4 py-1 rounded-sm text-[10px] font-bold uppercase tracking-[0.2em] mr-6 z-10 shadow-sm ml-4">
                Latest Updates
            </div>
            <div class="flex-grow overflow-hidden relative">
                <div class="animate-ticker whitespace-nowrap">
                    @php
                        $newsItems = \App\Models\News::latest()->take(5)->get();
                    @endphp
                    @if($newsItems->count() > 0)
                        <!-- First set -->
                        <div class="flex items-center gap-12 px-6">
                            @foreach($newsItems as $news)
                                <span class="flex items-center gap-2 text-primary font-['Noto_Serif'] text-sm font-bold">
                                    <span class="material-symbols-outlined text-tertiary text-sm">campaign</span>
                                    <a href="{{ url('news/'.$news->slug) }}">{{ $news->title }}</a>
                                </span>
                                <span class="w-1 h-1 bg-outline rounded-full"></span>
                            @endforeach
                        </div>
                        <!-- Duplicate for infinite loop -->
                        <div class="flex items-center gap-12 px-6">
                            @foreach($newsItems as $news)
                                <span class="flex items-center gap-2 text-primary font-['Noto_Serif'] text-sm font-bold">
                                    <span class="material-symbols-outlined text-tertiary text-sm">campaign</span>
                                    <a href="{{ url('news/'.$news->slug) }}">{{ $news->title }}</a>
                                </span>
                                <span class="w-1 h-1 bg-outline rounded-full"></span>
                            @endforeach
                        </div>
                    @else
                        <div class="flex items-center gap-12 px-6">
                            <span class="flex items-center gap-2 text-primary font-['Noto_Serif'] text-sm font-bold">
                                <span class="material-symbols-outlined text-tertiary text-sm">campaign</span>
                                Admissions open for {{ date('Y') }} Academic Year
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hero Section -->
<section class="min-h-screen pt-4 pb-12 px-[4%]">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 h-[819px] min-h-[600px]">
        <!-- Alpha Higher Institute Side -->
        <div class="relative group overflow-hidden rounded-xl bg-primary">
            <img class="absolute inset-0 w-full h-full object-cover opacity-60 transition-transform duration-700 group-hover:scale-105" src="{{ asset('front/images/alpha-higher-institute-background.png') }}" alt="Alpha Higher Institute of Religious Sciences"/>
            <div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/20 to-transparent"></div>
            <div class="relative h-full flex flex-col justify-end p-12 text-on-primary">
                <span class="font-label text-xs uppercase tracking-[0.3em] text-tertiary-fixed mb-4"></span>
                <h1 class="font-headline text-4xl md:text-5xl font-black mb-6 leading-tight max-w-md">Alpha Higher Institute of Religious Sciences</h1>
                <p class="font-body text-lg text-on-primary/80 mb-8 max-w-sm">Linked with Dharmaram Vidya Kshetram, Bengalauru.</p>
                <div class="flex">
                    <a href="{{ url('courses?college=ahirs') }}" class="bg-tertiary-fixed text-on-tertiary-fixed px-8 py-4 rounded-md font-bold flex items-center gap-3 hover:bg-white transition-colors group/btn">
                        Enter Institute
                        <span class="material-symbols-outlined text-lg group-hover/btn:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Tely-Alpha Center Side -->
        <div class="relative group overflow-hidden rounded-xl bg-primary-container">
            <img class="absolute inset-0 w-full h-full object-cover opacity-60 transition-transform duration-700 group-hover:scale-105" src="{{ asset('front/images/tely-alpha-center-background.png') }}" alt="Tely-Alpha Center For Religious Science"/>
            <div class="absolute inset-0 bg-gradient-to-t from-primary-container via-primary-container/20 to-transparent"></div>
            <div class="relative h-full flex flex-col justify-end p-12 text-on-primary">
                <span class="font-label text-xs uppercase tracking-[0.3em] text-tertiary-fixed mb-4"></span>
                <h1 class="font-headline text-4xl md:text-5xl font-black mb-6 leading-tight max-w-md">Tely-Alpha Center For Religious Science</h1>
                <p class="font-body text-lg text-on-primary/80 mb-8 max-w-sm">Run by the Archdiocese of Tellicherry.</p>
                <div class="flex">
                    <a href="{{ url('courses?college=tacrs') }}" class="bg-tertiary-fixed text-on-tertiary-fixed px-8 py-4 rounded-md font-bold flex items-center gap-3 hover:bg-white transition-colors group/btn">
                        Enter Institute
                        <span class="material-symbols-outlined text-lg group-hover/btn:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
@php
    $welcomeContent = \App\Models\HomeContent::where('section_key', 'welcome')->first();
    $welcomeTitle = $welcomeContent && trim($welcomeContent->title) ? $welcomeContent->title : 'Welcome to Alpha Center for Theology and Science';
    $welcomeDescription = $welcomeContent && trim($welcomeContent->description) ? $welcomeContent->description : 'The Alpha Institute stands as the guardian of dual legacies. While the Higher Institute focuses on the rigorous intellectual framework of theology, the Tely-Alpha Center serves as the experiential heart, curating the living history of religious expression. Together, we provide a holistic education that honors both the mind and the spirit.';
@endphp
<section class="max-w-7xl mx-auto py-24 px-12 grid grid-cols-1 md:grid-cols-12 gap-12 items-center">
    <div class="md:col-span-5 relative">
        <div class="aspect-square rounded-xl overflow-hidden shadow-2xl">
            <img class="w-full h-full object-cover" src="{{ asset('front/images/alpha2.jpg') }}" alt="Alpha Institute project ceremony"/>
        </div>
        <div class="absolute -bottom-8 -right-8 bg-tertiary-fixed p-8 rounded-xl shadow-xl hidden lg:block">
            <span class="font-headline italic text-2xl text-on-tertiary-fixed block">Established 2008</span>
            <span class="font-label text-xs uppercase tracking-widest text-on-tertiary-fixed opacity-70"></span>
        </div>
    </div>
    <div class="md:col-span-7 space-y-8">
        <h2 class="font-headline text-3xl font-black text-primary tracking-tight">{{ $welcomeTitle }}
            {{-- <br/><span class="italic text-tertiary">Two Paths.</span> --}}
        </h2>
        <p class="font-body text-xl leading-relaxed text-on-surface-variant">
            {!! nl2br(e($welcomeDescription)) !!}
        </p>
        <div class="grid grid-cols-2 gap-8 pt-4 hidden">
            <div class="border-l-4 border-tertiary-fixed pl-6">
                <div class="text-3xl font-headline font-bold text-primary">12k+</div>
                <div class="font-label text-sm text-on-surface-variant uppercase tracking-wider">Research Papers</div>
            </div>
            <div class="border-l-4 border-tertiary-fixed pl-6">
                <div class="text-3xl font-headline font-bold text-primary">45</div>
                <div class="font-label text-sm text-on-surface-variant uppercase tracking-wider">Global Affiliates</div>
            </div>
        </div>
    </div>
</section>

<!-- Courses Offered Section -->
<section class="bg-surface-container-low py-16">
    <div class="max-w-7xl mx-auto px-6 md:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,2fr)_minmax(340px,1fr)] gap-10">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="font-headline text-4xl font-bold text-primary mb-2">Courses Offered</h2>
                    <p class="text-on-surface-variant font-body">Distinguished programs of study across our two institutions.</p>
                </div>
                <a href="{{ url('courses') }}" class="text-primary font-bold hover:underline flex items-center gap-2">
                    View All Programs
                    <span class="material-symbols-outlined text-sm">arrow_right_alt</span>
                </a>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,2fr)_minmax(340px,1fr)] gap-10 items-start">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @php
                $ahirs = \App\Models\Course::where('college', 'ahirs')->latest()->take(4)->get();
                $tacrs = \App\Models\Course::where('college', 'tacrs')->latest()->take(4)->get();
            @endphp
            <!-- AHIRS Column -->
            <div>
                <div class="flex items-center gap-4 mb-4">
                    <h3 class="font-label text-xs font-bold uppercase tracking-[0.4em] text-primary">Alpha Higher Institute (AHIRS)</h3>
                    <div class="h-px flex-grow bg-outline-variant/30"></div>
                </div>
                <div class="space-y-5">
                    @forelse($ahirs as $course)
                        <article class="rounded-xl bg-surface p-7 border border-outline-variant/10 shadow-sm hover:shadow-md transition-shadow group">
                            <h4 class="font-headline font-bold text-xl mb-2 group-hover:text-primary transition-colors">
                                <a href="{{ url('course/'.$course->slug) }}">{{ $course->name }}</a>
                            </h4>
                            <p class="text-sm leading-relaxed text-on-surface-variant line-clamp-3">{!! strip_tags($course->home_content) !!}</p>
                        </article>
                    @empty
                        <p class="text-sm text-on-surface-variant">No AHIRS courses available.</p>
                    @endforelse
                </div>
            </div>
            <!-- TACRS Column -->
            <div>
                <div class="flex items-center gap-4 mb-4">
                    <h3 class="font-label text-xs font-bold uppercase tracking-[0.4em] text-secondary">Tely-Alpha Center (TACRS)</h3>
                    <div class="h-px flex-grow bg-outline-variant/30"></div>
                </div>
                <div class="space-y-5">
                    @forelse($tacrs as $course)
                        <article class="rounded-xl bg-surface p-7 border border-outline-variant/10 shadow-sm hover:shadow-md transition-shadow group">
                            <h4 class="font-headline font-bold text-xl mb-2 group-hover:text-secondary transition-colors">
                                <a href="{{ url('course/'.$course->slug) }}">{{ $course->name }}</a>
                            </h4>
                            <p class="text-sm leading-relaxed text-on-surface-variant line-clamp-3">{!! strip_tags($course->home_content) !!}</p>
                        </article>
                    @empty
                        <p class="text-sm text-on-surface-variant">No TACRS courses available.</p>
                    @endforelse
                </div>
            </div>
            </div>

        @php
            $alphaInstituteLeaders = [
                [
                    'name' => 'Moran Mor Baselios Cardinal Cleemis',
                    'role' => 'Major Archbishop, CBCI President',
                    'date' => '18 May 2016',
                    'image' => 'front/images/moran-more.jpg',
                    'detail_image' => 'front/images/moran-mor-footer.jpg',
                    'content' => [
                        'Alpha Institute is doing a wonderful service in our country for the theological training of the laity and the religious. The students of Alpha Institute include Catholic faithful from all three Catholic rites of the nation, namely Syro-Malabar, Latin, and Syro-Malankara. Students from other Christian denominations are also making use of the courses run by the Institute. The pedagogical methodology of the Institute makes use of modern social communication facilities, including regular theology classes telecast through the Shalom television network, and has made Catholic theology more popular in our region. The syllabus followed, as well as the faculty of the Institute, is of reputable excellence.',
                    ],
                ],
                [
                    'name' => 'Mar Andrews Thazath',
                    'role' => 'Archbishop, KCBC President',
                    'date' => '10 December 2013',
                    'image' => 'front/images/Mar-Andrews-Thazhathu.jpg',
                    'detail_image' => 'front/images/mar-andrews-thazhath-footer.jpg',
                    'content' => [
                        'As the President of the Catholic Bishop’s conference of India (CBCI) I write this letter to recommend Alpha Center for Theology and Religious Science, Tellicherry. Alpha Institute is doing a great service in our country for the theological training of the laity and the religious. The pedagogical methodology of the Institute that includes modern social communication facilities including the regular theology classes telecast through television network.',
                        'Another motivation for the launching of Alpha Institute is to make the opportunity for theological pursuit to the laity who are interested in learning theology. The Indian Theology Institutes are mainly meant for the formation of the priestly candidates. Consequently, the laity get little chance to pursue their theological aspirations. More over the time-schedule in the seminaries are not applicable to the laity who are working throughout the year. As Alpha Institute is erected with the sole purpose of theological studies and research, it opens new horizons in the field of academic excellence irrespective of the life statuses availing the time schedule according to their convenience.',
                    ],
                ],
                [
                    'name' => 'Archbishop Mar George Valiamattam',
                    'role' => 'Archbishop, Founder',
                    'image' => 'front/images/valiamattam.jpg',
                    'detail_image' => 'front/images/valiamattam_header.jpg',
                    'signature_image' => 'front/images/valiyamattam_footer.jpg',
                    'content' => [
                        'I, George Valiamattam, Archbishop of Tellicherry, by the power invested in me by the grace of God and the consent of the Supreme Pontiff of the Holy See, hereby declare the erection of Alpha Center for Theology and Science for the theological formation of the Catholic laity and the religious. The following are the mandates for the Institute:',
                        'The aim of the Alpha Institute is to promote study and research in the various fields of Catholic theology, with special emphasis on Asian Christian theology. The research program is intended to bring about personal integration in the life of individuals and the Church on theological, spiritual, religious, psychological, and social levels. The Institute is intended to foster harmony among the three levels of Christian life, namely devotion, knowledge, and action.',
                        'The Institute is intended to teach solid Catholic theology in its spotless originality. The Higher Academic Council, headed by the Archbishop of Tellicherry, will verify the content of the curriculum annually. The Institute is erected with the goal of encouraging clear and creative thinking, in consonance with the teachings of the Holy Catholic Church and the dictates of the Gospel, in the context of Asian religious and spiritual traditions, conducive to an experience of the supreme Truth through selfless service and loving commitment.',
                        'The Institute is erected with the goal of defending the Catholic faith from the ever-increasing challenges raised by modern atheistic and agnostic ideologies. The creedal dilemma among the faithful caused by various sectarian groups must be clarified in a timely manner.',
                    ],
                ],
                [
                    'name' => 'Mar Joseph Pamplany',
                    'role' => 'Co-Patron',
                    'image' => 'front/images/Pamplany.jpg',
                    'detail_image' => 'front/images/pamplany_header.jpg',
                    'signature_image' => 'front/images/pamplany_footer.jpg',
                    'content' => [
                        'His Grace Archbishop Mar George Valiamattam, the former Vice-President of the Catholic Bishops Conference of India (CBCI), founded this Institute in 2006. His Grace Archbishop Mar George Njaralakatt, the Metropolitan Archbishop of Tellicherry, is the present Chancellor of the Institute. Both KCBC and CBCI have given approval to its courses.',
                        'It organizes studies with an interdisciplinary or multidisciplinary approach. Courses are guided by renowned scholars of international standing. The experienced expertise of scholars who have accomplished doctoral and post-doctoral research in Roman and other European universities is competent to guide research in Sacred Scripture, Biblical Archaeology, various branches of theology, and philosophy.',
                        'The research program is intended to bring about personal integration in the lives of individuals and the Church on theological, spiritual, religious, psychological, and social levels. The Institute fosters the harmony of devotion, knowledge, and action. While striving hard to excel in serious study and research, every student is encouraged to do his or her best to realize the harmony of loving devotion, wisdom, and activity in a spirit of selfless service for the Holy Catholic Church.',
                        'The Institute is authorized to issue appropriate course certificates to students who have successfully completed all academic requirements. The Board of Examiners, constituted by the Higher Academic Council of the Institute, will be the competent scrutinizing authority for issuing certificates. In due course, the Institute may approach other ecclesiastical universities for affiliation and recognition.',
                        'At present, Alpha Institute has 72 study centers across the world, covering 10 nationalities.',
                    ],
                ],
            ];
        @endphp

        <aside class="overflow-hidden border border-outline-variant/30 bg-surface-container-lowest shadow-sm">
            <div class="bg-[#1377b8] px-6 py-5 text-center">
                <h2 class="font-label text-xl font-bold uppercase tracking-wide text-white">On Alpha Institute</h2>
            </div>
            @foreach($alphaInstituteLeaders as $leader)
                <article
                    tabindex="0"
                    role="button"
                    class="group flex cursor-pointer items-center gap-4 border-t border-outline-variant/30 px-5 py-4 transition-colors hover:bg-surface-container-low focus:bg-surface-container-low focus:outline-none"
                    data-leader-details
                    data-leader-name="{{ $leader['name'] }}"
                    data-leader-role="{{ $leader['role'] }}"
                    data-leader-date="{{ isset($leader['date']) ? $leader['date'] : '' }}"
                    data-leader-image="{{ asset($leader['image']) }}"
                    data-leader-detail-image="{{ asset($leader['detail_image']) }}"
                    data-leader-signature-image="{{ isset($leader['signature_image']) ? asset($leader['signature_image']) : '' }}"
                    data-leader-content="{{ isset($leader['content']) ? e(json_encode($leader['content'])) : '[]' }}"
                    aria-label="View details for {{ $leader['name'] }}"
                >
                    <div class="h-20 w-20 shrink-0 overflow-hidden rounded-full border-4 border-white bg-surface-container-high shadow-md">
                        <img
                            class="h-full w-full object-cover object-top transition-transform duration-500 group-hover:scale-105"
                            src="{{ asset($leader['image']) }}"
                            alt="{{ $leader['name'] }}"
                        />
                    </div>
                    <div class="min-w-0">
                        <h3 class="font-headline text-lg font-bold leading-snug text-on-surface">{{ $leader['name'] }}</h3>
                        <p class="mt-1 font-label text-xs text-on-surface-variant">{{ $leader['role'] }}</p>
                    </div>
                </article>
            @endforeach
        </aside>
        </div>
    </div>
</section>

<div id="leaderDetailsModal" class="fixed inset-0 z-[100] hidden items-start justify-center overflow-y-auto bg-black/70 p-4 md:py-8" role="dialog" aria-modal="true" aria-labelledby="leaderDetailsName">
    <div class="relative my-auto max-h-[90vh] w-full max-w-3xl overflow-y-auto rounded-2xl bg-surface shadow-2xl">
        <button type="button" class="absolute right-4 top-4 z-10 flex h-10 w-10 items-center justify-center rounded-full bg-surface/90 text-primary shadow" data-leader-details-close aria-label="Close details">
            <span class="material-symbols-outlined">close</span>
        </button>
        <div>
            <div class="flex flex-col justify-center p-8 md:p-10">
                <span class="font-label text-xs font-bold uppercase tracking-[0.25em] text-tertiary">On Alpha Institute</span>
                <p id="leaderDetailsDate" class="mt-3 hidden font-label text-xs font-bold uppercase tracking-wider text-outline"></p>
                <h2 id="leaderDetailsName" class="mt-3 font-headline text-3xl font-bold leading-tight text-primary"></h2>
                <p id="leaderDetailsRole" class="mt-4 font-label text-sm font-bold uppercase tracking-wider text-on-surface-variant"></p>
                <div class="mt-7 border-t border-outline-variant/20 pt-6">
                    <img id="leaderDetailsOfficial" class="max-h-28 w-full object-contain object-left" src="" alt="Official details"/>
                </div>
                <div id="leaderDetailsContent" class="mt-7 hidden space-y-4 border-t border-outline-variant/20 pt-6 font-body text-sm leading-relaxed text-on-surface-variant"></div>
                <div id="leaderDetailsSignatureWrap" class="mt-7 hidden border-t border-outline-variant/20 pt-6">
                    <img id="leaderDetailsSignature" class="max-h-24 w-full object-contain object-left" src="" alt="Signature"/>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Our Professors Section -->
<section class="py-24 max-w-7xl mx-auto px-6 md:px-12" data-professor-section>
    <div class="flex flex-col gap-8 md:flex-row md:items-end md:justify-between mb-12">
        <div class="max-w-2xl">
            <h2 class="font-headline text-4xl font-bold text-primary mb-4">Our Professors</h2>
            <div class="h-1 w-20 bg-tertiary-fixed"></div>
            <p class="mt-6 text-on-surface-variant">Led by a faculty of world-renowned scholars, historians, and practitioners dedicated to the pursuit of truth.</p>
        </div>
        <div class="flex items-center gap-3">
            <button type="button" class="h-11 w-11 rounded-full border border-outline-variant/40 bg-surface text-primary shadow-sm hover:bg-primary hover:text-on-primary transition-all flex items-center justify-center" data-professor-prev aria-label="Previous professor">
                <span class="material-symbols-outlined text-[22px]">chevron_left</span>
            </button>
            <button type="button" class="h-11 w-11 rounded-full border border-outline-variant/40 bg-surface text-primary shadow-sm hover:bg-primary hover:text-on-primary transition-all flex items-center justify-center" data-professor-next aria-label="Next professor">
                <span class="material-symbols-outlined text-[22px]">chevron_right</span>
            </button>
        </div>
    </div>

    @php
        $professors = \App\Models\Professor::oldest()->get();
        $professorPlaceholder = asset('front/images/user-profile-icon-flat-style.avif');
    @endphp

    <div class="relative">
        <div class="professor-carousel flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-8" data-professor-carousel>
            @forelse($professors as $prof)
                @php
                    $professorImage = !empty($prof->image) && file_exists(public_path(ltrim($prof->image, '/')))
                        ? asset(ltrim($prof->image, '/'))
                        : $professorPlaceholder;
                @endphp
                <article tabindex="0" class="professor-card snap-start shrink-0 basis-full sm:basis-[calc(50%-12px)] lg:basis-[calc(33.333%-16px)] xl:basis-[calc(25%-18px)] bg-surface border border-outline-variant/15 rounded-xl overflow-hidden group transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl focus-within:-translate-y-1 focus-within:shadow-2xl outline-none">
                    <div class="pt-12 px-8 flex justify-center bg-surface">
                        <div class="h-56 w-56 md:h-64 md:w-64 rounded-full overflow-hidden border-[6px] border-white shadow-[0_18px_45px_rgba(27,28,28,0.16)] bg-surface-container-high">
                            <img class="w-full h-full object-cover transition-all duration-500 group-hover:scale-105" src="{{ $professorImage }}" alt="{{ $prof->name }}"/>
                        </div>
                    </div>
                    <div class="p-5">
                        <h4 class="font-headline font-bold text-xl text-primary">{{ $prof->name }}</h4>
                        <div class="font-body text-sm leading-relaxed text-on-surface-variant mt-0 max-h-0 overflow-y-auto opacity-0 transition-all duration-300 group-hover:mt-3 group-hover:max-h-44 group-hover:opacity-100 group-focus-within:mt-3 group-focus-within:max-h-44 group-focus-within:opacity-100 [&_strong]:text-tertiary [&_strong]:font-bold [&_ul]:mt-2 [&_ul]:list-disc [&_ul]:pl-5 [&_li]:mb-1">
                            {!! $prof->content !!}
                        </div>
                    </div>
                </article>
            @empty
                <p class="text-on-surface-variant">No professors added yet.</p>
            @endforelse
        </div>

        <div class="flex justify-center gap-2" data-professor-dots></div>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-24 bg-surface-container-highest/30">
    <div class="max-w-7xl mx-auto px-6 md:px-12" data-gallery-section>
        <div class="flex flex-col gap-8 md:flex-row md:items-end md:justify-between mb-12">
            <div>
                <h2 class="font-headline text-4xl font-bold text-primary mb-2">Gallery</h2>
                <p class="text-on-surface-variant font-body">Snapshots of life, ceremony, and scholarship across our campuses.</p>
            </div>
            <div class="flex items-center gap-3">
                <button type="button" class="h-11 w-11 rounded-full border border-outline-variant/40 bg-surface text-primary shadow-sm hover:bg-primary hover:text-on-primary transition-all flex items-center justify-center" data-gallery-prev aria-label="Previous gallery image">
                    <span class="material-symbols-outlined text-[22px]">chevron_left</span>
                </button>
                <button type="button" class="h-11 w-11 rounded-full border border-outline-variant/40 bg-surface text-primary shadow-sm hover:bg-primary hover:text-on-primary transition-all flex items-center justify-center" data-gallery-next aria-label="Next gallery image">
                    <span class="material-symbols-outlined text-[22px]">chevron_right</span>
                </button>
            </div>
        </div>

        @php
            $galleryFolders = \App\Models\GalleryFolder::withCount('galleries')->orderBy('name')->get();
            $generalGalleryImages = \App\Models\Gallery::whereNull('gallery_folder_id')->latest()->get()->filter(function ($gallery) {
                return !empty($gallery->image) && file_exists(public_path(ltrim($gallery->image, '/')));
            });
            $galleryPlaceholder = asset('front/images/gallery-placeholder.svg');
        @endphp

        <div class="relative">
            <div class="gallery-carousel flex gap-5 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-8" data-gallery-carousel>
                @forelse($galleryFolders as $folder)
                    <a href="{{ url('gallery?folder='.$folder->slug) }}" class="gallery-card snap-start shrink-0 basis-[calc(85%-10px)] sm:basis-[calc(50%-10px)] lg:basis-[calc(33.333%-14px)] xl:basis-[calc(25%-15px)] aspect-square overflow-hidden rounded-xl group relative bg-surface border border-outline-variant/15">
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $folder->cover_photo }}" alt="{{ $folder->name }}"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/10 to-transparent flex flex-col justify-end p-6">
                            <span class="material-symbols-outlined text-tertiary-fixed text-4xl mb-3">folder_open</span>
                            <h3 class="text-white font-display text-xl font-bold">{{ $folder->name }}</h3>
                            <p class="text-white/75 text-sm mt-1">{{ $folder->galleries_count }} images</p>
                        </div>
                    </a>
                @empty
                    @if($generalGalleryImages->isEmpty())
                        <a href="{{ url('gallery') }}" class="gallery-card snap-start shrink-0 basis-[calc(85%-10px)] sm:basis-[calc(50%-10px)] lg:basis-[calc(33.333%-14px)] xl:basis-[calc(25%-15px)] aspect-square overflow-hidden rounded-xl group relative bg-surface border border-outline-variant/15">
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $galleryPlaceholder }}" alt="Gallery folder placeholder"/>
                            <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/10 to-transparent flex flex-col justify-end p-6">
                                <span class="material-symbols-outlined text-tertiary-fixed text-4xl mb-3">folder_open</span>
                                <h3 class="text-white font-display text-xl font-bold">Gallery</h3>
                            </div>
                        </a>
                    @endif
                @endforelse

                @if($generalGalleryImages->isNotEmpty())
                    <a href="{{ url('gallery?folder=general') }}" class="gallery-card snap-start shrink-0 basis-[calc(85%-10px)] sm:basis-[calc(50%-10px)] lg:basis-[calc(33.333%-14px)] xl:basis-[calc(25%-15px)] aspect-square overflow-hidden rounded-xl group relative bg-surface border border-outline-variant/15">
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $generalGalleryImages->first()->photo }}" alt="General Gallery"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/10 to-transparent flex flex-col justify-end p-6">
                            <span class="material-symbols-outlined text-tertiary-fixed text-4xl mb-3">folder_open</span>
                            <h3 class="text-white font-display text-xl font-bold">General Gallery</h3>
                            <p class="text-white/75 text-sm mt-1">{{ $generalGalleryImages->count() }} images</p>
                        </div>
                    </a>
                @endif
            </div>

            <div class="flex justify-center gap-2" data-gallery-dots></div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const setupCarousel = ({ sectionSelector, carouselSelector, prevSelector, nextSelector, dotsSelector, label, autoPlay = false }) => {
            const section = document.querySelector(sectionSelector);
            if (!section) return;

            const carousel = section.querySelector(carouselSelector);
            const prevBtn = section.querySelector(prevSelector);
            const nextBtn = section.querySelector(nextSelector);
            const dotsWrap = section.querySelector(dotsSelector);
            if (!carousel || !prevBtn || !nextBtn || !dotsWrap) return;

            const getStep = () => {
            const card = carousel.querySelector('article');
            if (!card) return carousel.clientWidth;

            const styles = window.getComputedStyle(carousel);
            const gap = parseFloat(styles.columnGap || styles.gap || 0);
            return card.getBoundingClientRect().width + gap;
            };

            const getPageCount = () => {
            if (carousel.scrollWidth <= carousel.clientWidth) return 1;
            return Math.ceil((carousel.scrollWidth - carousel.clientWidth) / getStep()) + 1;
            };

            const updateControls = () => {
            const maxScroll = carousel.scrollWidth - carousel.clientWidth;
            const pageCount = getPageCount();
            const activePage = Math.min(pageCount - 1, Math.round(carousel.scrollLeft / getStep()));

            prevBtn.disabled = carousel.scrollLeft <= 4;
            nextBtn.disabled = carousel.scrollLeft >= maxScroll - 4;
            prevBtn.classList.toggle('opacity-40', prevBtn.disabled);
            nextBtn.classList.toggle('opacity-40', nextBtn.disabled);

            dotsWrap.innerHTML = '';
            for (let index = 0; index < pageCount; index += 1) {
                const dot = document.createElement('button');
                dot.type = 'button';
                dot.setAttribute('aria-label', 'Go to ' + label + ' slide ' + (index + 1));
                dot.className = 'h-2 rounded-full transition-all ' + (index === activePage ? 'w-8 bg-primary' : 'w-2 bg-outline-variant hover:bg-primary/50');
                dot.addEventListener('click', () => {
                    carousel.scrollTo({ left: index * getStep(), behavior: 'smooth' });
                });
                dotsWrap.appendChild(dot);
            }
            };

            prevBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: -getStep(), behavior: 'smooth' });
            });

            nextBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: getStep(), behavior: 'smooth' });
            });

            carousel.addEventListener('scroll', window.requestAnimationFrame ? () => window.requestAnimationFrame(updateControls) : updateControls);
            window.addEventListener('resize', updateControls);
            updateControls();

            if (autoPlay) {
                let timer = null;

                const start = () => {
                    stop();
                    timer = window.setInterval(() => {
                        const maxScroll = carousel.scrollWidth - carousel.clientWidth;

                        if (maxScroll <= 0) return;

                        if (carousel.scrollLeft >= maxScroll - 4) {
                            carousel.scrollTo({ left: 0, behavior: 'smooth' });
                            return;
                        }

                        carousel.scrollBy({ left: getStep(), behavior: 'smooth' });
                    }, 3500);
                };

                const stop = () => {
                    if (timer) {
                        window.clearInterval(timer);
                        timer = null;
                    }
                };

                section.addEventListener('mouseenter', stop);
                section.addEventListener('mouseleave', start);
                section.addEventListener('focusin', stop);
                section.addEventListener('focusout', start);
                start();
            }
        };

        setupCarousel({
            sectionSelector: '[data-professor-section]',
            carouselSelector: '[data-professor-carousel]',
            prevSelector: '[data-professor-prev]',
            nextSelector: '[data-professor-next]',
            dotsSelector: '[data-professor-dots]',
            label: 'professor',
            autoPlay: true
        });

        setupCarousel({
            sectionSelector: '[data-gallery-section]',
            carouselSelector: '[data-gallery-carousel]',
            prevSelector: '[data-gallery-prev]',
            nextSelector: '[data-gallery-next]',
            dotsSelector: '[data-gallery-dots]',
            label: 'gallery'
        });

        const leaderModal = document.getElementById('leaderDetailsModal');
        const leaderDate = document.getElementById('leaderDetailsDate');
        const leaderName = document.getElementById('leaderDetailsName');
        const leaderRole = document.getElementById('leaderDetailsRole');
        const leaderOfficial = document.getElementById('leaderDetailsOfficial');
        const leaderContent = document.getElementById('leaderDetailsContent');
        const leaderSignatureWrap = document.getElementById('leaderDetailsSignatureWrap');
        const leaderSignature = document.getElementById('leaderDetailsSignature');

        const closeLeaderDetails = () => {
            leaderModal.classList.add('hidden');
            leaderModal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        };

        const openLeaderDetails = (card) => {
            leaderDate.textContent = card.dataset.leaderDate || '';
            leaderDate.classList.toggle('hidden', !card.dataset.leaderDate);
            leaderName.textContent = card.dataset.leaderName;
            leaderRole.textContent = card.dataset.leaderRole;
            leaderOfficial.src = card.dataset.leaderDetailImage;
            leaderOfficial.alt = 'Official details for ' + card.dataset.leaderName;

            let paragraphs = [];
            try {
                paragraphs = JSON.parse(card.dataset.leaderContent || '[]');
            } catch (error) {
                paragraphs = [];
            }

            leaderContent.innerHTML = '';
            paragraphs.forEach((paragraph) => {
                const element = document.createElement('p');
                element.textContent = paragraph;
                leaderContent.appendChild(element);
            });
            leaderContent.classList.toggle('hidden', paragraphs.length === 0);

            const signatureImage = card.dataset.leaderSignatureImage;
            leaderSignature.src = signatureImage || '';
            leaderSignature.alt = 'Signature of ' + card.dataset.leaderName;
            leaderSignatureWrap.classList.toggle('hidden', !signatureImage);

            leaderModal.classList.remove('hidden');
            leaderModal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        };

        document.querySelectorAll('[data-leader-details]').forEach((card) => {
            card.addEventListener('click', () => openLeaderDetails(card));
            card.addEventListener('keydown', (event) => {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    openLeaderDetails(card);
                }
            });
        });

        document.querySelectorAll('[data-leader-details-close]').forEach((button) => {
            button.addEventListener('click', closeLeaderDetails);
        });

        leaderModal.addEventListener('click', (event) => {
            if (event.target === leaderModal) {
                closeLeaderDetails();
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && !leaderModal.classList.contains('hidden')) {
                closeLeaderDetails();
            }
        });
    });
</script>
@endsection
