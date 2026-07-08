@extends('layouts.alpha')

@section('title', 'Library | The Alpha Institute')

@section('css')
<style>
    .library-catalog-card {
        background: rgba(255, 255, 255, 0.72);
        border: 1px solid rgba(47, 76, 127, 0.12);
        box-shadow: 0 18px 44px rgba(27, 28, 28, 0.06);
    }

    .library-catalog-list li {
        padding-left: 0.75rem;
        margin-bottom: 0.9rem;
        line-height: 1.7;
    }
</style>
@endsection

@section('content')
@include('frontend.partials.page-banner', [
    'pageKey' => 'library',
    'defaultTitle' => 'Library',
    'defaultDescription' => 'Access Alpha Central Library facilities and collaborating theological libraries for research and reference.',
    'height' => 'h-[360px]',
])

<section class="bg-surface-bright py-12 px-8 border-b border-outline-variant/10">
    <div class="max-w-5xl mx-auto">
        <div class="text-center">
            <h2 class="font-display text-4xl md:text-5xl font-bold text-primary mb-4 tracking-tight">Alpha Library Catalogue</h2>
            <div class="w-12 h-0.5 bg-tertiary-fixed mx-auto mb-6"></div>
        </div>

        <div class="library-catalog-card rounded-xl p-6 md:p-8">
            <div class="mb-5">
                <h3 class="font-display text-2xl font-bold text-primary mb-3">Alpha Central Library at Thalassery</h3>
                <p class="font-body text-on-surface-variant leading-relaxed">
                    The students can make use of the library facilities available at Alpha Research Center.
                </p>
            </div>

            <div class="mb-5">
                <h3 class="font-display text-2xl font-bold text-primary mb-3">Collaborating Libraries</h3>
                <p class="font-body text-on-surface-variant leading-relaxed">
                    Besides the library facilities available at the Alpha Center, the research scholars of the Alpha Centre will have access to nationally reputed libraries of various theological centers across India. The tie-up made between the Alpha Centre and these institutions enables mutual sharing of library and infrastructure facilities.
                </p>
            </div>

            <ul class="library-catalog-list font-body text-on-surface-variant list-disc pl-5">
                <li><strong class="text-primary">St. Joseph's Pontifical Library, Alwaye</strong> - More than 80000 books in Christian Theology and Asian Christian Studies.</li>
                <li><strong class="text-primary">St. Thomas Paurasthya Vidhyapeedam Library, Kottayam</strong> - More than 70000 books in various branches of Christian Theology.</li>
                <li><strong class="text-primary">Good Shepherd Major Seminary Library, Kunnoth, Kannur</strong> - More than 30000 books on various branches of Christian Theology.</li>
                <li><strong class="text-primary">Jnanadeepa Vidya Pidam, Pune</strong> - More than 100000 books on various branches of Christian Theology in English, French, German, and Italian languages.</li>
                <li><strong class="text-primary">Dharmaram Vidykshetra Library</strong> - More than 100000 books on various branches of Christian Theology in English, French, German, and Italian languages.</li>
            </ul>
        </div>
    </div>
</section>

<section class="bg-surface-bright py-10 px-8 border-b border-outline-variant/10">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="font-display text-4xl md:text-5xl font-bold text-primary mb-4 tracking-tight">E-Books</h2>
        <div class="w-12 h-0.5 bg-tertiary-fixed mx-auto mb-6"></div>
        <p class="font-body text-lg md:text-xl text-on-surface-variant leading-relaxed">
            Browse available digital books and reference materials from the Alpha Library collection.
        </p>
    </div>
</section>

@php
    $libraries = \App\Models\Library::with('items')->get();
@endphp

