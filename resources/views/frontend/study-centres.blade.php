@extends('layouts.alpha')

@section('title', 'Study Centers | The Alpha Institute')

@section('content')
<!-- Hero Section -->
<section class="relative bg-primary pt-32 pb-24 overflow-hidden min-h-[500px] flex items-center">
    <div class="absolute inset-0 z-0">
        <img alt="Institute Library" class="w-full h-full object-cover opacity-30 mix-blend-overlay" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBvS0PHCclDrZfradOC2uYxLcZTVKd5n7K6ZD9bY2c1PjBM1lqlCVf9rZ_dKa0HJcgIwS0RGhvv9ufBqzlcblHp9Gp-KKTBRMoI5zG_AkRRaicVT8afc6K-1OzLfnYWIvpQRfUAoaoLvjKqJ74-CSBAGhRh5W3yK4GFNzUH-RIDDabLRvRNi1ELt_iXzkJBP59maNwTR7yBTaGVQJ2Cjxle2N4TYery71Rzr9bsS2YHXYtP2R6qlwQ0Y-CE0b7rxjQN0HoN1n4O3g"/>
        <div class="absolute inset-0 bg-gradient-to-b from-primary/80 via-primary to-primary"></div>
    </div>
    <div class="relative z-10 container mx-auto px-6 text-center">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center justify-center gap-4 mb-6">
                <div class="h-[1px] w-12 bg-tertiary-fixed/40"></div>
                <span class="text-tertiary-fixed font-label text-[10px] font-bold uppercase tracking-[0.3em]">The Alpha Institute</span>
                <div class="h-[1px] w-12 bg-tertiary-fixed/40"></div>
            </div>
            <h1 class="text-5xl md:text-7xl font-display font-bold text-white tracking-tight mb-8">
                Study <span class="text-tertiary-fixed italic">Centers</span>
            </h1>
            <div class="h-1 w-24 bg-tertiary-fixed mx-auto mb-10 rounded-full"></div>
            <p class="text-xl md:text-2xl text-primary-fixed/80 font-body leading-relaxed max-w-2xl mx-auto">
                Connect with our accredited centers of excellence across the globe. Our institutions provide the environment for rigorous inquiry and spiritual formation.
            </p>
        </div>
    </div>
</section>

@php
    $centers = \App\Models\Center::all();
    $centerGroups = [
        'Study Centers in Kerala' => $centers->filter(function($c) { return $c->location === 'Study Centers in Kerala'; }),
        'Study Centers outside Kerala' => $centers->filter(function($c) { return $c->location === 'Study Centers outside Kerala'; }),
        'Study Centers outside India' => $centers->filter(function($c) { return $c->location === 'Study Centers outside India'; }),
    ];
@endphp

<main class="py-24 bg-surface">
    <section class="max-w-7xl mx-auto px-6">
        <div class="rounded-md border border-outline-variant/30 overflow-hidden bg-surface-container-lowest">
            @foreach($centerGroups as $title => $groupCenters)
                @php
                    $panelId = 'studyCenterPanel'.$loop->iteration;
                @endphp
                <div class="border-b border-outline-variant/30 last:border-b-0">
                    <button type="button" class="study-center-toggle w-full flex items-center justify-between gap-4 px-6 py-6 text-left hover:bg-surface-container-low transition-colors" data-target="{{ $panelId }}">
                        <span class="font-display text-2xl font-bold text-primary">{{ $title }}</span>
                        <span class="material-symbols-outlined text-primary text-3xl transition-transform">add</span>
                    </button>

                    <div id="{{ $panelId }}" class="study-center-panel hidden px-6 pb-8">
                        @if($groupCenters->isNotEmpty())
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-2">
                                @foreach($groupCenters as $center)
                                <div class="bg-surface p-1 rounded-xl flex flex-col md:flex-row overflow-hidden hover:translate-y-[-4px] transition-transform duration-300 shadow-sm border border-outline-variant/10">
                                    <div class="h-48 md:h-auto md:w-48 flex-shrink-0 bg-primary-container relative">
                                        @if($center->image)
                                            <img alt="{{ $center->center }}" class="w-full h-full object-cover mix-blend-overlay opacity-60" src="{{ asset($center->image) }}"/>
                                        @else
                                            <div class="absolute inset-0 flex items-center justify-center">
                                                <span class="text-6xl font-display text-white/10 italic font-bold">ALPHA</span>
                                            </div>
                                        @endif
                                        <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent"></div>
                                        <div class="absolute bottom-4 left-4">
                                            <span class="bg-tertiary-fixed text-on-tertiary-fixed text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-widest">{{ $center->location }}</span>
                                        </div>
                                    </div>
                                    <div class="p-8 flex flex-col justify-center flex-grow">
                                        <h3 class="text-2xl font-bold text-primary mb-1">{{ $center->center }}</h3>
                                        <p class="text-sm text-on-surface-variant mb-6 italic">{{ $center->address }}</p>
                                        <div class="grid grid-cols-2 gap-4 border-t border-surface-container pt-4">
                                            <div>
                                                <p class="text-[10px] font-label font-bold text-outline uppercase tracking-wider mb-1">Coordinator</p>
                                                <p class="text-sm font-bold">{{ $center->coordinator }}</p>
                                            </div>
                                            <div>
                                                <p class="text-[10px] font-label font-bold text-outline uppercase tracking-wider mb-1">Contact</p>
                                                <p class="text-sm font-bold text-primary">{{ $center->phone }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="py-10 text-center text-on-surface-variant">
                                No study centers added in this section.
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</main>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.study-center-toggle').forEach(function (button) {
            button.addEventListener('click', function () {
                var panel = document.getElementById(button.dataset.target);
                var icon = button.querySelector('.material-symbols-outlined');
                var isOpen = panel && !panel.classList.contains('hidden');

                document.querySelectorAll('.study-center-panel').forEach(function (item) {
                    item.classList.add('hidden');
                });
                document.querySelectorAll('.study-center-toggle .material-symbols-outlined').forEach(function (item) {
                    item.textContent = 'add';
                    item.style.transform = '';
                });

                if (panel && !isOpen) {
                    panel.classList.remove('hidden');
                    icon.textContent = 'remove';
                    icon.style.transform = 'rotate(180deg)';
                }
            });
        });
    });
</script>
@endsection



