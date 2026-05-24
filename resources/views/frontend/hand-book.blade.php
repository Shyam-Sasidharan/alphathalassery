@extends('layouts.alpha')

@section('title', 'Hand Book | The Alpha Institute')

@section('content')
<!-- Hero Section -->
<section class="relative h-[300px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="Hand Book Background" class="w-full h-full object-cover brightness-[0.4]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCgpAdv8Hd7KSDe5L-wgA0PUdeIplPcxCCMIKMF4c72LJYJx9E0pqx1V5YznRt7Cu-3uGQ4TSLz4m6c6ZOJA5eYxasJgm9T_-KLJHaevh3MHoZienoHyRA7Gvw5Ud_FcTiiSHuydaqa9aSTXQPMk7BeycdtH4RRI4nld_3Cz9IrbKMFE9znS1HNiMXk7Bz3LGFAnPEBDH_MOGzbum1u_ScyN44akTX2Eg-QPfaJWu5zCrByo5wdASMNDOc4tgdjeklaGotIRrLu6Q"/>
    </div>
    <div class="relative z-10 text-center px-6">
        <h1 class="font-display text-5xl md:text-6xl text-white tracking-tight mb-4">Institutional Hand Book</h1>
        <div class="h-1 w-20 bg-tertiary-fixed mx-auto mb-6"></div>
        <p class="text-surface-variant font-body text-lg max-w-2xl mx-auto opacity-90 italic">
            Your comprehensive guide to the rules, regulations, and academic life at the Alpha Institute.
        </p>
    </div>
</section>

<section class="max-w-5xl mx-auto px-6 py-24">
    @php
        $handbooks = \App\Models\HandBook::latest()->get();
    @endphp

    <div class="space-y-12">
        @forelse($handbooks as $row)
            @if ($row && $row->file && is_file(public_path($row->file)))
            <div class="bg-surface-container-lowest rounded-3xl overflow-hidden border border-outline-variant/20 shadow-xl">
                <div class="bg-primary/5 p-6 border-b border-outline-variant/10 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary">menu_book</span>
                        <h2 class="font-display text-xl text-primary font-bold">Academic Hand Book</h2>
                    </div>
                    <a href="{{ asset($row->file) }}" download class="bg-primary text-on-primary px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest hover:bg-primary-container transition-colors flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">download</span>
                        Download PDF
                    </a>
                </div>
                <div class="p-4">
                    <iframe src="https://docs.google.com/gview?url={{asset($row->file)}}&embedded=true" class="w-full h-[600px] rounded-xl border border-outline-variant/10" frameborder="0"></iframe>
                </div>
            </div>
            @endif
        @empty
            <div class="py-24 text-center bg-surface-container-low rounded-3xl border border-dashed border-outline-variant">
                <span class="material-symbols-outlined text-5xl text-outline mb-4 opacity-50">book_off</span>
                <p class="text-on-surface-variant">Institutional hand book is currently being updated. Please check back later.</p>
            </div>
        @endforelse
    </div>
</section>
@endsection