<!-- Main Content -->
<div class="max-w-7xl mx-auto px-8 pt-10 pb-16">
    @foreach($libraries as $lib)
    <section class="mb-12 scroll-mt-40" id="lib-{{ $lib->slug }}">
        <div class="flex items-end justify-between mb-6 border-b border-outline-variant/20 pb-4">
            <div>
                <h2 class="font-headline text-3xl font-bold text-primary italic">{{ $lib->name }}</h2>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($lib->items as $book)
            @php
                $bookUrl = asset($book->pdf);
                $bookTitle = trim($book->title) ?: 'Alpha Library Book '.$loop->iteration;
                $bookExtension = strtolower(pathinfo($book->pdf, PATHINFO_EXTENSION) ?: 'pdf');
                $downloadName = trim(preg_replace('/[^A-Za-z0-9]+/', '-', $bookTitle), '-').'.'.$bookExtension;
                $viewerId = 'libraryBookViewer'.$book->id;
            @endphp
            <div class="group flex flex-col bg-surface-container-lowest rounded-xl p-4 shadow-sm border border-outline-variant/10 hover:shadow-xl transition-all duration-300">
                <div class="relative aspect-[3/4] mb-6 overflow-hidden rounded-lg bg-primary/5 flex items-center justify-center">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{ $book->photo }}" alt="{{ $bookTitle }}"/>
                    <div class="absolute top-3 right-3 bg-tertiary text-on-tertiary px-3 py-1 rounded-full text-[10px] font-bold font-label tracking-tighter uppercase">
                        {{ $bookExtension }}
                    </div>
                </div>
                <div class="px-2 flex flex-col flex-1">
                    <h3 class="font-headline text-xl font-bold text-on-surface mb-2">{{ $bookTitle }}</h3>
                    @if(isset($book->author))
                        <p class="font-body text-on-surface-variant text-sm mb-6 italic">by {{ $book->author }}</p>
                    @endif
                    <div class="grid grid-cols-2 gap-3 mt-auto">
                        @if($bookExtension === 'pdf')
                            <button type="button" data-toggle="modal" data-target="#{{ $viewerId }}" class="w-full bg-surface-container-low text-primary border border-primary/20 py-3 rounded-md flex items-center justify-center gap-2 hover:bg-primary/10 transition-colors duration-300">
                                <span class="material-symbols-outlined text-sm">visibility</span>
                                <span class="font-label text-sm font-bold">View</span>
                            </button>
                        @else
                            <a href="{{ $bookUrl }}" target="_blank" class="w-full bg-surface-container-low text-primary border border-primary/20 py-3 rounded-md flex items-center justify-center gap-2 hover:bg-primary/10 transition-colors duration-300">
                                <span class="material-symbols-outlined text-sm">open_in_new</span>
                                <span class="font-label text-sm font-bold">View</span>
                            </a>
                        @endif
                        <a href="{{ $bookUrl }}" download="{{ $downloadName }}" class="w-full bg-primary text-on-primary py-3 rounded-md flex items-center justify-center gap-2 hover:bg-primary-container transition-colors duration-300">
                            <span class="material-symbols-outlined text-sm">download</span>
                            <span class="font-label text-sm font-bold">Download</span>
                        </a>
                    </div>
                </div>
            </div>

            @if($bookExtension === 'pdf')
            <div class="modal fade" id="{{ $viewerId }}" tabindex="-1" role="dialog" aria-labelledby="{{ $viewerId }}Label" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content overflow-hidden rounded-xl border-0">
                        <div class="bg-primary text-on-primary px-6 py-4 flex items-center justify-between">
                            <h5 class="font-display text-xl font-bold m-0" id="{{ $viewerId }}Label">{{ $bookTitle }}</h5>
                            <button type="button" class="text-on-primary/80 hover:text-on-primary" data-dismiss="modal" aria-label="Close">
                                <span class="material-symbols-outlined">close</span>
                            </button>
                        </div>
                        <div class="bg-surface p-4">
                            <iframe src="{{ $bookUrl }}" class="w-full h-[75vh] rounded-lg border border-outline-variant/20" frameborder="0"></iframe>
                            <div class="mt-4 flex justify-end">
                                <a href="{{ $bookUrl }}" download="{{ $downloadName }}" class="bg-primary text-on-primary px-5 py-3 rounded-md flex items-center gap-2 hover:bg-primary-container transition-colors duration-300">
                                    <span class="material-symbols-outlined text-sm">download</span>
                                    <span class="font-label text-sm font-bold">Download PDF</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
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


