@extends('layouts.alpha')

@section('title', $course->name . ' | The Alpha Institute')

@section('content')
<div class="mt-24 pt-8">
    <!-- Hero Section -->
    <section class="relative max-w-7xl mx-auto px-6 lg:px-12 mb-20">
        <div class="grid lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 z-10">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-tertiary-fixed/30 text-on-tertiary-fixed-variant rounded-full text-xs font-bold tracking-wider uppercase mb-6">
                    <span class="material-symbols-outlined text-[16px]">school</span>
                    {{ $course->category ? $course->category->name : 'Program' }}
                </div>
                <h1 class="font-display text-5xl lg:text-7xl font-black text-primary leading-[1.1] mb-8 tracking-tight">
                    {{ $course->name }}
                </h1>
                <p class="text-xl text-on-surface-variant leading-relaxed max-w-2xl mb-10">
                    {{ \Illuminate\Support\Str::limit(strip_tags($course->description), 180) }}
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="javascript:;" data-registration-open class="bg-primary text-on-primary px-8 py-4 rounded-md font-bold text-lg flex items-center gap-3 shadow-lg hover:shadow-primary/20 transition-all active:scale-95">
                        Apply Now
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                    <a href="{{ $course->pdf ? asset($course->pdf) : url('downloads') }}" target="_blank" class="border-2 border-primary text-primary px-8 py-4 rounded-md font-bold text-lg hover:bg-primary/5 transition-all active:scale-95">
                        Download Syllabus
                    </a>
                </div>
            </div>
            <div class="lg:col-span-5 relative">
                <div class="aspect-[4/5] rounded-xl overflow-hidden shadow-2xl relative">
                    <img alt="{{ $course->name }}" class="w-full h-full object-cover" src="{{ $course->photo }}"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/40 to-transparent"></div>
                </div>
                <div class="absolute -bottom-10 -left-10 bg-surface-container-lowest p-8 rounded-xl shadow-[0_32px_64px_rgba(0,52,101,0.12)] border border-outline-variant/10 hidden md:block max-w-[280px]">
                    <div class="text-tertiary mb-2">
                        <span class="material-symbols-outlined text-4xl" data-weight="fill">verified</span>
                    </div>
                    <p class="font-headline font-bold text-primary text-lg leading-tight">Ecclesiastical Recognition</p>
                    <p class="text-sm text-on-surface-variant mt-2">Globally recognized curriculum aligned with the highest standards of the Alpha Institute.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Details Bar -->
    <section class="max-w-7xl mx-auto px-6 lg:px-12 mb-24">
        <div class="bg-primary p-1 rounded-2xl">
            <div class="bg-surface-container-lowest rounded-[calc(1rem-4px)] grid grid-cols-2 lg:grid-cols-4 divide-x divide-outline-variant/20 py-8">
                <div class="px-8 text-center">
                    <p class="text-label text-xs uppercase tracking-widest text-on-surface-variant font-semibold mb-1">Duration</p>
                    <p class="font-headline text-2xl font-bold text-primary">{{ $course->duration }}</p>
                </div>
                <div class="px-8 text-center">
                    <p class="text-label text-xs uppercase tracking-widest text-on-surface-variant font-semibold mb-1">Mode</p>
                    <p class="font-headline text-2xl font-bold text-primary">{{ $course->mode ?: 'Full-Time' }}</p>
                </div>
                <div class="px-8 text-center">
                    <p class="text-label text-xs uppercase tracking-widest text-on-surface-variant font-semibold mb-1">Type</p>
                    <p class="font-headline text-2xl font-bold text-primary">{{ $course->type ?: 'Diploma' }}</p>
                </div>
                <div class="px-8 text-center border-none">
                    <p class="text-label text-xs uppercase tracking-widest text-on-surface-variant font-semibold mb-1">Intake</p>
                    <p class="font-headline text-2xl font-bold text-primary">{{ $course->intake ?: date('F Y') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Area -->
    <section class="max-w-7xl mx-auto px-6 lg:px-12 pb-24">
        <div class="max-w-4xl mx-auto space-y-20">
            <!-- Course Overview -->
            <article>
                <h2 class="font-display text-4xl font-bold text-primary mb-8 border-l-4 border-tertiary-fixed pl-6 uppercase tracking-tight">Course Overview</h2>
                <div class="prose prose-lg text-on-surface-variant leading-relaxed space-y-6 max-w-none">
                    {!! $course->description !!}
                </div>
            </article>

            <!-- Additional Details if any -->
            @if($course->content)
            <article>
                <h2 class="font-display text-4xl font-bold text-primary mb-8 border-l-4 border-tertiary-fixed pl-6 uppercase tracking-tight">Syllabus & Details</h2>
                <div class="prose prose-lg text-on-surface-variant leading-relaxed space-y-6 max-w-none">
                    {!! $course->content !!}
                </div>
            </article>
            @endif

            <!-- Common Institutional Details -->
            <article>
                <h2 class="font-display text-4xl font-bold text-primary mb-8 border-l-4 border-tertiary-fixed pl-6 uppercase tracking-tight">Admission Requirements</h2>
                <div class="prose prose-lg text-on-surface-variant leading-relaxed space-y-6 max-w-none text-sm">
                    <p>The applicants who have completed their studies in other Institutes and Faculties will be admitted after the scrutiny regarding the canonical validity of the corresponding certificates. The judgment of the academic council of the Institute finalises the issue.</p>
                </div>
            </article>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="max-w-5xl mx-auto px-6 mb-12">
        <div class="bg-primary rounded-3xl text-center relative overflow-hidden p-8 lg:p-12">
            <div class="relative z-10">
                <h2 class="font-display text-3xl lg:text-4xl font-black text-on-primary mb-4">Begin Your Academic Vocation</h2>
                <p class="text-on-primary-container text-lg max-w-2xl mx-auto mb-8 opacity-80">
                    Join a community of scholars dedicated to the pursuit of Truth. Applications are now open for qualified candidates.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <button data-registration-open class="bg-tertiary-fixed text-on-tertiary-fixed px-10 py-4 rounded-md font-bold text-lg hover:brightness-110 transition-all">Apply Now</button>
                    <a href="{{ url('contact') }}" class="bg-white/10 text-white backdrop-blur-md px-10 py-4 rounded-md font-bold text-lg hover:bg-white/20 transition-all">Contact Admissions</a>
                </div>
            </div>
            <!-- Abstract Design Elements -->
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full -ml-24 -mb-24"></div>
            <div class="absolute top-0 right-0 w-64 h-64 bg-tertiary-fixed/5 rounded-full -mr-32 -mt-32"></div>
        </div>
    </section>
</div>
@endsection



