@php
    $banner = \App\Models\PageBanner::where('page_key', $pageKey)->first();
    $bannerTitle = $banner && trim($banner->title) ? $banner->title : $defaultTitle;
    $bannerDescription = $banner && trim($banner->description) ? $banner->description : $defaultDescription;
    $defaultBannerImage = 'https://lh3.googleusercontent.com/aida-public/AB6AXuCgpAdv8Hd7KSDe5L-wgA0PUdeIplPcxCCMIKMF4c72LJYJx9E0pqx1V5YznRt7Cu-3uGQ4TSLz4m6c6ZOJA5eYxasJgm9T_-KLJHaevh3MHoZienoHyRA7Gvw5Ud_FcTiiSHuydaqa9aSTXQPMk7BeycdtH4RRI4nld_3Cz9IrbKMFE9znS1HNiMXk7Bz3LGFAnPEBDH_MOGzbum1u_ScyN44akTX2Eg-QPfaJWu5zCrByo5wdASMNDOc4tgdjeklaGotIRrLu6Q';
    $bannerImage = $banner && $banner->image ? asset($banner->image) : ($defaultImage ?? $defaultBannerImage);
    $bannerHeight = $height ?? 'h-[450px]';
@endphp

<section class="relative {{ $bannerHeight }} flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="{{ $bannerTitle }} Banner" class="w-full h-full object-cover brightness-[0.35]" src="{{ $bannerImage }}"/>
    </div>
    <div class="relative z-10 text-center px-6">
        <h1 class="font-display text-5xl md:text-7xl text-white tracking-tight mb-4">{{ $bannerTitle }}</h1>
        <div class="h-1 w-24 bg-tertiary-fixed mx-auto mb-6"></div>
        @if($bannerDescription)
            <p class="text-surface-variant font-body text-lg md:text-xl max-w-3xl mx-auto opacity-90 italic leading-relaxed">
                {!! nl2br(e($bannerDescription)) !!}
            </p>
        @endif
    </div>
    <div class="absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-surface to-transparent"></div>
</section>
