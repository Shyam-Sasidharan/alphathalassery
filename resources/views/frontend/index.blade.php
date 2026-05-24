@extends('layouts.alpha')

@section('title', 'The Alpha Institute | Dual College Portal')

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
            <img class="absolute inset-0 w-full h-full object-cover opacity-60 transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBoIBOuTPgW0pCi8LieKwjpQ0PWLsOHYNHjESZJd-0JoZWR7P_Cjh0fH0drJeJm2yuGkyvyibPGGWPlcWe9PM2Vttz3p1VF9p0lMzDZ9mjrwsfUC6yeyqljuNlRhC1oxHDtdBf4QIV044e8bLMcSj7_BMam9kcyOXH9wm7tDqM-j_STKTHTK7LEaSbFfANkZglfEI7stsGL8IN5Xz6TOaoN0uJyTbV4S97IIKESLjsdOdqwxaQ3-n8FWK7hui8P0-sDy1cjRsHVlw"/>
            <div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/20 to-transparent"></div>
            <div class="relative h-full flex flex-col justify-end p-12 text-on-primary">
                <span class="font-label text-xs uppercase tracking-[0.3em] text-tertiary-fixed mb-4">Academic Excellence</span>
                <h1 class="font-headline text-4xl md:text-5xl font-black mb-6 leading-tight max-w-md">Alpha Higher Institute of Religious Sciences</h1>
                <p class="font-body text-lg text-on-primary/80 mb-8 max-w-sm">Advancing the depth of theological study through rigorous academic inquiry and historical research.</p>
                <div class="flex">
                    <a href="{{ url('courses') }}" class="bg-tertiary-fixed text-on-tertiary-fixed px-8 py-4 rounded-md font-bold flex items-center gap-3 hover:bg-white transition-colors group/btn">
                        Enter College
                        <span class="material-symbols-outlined text-lg group-hover/btn:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Tely Alpha Center Side -->
        <div class="relative group overflow-hidden rounded-xl bg-primary-container">
            <img class="absolute inset-0 w-full h-full object-cover opacity-60 transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC92nHtixkb-WM8OccT16gfRuEvpRJypL1O1SqFop3JWMDMz5MWsjIsXXKPlae-IyS2O5GDgxibmOeNp_VMFc8kzqEsVzcNQ_9VJSlBYWxaWkDI-xbLy4c7cjVyGXtCfAH6wn4gCup4F2C6TAsvsUnpV6P6czG2YZMEA3x8IcEXiVIJM21eToRI_OWOwC0_rdMo4NF2_-0wBy0-2p8WvNGJdpqcSInS0GX0jomsJUM2N2jVztYu9qe6bAE6LrKh89Qy723pHPpgBQ"/>
            <div class="absolute inset-0 bg-gradient-to-t from-primary-container via-primary-container/20 to-transparent"></div>
            <div class="relative h-full flex flex-col justify-end p-12 text-on-primary">
                <span class="font-label text-xs uppercase tracking-[0.3em] text-tertiary-fixed mb-4">Spiritual Heritage</span>
                <h1 class="font-headline text-4xl md:text-5xl font-black mb-6 leading-tight max-w-md">Tely Alpha Center For Religious Sciences</h1>
                <p class="font-body text-lg text-on-primary/80 mb-8 max-w-sm">Preserving and interpreting sacred traditions for the modern world through specialized curation.</p>
                <div class="flex">
                    <a href="{{ url('courses') }}" class="bg-tertiary-fixed text-on-tertiary-fixed px-8 py-4 rounded-md font-bold flex items-center gap-3 hover:bg-white transition-colors group/btn">
                        Enter College
                        <span class="material-symbols-outlined text-lg group-hover/btn:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="max-w-7xl mx-auto py-24 px-12 grid grid-cols-1 md:grid-cols-12 gap-12 items-center">
    <div class="md:col-span-5 relative">
        <div class="aspect-square rounded-xl overflow-hidden shadow-2xl">
            <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC5aZ9peXQwkujXUNlhmpeSu3rDwOT4vHotyIvbWbFeAkpCk33Te99pnOBZIO1ezXi9O6fQnLGqevJj9SkiNNQIvBO_9bmEaLCx_T3jLP54ibentIXG5GOEQ6W6ty8v8-XLGdnPC6SMwyvcYYzDZ9YbkhWcxsvG01JCZp9X7kfkBN3XQyjfuaGzOxF_HkPUXj48tH7uGVTl6e-4hkBYEu4JrBuIbBbpfpZY5NQEQaH5nQ9Lm9PEFj4EO7BBNyEVgP2GGiOk8PKQ3w"/>
        </div>
        <div class="absolute -bottom-8 -right-8 bg-tertiary-fixed p-8 rounded-xl shadow-xl hidden lg:block">
            <span class="font-headline italic text-2xl text-on-tertiary-fixed block">Established 1894</span>
            <span class="font-label text-xs uppercase tracking-widest text-on-tertiary-fixed opacity-70">A Century of Grace</span>
        </div>
    </div>
    <div class="md:col-span-7 space-y-8">
        <h2 class="font-headline text-5xl font-black text-primary tracking-tight">One Vision, <br/><span class="italic text-tertiary">Two Paths.</span></h2>
        <p class="font-body text-xl leading-relaxed text-on-surface-variant">
            The Alpha Institute stands as the guardian of dual legacies. While the Higher Institute focuses on the rigorous intellectual framework of theology, the Tely Alpha Center serves as the experiential heart, curating the living history of religious expression. Together, we provide a holistic education that honors both the mind and the spirit.
        </p>
        <div class="grid grid-cols-2 gap-8 pt-4">
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
<section class="bg-surface-container-low py-24">
    <div class="max-w-7xl mx-auto px-12">
        <div class="flex justify-between items-end mb-16">
            <div>
                <h2 class="font-headline text-4xl font-bold text-primary mb-2">Courses Offered</h2>
                <p class="text-on-surface-variant font-body">Distinguished programs of study across our two institutions.</p>
            </div>
            <a href="{{ url('courses') }}" class="text-primary font-bold hover:underline flex items-center gap-2">
                View All Programs
                <span class="material-symbols-outlined text-sm">arrow_right_alt</span>
            </a>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            @php
                $courses = \App\Models\Course::latest()->take(4)->get();
                $ahirs = $courses->where('type', 'AHIRS'); // Assuming there's a type or category
                $tacrs = $courses->where('type', 'TACRS');
                
                // If no type, just split them
                if($ahirs->isEmpty() && $tacrs->isEmpty()) {
                    $ahirs = $courses->take(2);
                    $tacrs = $courses->slice(2);
                }
            @endphp
            <!-- AHIRS Column -->
            <div class="space-y-6">
                <div class="flex items-center gap-4 mb-4">
                    <h3 class="font-label text-xs font-bold uppercase tracking-[0.4em] text-primary">Alpha Higher Institute (AHIRS)</h3>
                    <div class="h-px flex-grow bg-outline-variant/30"></div>
                </div>
                <div class="grid gap-4">
                    @foreach($ahirs as $course)
                        <div class="bg-surface border border-outline-variant/10 p-6 rounded-xl hover:shadow-md transition-shadow group">
                            <h4 class="font-headline font-bold text-xl mb-2 group-hover:text-primary transition-colors">
                                <a href="{{ url('course/'.$course->slug) }}">{{ $course->name }}</a>
                            </h4>
                            <p class="text-sm text-on-surface-variant line-clamp-2">{!! strip_tags($course->description) !!}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- TACRS Column -->
            <div class="space-y-6">
                <div class="flex items-center gap-4 mb-4">
                    <h3 class="font-label text-xs font-bold uppercase tracking-[0.4em] text-secondary">Tely Alpha Center (TACRS)</h3>
                    <div class="h-px flex-grow bg-outline-variant/30"></div>
                </div>
                <div class="grid gap-4">
                    @foreach($tacrs as $course)
                        <div class="bg-surface border border-outline-variant/10 p-6 rounded-xl hover:shadow-md transition-shadow group">
                            <h4 class="font-headline font-bold text-xl mb-2 group-hover:text-secondary transition-colors">
                                <a href="{{ url('course/'.$course->slug) }}">{{ $course->name }}</a>
                            </h4>
                            <p class="text-sm text-on-surface-variant line-clamp-2">{!! strip_tags($course->description) !!}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Professors Section -->
