@extends('layouts.alpha')

@section('title', 'Downloads | The Alpha Institute')

@section('content')
<!-- Hero Section -->
<section class="relative h-[300px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="Downloads Background" class="w-full h-full object-cover brightness-[0.4]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCgpAdv8Hd7KSDe5L-wgA0PUdeIplPcxCCMIKMF4c72LJYJx9E0pqx1V5YznRt7Cu-3uGQ4TSLz4m6c6ZOJA5eYxasJgm9T_-KLJHaevh3MHoZienoHyRA7Gvw5Ud_FcTiiSHuydaqa9aSTXQPMk7BeycdtH4RRI4nld_3Cz9IrbKMFE9znS1HNiMXk7Bz3LGFAnPEBDH_MOGzbum1u_ScyN44akTX2Eg-QPfaJWu5zCrByo5wdASMNDOc4tgdjeklaGotIRrLu6Q"/>
    </div>
    <div class="relative z-10 text-center px-6">
        <h1 class="font-display text-5xl md:text-6xl text-white tracking-tight mb-4">Academic Resources</h1>
        <div class="h-1 w-20 bg-tertiary-fixed mx-auto mb-6"></div>
        <p class="text-surface-variant font-body text-lg max-w-2xl mx-auto opacity-90 italic">
            Access and download important documents, application forms, and academic materials.
        </p>
    </div>
</section>

<section class="max-w-7xl mx-auto px-6 lg:px-12 py-24">
    @php
        $categories = \App\Models\DownloadCategory::with('items')->get();
    @endphp

    @forelse($categories as $category)
        @if($category->items->isNotEmpty())
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-8">
                <h2 class="font-display text-3xl font-bold text-primary">{{ $category->name }}</h2>
                <div class="h-[1px] flex-grow bg-outline-variant/30"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($category->items as $download)
                @php
                    $fileUrl = asset($download->doc);
                    $fileExtension = strtolower(pathinfo($download->doc, PATHINFO_EXTENSION));
                    $canPreview = in_array($fileExtension, ['pdf', 'jpg', 'jpeg', 'png']);
                @endphp
                <div class="bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/10 shadow-sm hover:shadow-md transition-all group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-primary/5 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-3xl">description</span>
                        </div>
                        @if($canPreview)
                            <button
                                type="button"
                                class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all"
                                data-download-preview
                                data-preview-url="{{ $fileUrl }}"
                                data-download-url="{{ $fileUrl }}"
                                data-preview-title="{{ $download->title }}"
                            >
                                <span class="material-symbols-outlined text-xl">visibility</span>
                            </button>
                        @else
                            <a href="{{ $fileUrl }}" download class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all">
                                <span class="material-symbols-outlined text-xl">download</span>
                            </a>
                        @endif
                    </div>
                    <h3 class="font-bold text-primary text-lg mb-2 group-hover:text-primary-container transition-colors">{{ $download->title }}</h3>
                    <p class="text-on-surface-variant text-sm leading-relaxed mb-6">{{ $download->content }}</p>
                    <div class="flex items-center justify-between pt-4 border-t border-outline-variant/10">
                        <span class="text-[10px] font-label font-bold text-outline uppercase tracking-widest">{{ strtoupper($fileExtension ?: 'Document') }}</span>
                        <div class="flex items-center gap-4">
                            @if($canPreview)
                                <button
                                    type="button"
                                    class="text-primary text-xs font-bold uppercase tracking-wider flex items-center gap-1 hover:underline"
                                    data-download-preview
                                    data-preview-url="{{ $fileUrl }}"
                                    data-download-url="{{ $fileUrl }}"
                                    data-preview-title="{{ $download->title }}"
                                >
                                    Preview
                                    <span class="material-symbols-outlined text-sm">visibility</span>
                                </button>
                            @endif
                            <a href="{{ $fileUrl }}" download class="text-primary text-xs font-bold uppercase tracking-wider flex items-center gap-1 hover:underline">
                            Download Now
                                <span class="material-symbols-outlined text-sm">download</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    @empty
        <div class="py-24 text-center bg-surface-container-low rounded-3xl border border-dashed border-outline-variant">
            <span class="material-symbols-outlined text-5xl text-outline mb-4 opacity-50">folder_open</span>
            <p class="text-on-surface-variant">No downloadable resources available at the moment.</p>
        </div>
    @endforelse
</section>

<div id="downloadPreviewModal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/70 p-4" role="dialog" aria-modal="true" aria-labelledby="downloadPreviewTitle">
    <div class="flex h-[90vh] w-full max-w-6xl flex-col overflow-hidden rounded-2xl bg-surface shadow-2xl">
        <div class="flex items-center justify-between gap-4 border-b border-outline-variant/20 px-5 py-4">
            <h2 id="downloadPreviewTitle" class="truncate font-display text-xl font-bold text-primary">Document Preview</h2>
            <div class="flex items-center gap-3">
                <a id="downloadPreviewLink" href="#" download class="flex items-center gap-2 rounded-lg bg-primary px-4 py-2 text-xs font-bold uppercase tracking-wider text-on-primary">
                    <span class="material-symbols-outlined text-base">download</span>
                    Download
                </a>
                <button type="button" class="flex h-10 w-10 items-center justify-center rounded-full bg-surface-container-high text-primary" data-download-preview-close aria-label="Close preview">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
        </div>
        <iframe id="downloadPreviewFrame" class="min-h-0 flex-1 w-full bg-white" src="about:blank" title="Document preview"></iframe>
    </div>
</div>
@endsection

@section('js')
<script>
    (function () {
        var modal = document.getElementById('downloadPreviewModal');
        var frame = document.getElementById('downloadPreviewFrame');
        var title = document.getElementById('downloadPreviewTitle');
        var downloadLink = document.getElementById('downloadPreviewLink');

        function closePreview() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            frame.src = 'about:blank';
            document.body.classList.remove('overflow-hidden');
        }

        document.querySelectorAll('[data-download-preview]').forEach(function (button) {
            button.addEventListener('click', function () {
                frame.src = button.getAttribute('data-preview-url');
                downloadLink.href = button.getAttribute('data-download-url');
                title.textContent = button.getAttribute('data-preview-title') || 'Document Preview';
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.classList.add('overflow-hidden');
            });
        });

        document.querySelectorAll('[data-download-preview-close]').forEach(function (button) {
            button.addEventListener('click', closePreview);
        });

        modal.addEventListener('click', function (event) {
            if (event.target === modal) {
                closePreview();
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                closePreview();
            }
        });
    })();
</script>
@endsection

