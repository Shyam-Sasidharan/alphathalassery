@extends('layouts.alpha')

@section('title', 'Library | The Alpha Institute')

@section('content')
<!-- Hero Section -->
<section class="relative bg-primary overflow-hidden">
    <div class="absolute inset-0">
        <img alt="Library Background" class="w-full h-full object-cover opacity-40 mix-blend-overlay" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDyuAFuvEDK_BlqYoUz9kD1HVboIB67S6m222mvk0Gv2tk644wj1BXSCL2rf6sk7Lj_fZkjTgqLNC8vO-B5ZNMtx5Ya-mFjKl_Zl4mLe-jf4Ua9h5geDZDvU2JQB66jdxbl5dxU--2UtUNdUF-QTe-kU1LfuYmxR1bYecJ8tJFsJePbmd409o2PBm-KYSEQbWssUs2p5Vm7GPrt_JlQ3rNNpqKatV1Eq5eNjSiG892gOth6sOhrnESjSyqOrN-kNf-TlKcWsjLHwQ"/>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-8 py-24 md:py-32 flex flex-col items-center text-center">
        <div class="w-20 h-1 bg-tertiary-fixed mb-8"></div>
        <h1 class="font-display text-5xl md:text-7xl font-bold text-white mb-6 tracking-tight">Library</h1>
        <p class="font-body text-xl md:text-2xl text-on-primary-container max-w-3xl mx-auto leading-relaxed opacity-90 mb-10">
            Explore our curated digital collection of historical manuscripts, modern theological research, and sacred liturgical art.
        </p>
        <div class="flex items-center gap-3 text-tertiary-fixed">
            <span class="material-symbols-outlined">menu_book</span>
            <span class="font-label font-bold uppercase tracking-[0.3em] text-xs">Ex Cellentia In Litteris</span>
        </div>
    </div>
</section>

<section class="bg-surface-bright py-24 px-8 border-b border-outline-variant/10">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="font-display text-4xl md:text-5xl font-bold text-primary mb-8 tracking-tight">A Sanctuary of Sacred Knowledge</h2>
        <div class="w-12 h-0.5 bg-tertiary-fixed mx-auto mb-8"></div>
        <p class="font-body text-lg md:text-xl text-on-surface-variant leading-relaxed">
            The Alpha Institute Library stands as a curated digital sanctuary dedicated to the preservation and dissemination of historical manuscripts, modern theological research, and sacred liturgical art. Our collection serves as a vital bridge between ancient tradition and contemporary scholarship.
        </p>
    </div>
</section>

@php
    $libraries = \App\Models\Library::with('items')->get();
@endphp

<!-- Main Content -->
<div class="max-w-7xl mx-auto px-8 pt-16 pb-24">
    @foreach($libraries as $lib)
    <section class="mb-20 scroll-mt-40" id="lib-{{ $lib->slug }}">
        <div class="flex items-end justify-between mb-10 border-b border-outline-variant/20 pb-4">
            <div>
                <h2 class="font-headline text-3xl font-bold text-primary italic">{{ $lib->name }}</h2>
                <p class="text-on-surface-variant text-sm mt-2">{!! $lib->content !!}</p>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($lib->items as $book)
            <div class="group flex flex-col bg-surface-container-lowest rounded-xl p-4 shadow-sm border border-outline-variant/10 hover:shadow-xl transition-all duration-300">
                <div class="relative aspect-[3/4] mb-6 overflow-hidden rounded-lg bg-primary/5 flex items-center justify-center">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{ $book->photo }}" alt="{{ $book->title ?? 'Book Cover' }}"/>
                    <div class="absolute top-3 right-3 bg-tertiary text-on-tertiary px-3 py-1 rounded-full text-[10px] font-bold font-label tracking-tighter uppercase">
                        {{ pathinfo($book->pdf, PATHINFO_EXTENSION) ?: 'PDF' }}
                    </div>
                </div>
                <div class="px-2">
                    <h3 class="font-headline text-xl font-bold text-on-surface mb-2">{{ $book->title ?? 'Untitled Book' }}</h3>
                    @if(isset($book->author))
                        <p class="font-body text-on-surface-variant text-sm mb-6 italic">by {{ $book->author }}</p>
                    @endif
                    <a href="{{ asset($book->pdf) }}" download class="w-full bg-primary text-on-primary py-3 rounded-md flex items-center justify-center gap-2 hover:bg-primary-container transition-colors duration-300">
                        <span class="material-symbols-outlined text-sm">download</span>
                        <span class="font-label text-sm font-bold">Download E-Book</span>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full py-12 text-center text-on-surface-variant italic">
                No books available in this section.
            </div>
            @endforelse
        </div>
    </section>
    @endforeach
</div>
@endsection