<section class="py-24 max-w-7xl mx-auto px-12">
    <div class="text-center mb-16">
        <h2 class="font-headline text-4xl font-bold text-primary mb-4">Our Professors</h2>
        <div class="h-1 w-20 bg-tertiary-fixed mx-auto"></div>
        <p class="mt-6 text-on-surface-variant max-w-2xl mx-auto">Led by a faculty of world-renowned scholars, historians, and practitioners dedicated to the pursuit of truth.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @php
            $professors = \App\Models\Professor::latest()->take(4)->get();
        @endphp
        @foreach($professors as $prof)
            <div class="text-center group">
                <div class="aspect-[4/5] rounded-xl overflow-hidden mb-6 bg-surface-container-high border border-outline-variant/10">
                    <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" src="{{ $prof->photo }}"/>
                </div>
                <h4 class="font-headline font-bold text-xl text-primary">{{ $prof->name }}</h4>
                <p class="font-label text-xs uppercase tracking-widest text-tertiary font-bold mt-1">{{ $prof->designation }}</p>
            </div>
        @endforeach
        
        @if($professors->isEmpty())
            <!-- Fallback if no professors in DB -->
            <div class="text-center group">
                <div class="aspect-[4/5] rounded-xl overflow-hidden mb-6 bg-surface-container-high border border-outline-variant/10">
                    <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCTbYN7BLRZkPRVS_do5T3JNOHaWzU-1Sv5DFM5r_KqG2QgqdhM6bz3a0vk3THhmpZrUVjgLTD0xOs2fFH7-W27OFtTNM0XRRUdNAqgzQQVwzkTZ6Ck93-XGRkruzmPln803FZdOORFrpyae4VVsUnMLZHFr8HJNc_5aKZA8Nc1t8HDzeRFTFgMD2cT3VBF4rvDzo5yekQNkRYmhwFvmrOCiVTfskGnY0mOvVjMxWd3-Ctu1IlkH0JycoQj4btF52xqO2ZcFyWB4w"/>
                </div>
                <h4 class="font-headline font-bold text-xl text-primary">Dr. Julian Vance</h4>
                <p class="font-label text-xs uppercase tracking-widest text-tertiary font-bold mt-1">Dean of AHIRS</p>
            </div>
        @endif
    </div>
