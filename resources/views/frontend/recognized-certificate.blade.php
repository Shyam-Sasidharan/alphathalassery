@extends('layouts.alpha')

@section('title', $recognized_certificate->title . ' | The Alpha Institute')

@section('content')
@php
    $certificateUrl = asset($recognized_certificate->certificate);
    $extension = strtolower(pathinfo($recognized_certificate->certificate, PATHINFO_EXTENSION));
    $isImage = in_array($extension, ['jpg', 'jpeg', 'png']);
    $isPdf = $extension === 'pdf';
@endphp

<section class="bg-surface py-12 px-6">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
                <p class="font-label text-xs uppercase tracking-[0.2em] text-tertiary font-bold mb-2">Recognized Certificate</p>
                <h1 class="font-display text-4xl md:text-5xl font-bold text-primary">{{ $recognized_certificate->title }}</h1>
                @if($recognized_certificate->description)
                    <p class="mt-3 text-on-surface-variant max-w-3xl">{{ $recognized_certificate->description }}</p>
                @endif
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ url('about') }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-md border border-primary text-primary font-bold hover:bg-primary/5 transition-colors">
                    <span class="material-symbols-outlined text-lg">arrow_back</span>
                    Back
                </a>
                <a href="{{ $certificateUrl }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-3 rounded-md bg-primary text-on-primary font-bold hover:brightness-110 transition-all">
                    <span class="material-symbols-outlined text-lg">visibility</span>
                    View
                </a>
            </div>
        </div>

        <div class="bg-surface-container-lowest border border-outline-variant/20 rounded-xl shadow-xl overflow-hidden">
            @if($isPdf)
                <iframe src="{{ $certificateUrl }}" class="w-full h-[80vh]" title="{{ $recognized_certificate->title }}"></iframe>
            @elseif($isImage)
                <div class="p-4 bg-black/5 flex justify-center">
                    <img src="{{ $certificateUrl }}" alt="{{ $recognized_certificate->title }}" class="max-w-full max-h-[80vh] object-contain rounded-lg">
                </div>
            @else
                <div class="p-12 text-center">
                    <span class="material-symbols-outlined text-6xl text-primary mb-4">description</span>
                    <p class="text-on-surface-variant mb-6">Preview is not available for this file type.</p>
                    <a href="{{ $certificateUrl }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 rounded-md bg-primary text-on-primary font-bold">
                        Open Certificate
                        <span class="material-symbols-outlined text-lg">open_in_new</span>
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
