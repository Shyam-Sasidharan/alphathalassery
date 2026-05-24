@extends('layouts.alpha')

@section('title', $news->title . ' | The Alpha Institute')

@section('content')
<!-- Hero Section -->
<section class="relative h-[300px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="News Background" class="w-full h-full object-cover brightness-[0.4]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCgpAdv8Hd7KSDe5L-wgA0PUdeIplPcxCCMIKMF4c72LJYJx9E0pqx1V5YznRt7Cu-3uGQ4TSLz4m6c6ZOJA5eYxasJgm9T_-KLJHaevh3MHoZienoHyRA7Gvw5Ud_FcTiiSHuydaqa9aSTXQPMk7BeycdtH4RRI4nld_3Cz9IrbKMFE9znS1HNiMXk7Bz3LGFAnPEBDH_MOGzbum1u_ScyN44akTX2Eg-QPfaJWu5zCrByo5wdASMNDOc4tgdjeklaGotIRrLu6Q"/>
    </div>
    <div class="relative z-10 text-center px-6">
        <h1 class="font-display text-4xl md:text-5xl text-white tracking-tight mb-4">Latest News & Updates</h1>
        <div class="h-1 w-20 bg-tertiary-fixed mx-auto mb-6"></div>
    </div>
</section>

<section class="max-w-7xl mx-auto px-6 py-20">
    <div class="flex flex-col lg:flex-row gap-12">
        <!-- Main News Content -->
        <div class="flex-1">
            <div class="mb-8">
                <div class="flex items-center gap-2 text-primary font-bold text-xs uppercase tracking-widest mb-4">
                    <span class="material-symbols-outlined text-sm">calendar_month</span>
                    {{ date("D, d M Y", strtotime($news->created_at)) }}
                </div>
                <h2 class="font-display text-4xl text-primary font-bold leading-tight mb-6">{{ $news->title }}</h2>
                <div class="h-[1px] w-full bg-outline-variant/20 mb-8"></div>
            </div>

            <div class="prose prose-lg max-w-none text-on-surface-variant leading-relaxed">
                {!! $news->content !!}
            </div>
            
            <div class="mt-12 pt-8 border-t border-outline-variant/20">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-primary font-bold hover:underline">
                    <span class="material-symbols-outlined">arrow_back</span>
                    Back to Home
                </a>
            </div>
        </div>

        <!-- Sidebar / Other News -->
        <aside class="w-full lg:w-80">
            <div class="sticky top-32">
                <h3 class="font-display text-xl text-primary mb-6 border-b border-outline-variant/30 pb-2">More Updates</h3>
                <div class="space-y-6">
                    @php
                        $otherNews = \App\Models\News::where('id', '!=', $news->id)->latest()->take(5)->get();
                    @endphp
                    
                    @foreach($otherNews as $n)
                    <a href="{{ url('news/'.$n->slug) }}" class="group block bg-surface-container-lowest p-4 rounded-xl border border-outline-variant/10 hover:shadow-md transition-all">
                        <div class="text-[10px] text-outline font-bold uppercase tracking-widest mb-1">{{ date("M d, Y", strtotime($n->created_at)) }}</div>
                        <h4 class="font-bold text-primary group-hover:text-primary-container transition-colors line-clamp-2 leading-snug">{{ $n->title }}</h4>
                    </a>
                    @endforeach
                </div>
                
                <div class="mt-12 bg-primary/5 p-6 rounded-2xl border border-primary/10">
                    <h4 class="font-display text-lg text-primary mb-2">Academic Session</h4>
                    <p class="text-xs text-on-surface-variant leading-relaxed">Stay updated with our latest academic calendars and event schedules.</p>
                </div>
            </div>
        </aside>
    </div>
</section>
@endsection