</section>

<!-- Gallery Section -->
<section class="py-24 bg-surface-container-highest/30">
    <div class="max-w-7xl mx-auto px-12">
        <div class="mb-12">
            <h2 class="font-headline text-4xl font-bold text-primary mb-2">Gallery</h2>
            <p class="text-on-surface-variant font-body">Snapshots of life, ceremony, and scholarship across our campuses.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @php
                $galleries = \App\Models\Gallery::latest()->take(4)->get();
            @endphp
            @foreach($galleries as $gallery)
                <div class="aspect-square overflow-hidden rounded-xl group relative">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $gallery->photo }}"/>
                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </div>
            @endforeach
            
            @if($galleries->isEmpty())
                <div class="aspect-square overflow-hidden rounded-xl group relative">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBoIBOuTPgW0pCi8LieKwjpQ0PWLsOHYNHjESZJd-0JoZWR7P_Cjh0fH0drJeJm2yuGkyvyibPGGWPlcWe9PM2Vttz3p1VF9p0lMzDZ9mjrwsfUC6yeyqljuNlRhC1oxHDtdBf4QIV044e8bLMcSj7_BMam9kcyOXH9wm7tDqM-j_STKTHTK7LEaSbFfANkZglfEI7stsGL8IN5Xz6TOaoN0uJyTbV4S97IIKESLjsdOdqwxaQ3-n8FWK7hui8P0-sDy1cjRsHVlw"/>
                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection



