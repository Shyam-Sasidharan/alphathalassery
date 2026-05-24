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
    $keralaCenters = $centers->filter(function($c) { return $c->location === 'Study Centers in Kerala'; });
    $outsideKerala = $centers->filter(function($c) { return $c->location !== 'Study Centers in Kerala'; });
@endphp

<main class="py-24 bg-surface">
    <!-- Kerala Centers -->
    <section class="max-w-7xl mx-auto mb-24 px-6">
        <div class="flex items-center justify-between mb-12 border-b border-outline-variant/30 pb-6">
            <h2 class="text-4xl font-display text-primary flex items-center gap-4 italic">
                Study Centers in Kerala
            </h2>
            <span class="font-label text-xs font-bold text-outline uppercase tracking-widest">Regional Hubs</span>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($keralaCenters as $center)
            <div class="bg-surface-container-lowest p-1 rounded-xl flex flex-col md:flex-row overflow-hidden hover:translate-y-[-4px] transition-transform duration-300 shadow-sm border border-outline-variant/10">
                <div class="h-48 md:h-auto md:w-48 flex-shrink-0 bg-primary-container relative">
                    @if($center->image)
                        <img alt="{{ $center->center }}" class="w-full h-full object-cover mix-blend-overlay opacity-60" src="{{ asset($center->image) }}"/>
                    @else
                        <img alt="{{ $center->center }}" class="w-full h-full object-cover mix-blend-overlay opacity-60" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCX5xrmdsuYvhLICMSQyvv2sT5hVIjNBsViiDcg7fQp75ITkfFL6JDVXCZkViF5bhUNEM06kDF-hI7J-U91GWBvhwM9DU7R7KB6nGQPjr6x-EEZliX7A72aBC_mIB9Mkb18KBEzKO4g5areUpe1s_WkHHmp2-UA75CYvjcsSHFIh7Mauck1L9JFiwb23zcvN08G-0JJGaLc8ntbnmEa2SJTvc_RzucfNaTTmDUdjUMN52SuWrgRBd4rkXiO3nzqA-OIP8P1ic3QQw"/>
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
    </section>

    <!-- Outside Kerala Centers -->
    @if($outsideKerala->isNotEmpty())
    <section class="bg-surface-container-low py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between mb-12 border-b border-primary/20 pb-6">
                <div class="max-w-xl">
                    <h2 class="text-4xl font-display text-primary flex items-center gap-4 italic">
                        Other Study Centers
                    </h2>
                    <p class="text-on-surface-variant font-body mt-2">Extending our scholarly reach beyond the borders of Kerala.</p>
                </div>
                <span class="font-label text-xs font-bold text-outline uppercase tracking-widest">Global Reach</span>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($outsideKerala as $center)
                <div class="bg-surface-container-lowest p-1 rounded-xl flex flex-col md:flex-row overflow-hidden hover:translate-y-[-4px] transition-transform duration-300 shadow-sm border border-outline-variant/10">
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
        </div>
    </section>
    @endif
</main>
@endsection



