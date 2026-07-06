@extends('layouts.alpha')

@section('title', 'Gallery | The Alpha Institute')

@section('content')
<!-- Hero Section -->
<section class="relative h-[300px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="Gallery Background" class="w-full h-full object-cover brightness-[0.4]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCgpAdv8Hd7KSDe5L-wgA0PUdeIplPcxCCMIKMF4c72LJYJx9E0pqx1V5YznRt7Cu-3uGQ4TSLz4m6c6ZOJA5eYxasJgm9T_-KLJHaevh3MHoZienoHyRA7Gvw5Ud_FcTiiSHuydaqa9aSTXQPMk7BeycdtH4RRI4nld_3Cz9IrbKMFE9znS1HNiMXk7Bz3LGFAnPEBDH_MOGzbum1u_ScyN44akTX2Eg-QPfaJWu5zCrByo5wdASMNDOc4tgdjeklaGotIRrLu6Q"/>
    </div>
    <div class="relative z-10 text-center px-6">
        <h1 class="font-display text-5xl md:text-6xl text-white tracking-tight mb-4">Visual Archives</h1>
        <div class="h-1 w-20 bg-tertiary-fixed mx-auto mb-6"></div>
        <p class="text-surface-variant font-body text-lg max-w-2xl mx-auto opacity-90 italic">
            Capturing the moments, ceremonies, and scholarly life at the Alpha Institute.
        </p>
    </div>
</section>

<section class="max-w-7xl mx-auto px-6 py-24">
    @php
        $isGeneralFolder = request('folder') === 'general';
        $selectedFolder = request('folder') && ! $isGeneralFolder
            ? \App\Models\GalleryFolder::where('slug', request('folder'))->first()
            : null;
        $generalImages = \App\Models\Gallery::whereNull('gallery_folder_id')->latest()->get();
        $folders = \App\Models\GalleryFolder::withCount('galleries')->orderBy('name')->get();
        $galleries = $isGeneralFolder
            ? $generalImages
            : ($selectedFolder ? $selectedFolder->galleries()->latest()->get() : collect());
    @endphp

    @if($selectedFolder || $isGeneralFolder)
        <div class="mb-10 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
            <div>
                <a href="{{ url('gallery') }}" class="text-primary font-bold hover:underline inline-flex items-center gap-2 mb-4">
                    <span class="material-symbols-outlined text-sm">arrow_back</span>
                    Back to folders
                </a>
                <h2 class="font-display text-4xl font-bold text-primary">{{ $isGeneralFolder ? 'General Gallery' : $selectedFolder->name }}</h2>
                @if(!$isGeneralFolder && $selectedFolder->description)
                    <p class="text-on-surface-variant mt-2 max-w-2xl">{{ $selectedFolder->description }}</p>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($galleries as $gallery)
                <div class="group relative aspect-square overflow-hidden rounded-2xl bg-surface-container-high cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500">
                    <img src="{{ $gallery->photo }}" alt="{{ $gallery->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                        <h3 class="text-white font-display text-lg font-bold translate-y-4 group-hover:translate-y-0 transition-transform duration-300">{{ $gallery->name }}</h3>
                        <div class="w-8 h-0.5 bg-tertiary-fixed mt-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75"></div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-24 text-center bg-surface-container-low rounded-3xl border border-dashed border-outline-variant">
                    <span class="material-symbols-outlined text-5xl text-outline mb-4 opacity-50">photo_library</span>
                    <p class="text-on-surface-variant">No images found in this folder yet.</p>
                </div>
            @endforelse
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($folders as $folder)
                <a href="{{ url('gallery?folder='.$folder->slug) }}" class="group relative aspect-square overflow-hidden rounded-2xl bg-surface-container-high shadow-sm hover:shadow-xl transition-all duration-500">
                    <img src="{{ $folder->cover_photo }}" alt="{{ $folder->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/20 to-transparent flex flex-col justify-end p-6">
                        <span class="material-symbols-outlined text-tertiary-fixed text-4xl mb-3">folder_open</span>
                        <h3 class="text-white font-display text-xl font-bold">{{ $folder->name }}</h3>
                        <p class="text-white/75 text-sm mt-1">{{ $folder->galleries_count }} images</p>
                    </div>
                </a>
            @empty
                @if($generalImages->isEmpty())
                    <div class="col-span-full py-24 text-center bg-surface-container-low rounded-3xl border border-dashed border-outline-variant">
                        <span class="material-symbols-outlined text-5xl text-outline mb-4 opacity-50">photo_library</span>
                        <p class="text-on-surface-variant">No gallery folders found yet.</p>
                    </div>
                @endif
            @endforelse

            @if($generalImages->isNotEmpty())
                <a href="{{ url('gallery?folder=general') }}" class="group relative aspect-square overflow-hidden rounded-2xl bg-surface-container-high shadow-sm hover:shadow-xl transition-all duration-500">
                    <img src="{{ $generalImages->first()->photo }}" alt="General Gallery" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/20 to-transparent flex flex-col justify-end p-6">
                        <span class="material-symbols-outlined text-tertiary-fixed text-4xl mb-3">folder_open</span>
                        <h3 class="text-white font-display text-xl font-bold">General Gallery</h3>
                        <p class="text-white/75 text-sm mt-1">{{ $generalImages->count() }} images</p>
                    </div>
                </a>
            @endif
        </div>
    @endif
</section>
@endsection

