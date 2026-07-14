@extends('layouts.alpha')

@section('title', 'Recognized Certificates | The Alpha Institute')

@section('content')
<section class="bg-surface py-14 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-5 mb-10">
            <div>
                <h1 class="font-display text-4xl md:text-6xl font-bold text-primary">Recognized Certificates</h1>
            </div>
            <a href="{{ url('about') }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-md border border-primary text-primary font-bold hover:bg-primary/5 transition-colors">
                <span class="material-symbols-outlined text-lg">arrow_back</span>
                Back
            </a>
        </div>

        @if($certificates->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($certificates as $certificate)
                    @php
                        $certificateUrl = asset($certificate->certificate);
                        $extension = strtolower(pathinfo($certificate->certificate, PATHINFO_EXTENSION));
                        $isImage = in_array($extension, ['jpg', 'jpeg', 'png']);
                        $isPdf = $extension === 'pdf';
                    @endphp
                    <a href="{{ route('frontend.recognized_certificate', $certificate) }}" class="group bg-surface-container-lowest border border-outline-variant/20 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all">
                        <div class="aspect-[4/3] bg-surface-container-low flex items-center justify-center overflow-hidden">
                            @if($isImage)
                                <img src="{{ $certificateUrl }}" alt="{{ $certificate->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @elseif($isPdf)
                                <div class="w-full h-full flex flex-col items-center justify-center text-primary bg-tertiary-fixed/20">
                                    <span class="material-symbols-outlined text-6xl mb-2">picture_as_pdf</span>
                                    <span class="font-label text-xs font-bold uppercase tracking-widest">PDF Certificate</span>
                                </div>
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center text-primary bg-tertiary-fixed/20">
                                    <span class="material-symbols-outlined text-6xl mb-2">description</span>
                                    <span class="font-label text-xs font-bold uppercase tracking-widest">Certificate</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-5">
                            <h2 class="font-display text-xl font-bold text-primary mb-3">{{ $certificate->title }}</h2>
                            <span class="inline-flex items-center gap-1 text-primary text-sm font-bold">
                                View Certificate
                                <span class="material-symbols-outlined text-base">open_in_new</span>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="bg-surface-container-lowest border border-outline-variant/20 rounded-xl p-10 text-center">
                <span class="material-symbols-outlined text-5xl text-primary mb-3">workspace_premium</span>
                <p class="text-on-surface-variant">No certificates available.</p>
            </div>
        @endif
    </div>
</section>
@endsection
