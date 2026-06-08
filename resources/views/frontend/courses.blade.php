@extends('layouts.alpha')

@section('title', 'Academic Courses | The Alpha Institute')

@section('content')
<!-- Hero Section -->
<section class="relative h-[614px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="Library Background" class="w-full h-full object-cover brightness-[0.35]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCgpAdv8Hd7KSDe5L-wgA0PUdeIplPcxCCMIKMF4c72LJYJx9E0pqx1V5YznRt7Cu-3uGQ4TSLz4m6c6ZOJA5eYxasJgm9T_-KLJHaevh3MHoZienoHyRA7Gvw5Ud_FcTiiSHuydaqa9aSTXQPMk7BeycdtH4RRI4nld_3Cz9IrbKMFE9znS1HNiMXk7Bz3LGFAnPEBDH_MOGzbum1u_ScyN44akTX2Eg-QPfaJWu5zCrByo5wdASMNDOc4tgdjeklaGotIRrLu6Q"/>
    </div>
    <div class="relative z-10 text-center px-6">
        <h1 class="font-display text-5xl md:text-7xl text-white tracking-tight mb-4">Course Directory</h1>
        <div class="h-1 w-24 bg-tertiary-fixed mx-auto mb-6"></div>
        <p class="text-surface-variant font-body text-lg md:text-xl max-w-2xl mx-auto opacity-90 italic">
            Explore our comprehensive curriculum across two specialized centers of excellence. From foundational theology to advanced religious scientific research.
        </p>
    </div>
    <div class="absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-surface to-transparent"></div>
</section>

@php
    $selectedCollege = in_array(request('college'), ['ahirs', 'tacrs']) ? request('college') : null;
    $hasCollegeColumn = \Illuminate\Support\Facades\Schema::hasColumn('courses', 'college');
    $allCourses = \App\Models\Course::orderBy('created_at')->get();
    $ahirs = $hasCollegeColumn
        ? \App\Models\Course::where('college', 'ahirs')->orderBy('created_at')->get()
        : $allCourses->where('type', 'AHIRS');
    $tacrs = $hasCollegeColumn
        ? \App\Models\Course::where('college', 'tacrs')->orderBy('created_at')->get()
        : $allCourses->where('type', 'TACRS');

    if($ahirs->isEmpty() && $tacrs->isEmpty()) {
        $ahirs = $allCourses; // If no types, show all in first section
    }

    if ($selectedCollege === 'ahirs') {
        $tacrs = collect();
    } elseif ($selectedCollege === 'tacrs') {
        $ahirs = collect();
    }
@endphp

@if(!$selectedCollege || $selectedCollege === 'ahirs')
<!-- AHIRS Section -->
<section class="max-w-7xl mx-auto px-6 mb-24" id="ahirs">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
        <div class="max-w-2xl">
            <h2 class="text-4xl font-display font-bold text-primary mb-4 italic">Alpha Higher Institute of Religious Sciences (AHIRS)</h2>
            <p class="text-on-surface-variant font-body">Dedicated to the rigorous academic study of historical divinity, theological evolution, and sacred manuscripts through a scientific lens.</p>
        </div>
        <div class="h-px flex-grow bg-outline-variant/30 mx-8 hidden lg:block mb-4"></div>
        <div class="flex gap-2">
            <span class="material-symbols-outlined text-tertiary text-4xl">account_balance</span>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($ahirs as $course)
            <div class="group bg-surface-container-lowest rounded-xl overflow-hidden border border-outline-variant/10 shadow-sm transition-all hover:shadow-xl hover:-translate-y-1">
                <div class="relative h-56 overflow-hidden">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $course->photo }}"/>
                    <div class="absolute top-4 left-4 bg-primary/90 text-on-primary text-[10px] uppercase tracking-widest px-3 py-1 rounded-full backdrop-blur-sm">
                        {{ $course->category ? $course->category->name : 'Program' }}
                    </div>
                </div>
                <div class="p-8">
                    <p class="font-serif italic text-tertiary mb-1">{{ $course->subtitle }}</p>
                    <h3 class="text-2xl font-display font-bold text-primary mb-4 leading-tight">{{ $course->name }}</h3>
                    <div class="text-on-surface-variant text-sm font-body leading-relaxed mb-6 line-clamp-3">
                        {!! strip_tags($course->description) !!}
                    </div>
                    <div class="space-y-3 mb-8">
                        <div class="flex items-center gap-3 text-sm">
                            <span class="material-symbols-outlined text-outline">schedule</span>
                            <span class="font-label">Duration: {{ $course->duration ?? 'Contact for details' }}</span>
                        </div>
                        @if($course->fee)
                        <div class="flex items-center gap-3 text-sm">
                            <span class="material-symbols-outlined text-outline">payments</span>
                            <span class="font-label">Fee: {{ $course->fee }}</span>
                        </div>
                        @endif
                    </div>
                    <a href="{{ url('course/'.$course->slug) }}" class="w-full flex items-center justify-center gap-2 py-4 bg-surface-container-high text-primary font-bold rounded-lg transition-all hover:bg-primary hover:text-on-primary">
                        <span class="material-symbols-outlined">description</span>
                        View Details
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif

@if((!$selectedCollege || $selectedCollege === 'tacrs') && $tacrs->isNotEmpty())
<!-- TACRS Section -->
<section class="max-w-7xl mx-auto px-6 mb-24 py-0" id="tacrs">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
        <div class="max-w-2xl">
            <h2 class="text-4xl font-display font-bold text-primary mb-4 italic">Tely-Alpha Center For Religious Sciences (TACRS)</h2>
            <p class="text-on-surface-variant font-body">TACRS focuses on the intersection of religious thought and contemporary scientific discourse, fostering dialogue between faith and modern reason.</p>
        </div>
        <div class="h-px flex-grow bg-outline-variant/30 mx-8 hidden lg:block mb-4"></div>
        <div class="flex gap-2">
            <span class="material-symbols-outlined text-tertiary text-4xl">science</span>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($tacrs as $course)
            <div class="group bg-surface-container-lowest rounded-xl overflow-hidden border border-outline-variant/10 shadow-sm transition-all hover:shadow-xl hover:-translate-y-1">
                <div class="relative h-56 overflow-hidden">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $course->photo }}"/>
                    <div class="absolute top-4 left-4 bg-secondary/90 text-on-secondary text-[10px] uppercase tracking-widest px-3 py-1 rounded-full backdrop-blur-sm">
                        {{ $course->category ? $course->category->name : 'Program' }}
                    </div>
                </div>
                <div class="p-8">
                    <p class="font-serif italic text-tertiary mb-1">{{ $course->subtitle }}</p>
                    <h3 class="text-2xl font-display font-bold text-primary mb-4 leading-tight">{{ $course->name }}</h3>
                    <div class="text-on-surface-variant text-sm font-body leading-relaxed mb-6 line-clamp-3">
                        {!! strip_tags($course->description) !!}
                    </div>
                    <div class="space-y-3 mb-8">
                        <div class="flex items-center gap-3 text-sm">
                            <span class="material-symbols-outlined text-outline">schedule</span>
                            <span class="font-label">Duration: {{ $course->duration ?? 'Contact for details' }}</span>
                        </div>
                        @if($course->fee)
                        <div class="flex items-center gap-3 text-sm">
                            <span class="material-symbols-outlined text-outline">payments</span>
                            <span class="font-label">Fee: {{ $course->fee }}</span>
                        </div>
                        @endif
                    </div>
                    <a href="{{ url('course/'.$course->slug) }}" class="w-full flex items-center justify-center gap-2 py-4 bg-surface-container-high text-primary font-bold rounded-lg transition-all hover:bg-primary hover:text-on-primary">
                        <span class="material-symbols-outlined">description</span>
                        View Details
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif
@endsection


