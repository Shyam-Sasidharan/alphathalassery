@extends('layouts.alpha')

@section('title', 'About Alpha Institute | The Alpha Institute')

@section('content')
<!-- Hero Section -->
<header class="relative h-[614px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="Alpha Institute Campus" class="w-full h-full object-cover brightness-[0.35]" src="{{ asset('front/images/about-alpha-institute-banner.png') }}"/>
    </div>
    <div class="relative z-10 text-center px-6">
        <span class="font-label text-tertiary-fixed tracking-[0.2em] uppercase text-xs font-bold">The Pursuit of Truth</span>
        <h1 class="font-display text-5xl md:text-7xl text-white tracking-tight mt-4 mb-6">About Alpha Institute</h1>
        <div class="h-1 w-24 bg-tertiary-fixed mx-auto mb-6"></div>
        <p class="text-surface-variant font-body text-lg md:text-xl max-w-3xl mx-auto opacity-90">An intellectual sanctuary dedicated to the profound synthesis of Faith, Reason, and Scientific Inquiry within the Catholic academic tradition.</p>
    </div>
    <div class="absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-surface to-transparent"></div>
</header>

<!-- Welcome Section -->
<section class="py-24 px-8 max-w-7xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
        <div class="relative group">
            <div class="absolute -inset-4 bg-tertiary-fixed/10 rounded-xl -rotate-2 -z-10"></div>
            <img alt="Alpha Institute Campus" class="rounded-xl shadow-2xl w-full aspect-video object-cover transition-transform duration-700 group-hover:scale-[1.02]" src="{{ asset('front/images/about-alpha-institute-banner.png') }}"/>
        </div>
        <div class="space-y-8">
            <h2 class="font-display text-4xl text-primary leading-tight font-bold">Welcome to Alpha Center for Theology and Science</h2>
            <div class="space-y-4 font-body text-lg text-on-surface-variant leading-relaxed">
                <p>Alpha Institute of Theology and Science is a premier academic institution under the patronage of the Syro-Malabar Catholic Church. We stand as a beacon of intellectual rigor, bridging the gap between historical revelation and contemporary scientific understanding.</p>
                <p>Founded with the mission to provide accessible, high-quality theological education, the institute has evolved into a global platform for scholars and students seeking a holistic understanding of existence through the lens of faith and reason.</p>
            </div>
            <div class="flex items-center gap-4 pt-4">
                <div class="h-[2px] w-12 bg-tertiary"></div>
                <span class="italic font-headline text-primary opacity-80 italic">Rooted in Tradition, Aimed at Infinity.</span>
            </div>
        </div>
    </div>
</section>

<!-- Institutional Context: Bento Grid Layout -->
<section class="py-24 bg-surface-container-low px-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            <!-- Vision & Mission -->
            <div class="md:col-span-7 bg-surface-container-lowest p-12 rounded-xl shadow-sm border border-outline-variant/10">
                <div class="flex items-center gap-3 mb-6">
                    <span class="material-symbols-outlined text-tertiary text-3xl">visibility</span>
                    <h3 class="font-display text-3xl text-primary font-bold">Vision & Mission</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h4 class="font-label text-sm font-bold uppercase text-tertiary tracking-widest mb-4">Our Vision</h4>
                        <p class="font-body text-on-surface-variant leading-relaxed">To be a globally recognized center of excellence in theological education, fostering a community of scholars who can articulately engage with the modern world's challenges while remaining deeply rooted in the Christian tradition.</p>
                    </div>
                    <div>
                        <h4 class="font-label text-sm font-bold uppercase text-tertiary tracking-widest mb-4">Our Mission</h4>
                        <p class="font-body text-on-surface-variant leading-relaxed">To empower lay people and religious alike through rigorous academic programs that explore the intersections of theology, philosophy, and the natural sciences, promoting an integral humanism.</p>
                    </div>
                </div>
            </div>
            <!-- Purpose -->
            <div class="md:col-span-5 bg-primary p-12 rounded-xl text-on-primary relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:opacity-20 transition-opacity">
                    <span class="material-symbols-outlined text-[120px]">school</span>
                </div>
                <div class="relative z-10">
                    <h3 class="font-display text-3xl font-bold mb-6">Purpose</h3>
                    <p class="font-body text-on-primary-container leading-relaxed text-lg">The primary purpose of Alpha Institute is the systematic study and dissemination of Catholic Theology and Philosophy, tailored for the contemporary intellectual landscape. We strive to provide a scholarly environment where students can pursue academic excellence without geographical constraints.</p>
                </div>
            </div>
            <!-- Orientations and Goals -->
            <div class="md:col-span-5 bg-surface-container-lowest p-12 rounded-xl shadow-sm border border-outline-variant/10">
                <div class="flex items-center gap-3 mb-6">
                    <span class="material-symbols-outlined text-tertiary text-3xl">compass_calibration</span>
                    <h3 class="font-display text-3xl text-primary font-bold">Orientations & Goals</h3>
                </div>
                <ul class="space-y-4 font-body text-on-surface-variant">
                    <li class="flex items-start gap-3">
                        <span class="text-tertiary mt-1">•</span>
                        <span>Advancing theological literacy among the Christian community worldwide.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-tertiary mt-1">•</span>
                        <span>Fostering a dialogue between religious faith and scientific discovery.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-tertiary mt-1">•</span>
                        <span>Developing curricula that address current socio-ethical issues.</span>
                    </li>
                </ul>
            </div>
            <!-- Certificates -->
            <div class="md:col-span-7 bg-tertiary-fixed p-12 rounded-xl flex items-center gap-12">
                <div class="hidden lg:block w-48 h-48 flex-shrink-0 bg-on-tertiary-fixed-variant/5 rounded-full border-4 border-on-tertiary-fixed-variant/10 p-4">
                    <div class="w-full h-full border border-dashed border-on-tertiary-fixed-variant/30 rounded-full flex items-center justify-center">
                        <span class="material-symbols-outlined text-on-tertiary-fixed-variant text-6xl" data-weight="fill">verified</span>
                    </div>
                </div>
                <div>
                    <h3 class="font-display text-3xl text-on-tertiary-fixed font-bold mb-4">Recognized Certificates</h3>
                    <p class="font-body text-on-tertiary-fixed-variant leading-relaxed text-lg mb-6">Our programs are accredited through the highest ecclesial authorities, ensuring your academic journey is recognized globally within the Catholic Church and beyond. Certificates are awarded upon rigorous assessment and comprehensive examinations.</p>
                    <button class="font-label text-sm font-bold text-on-tertiary-fixed flex items-center gap-2 hover:translate-x-2 transition-transform">
                        View Accreditation Details
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Episcopal Patrons Section -->
<section class="py-24 px-8 max-w-7xl mx-auto">
    <div class="text-center mb-16 space-y-4">
        <span class="font-label text-tertiary tracking-[0.2em] uppercase text-xs font-bold">Institutional Governance</span>
        <h2 class="font-display text-4xl text-primary font-bold">Episcopal Patrons of Alpha Institute</h2>
        <div class="w-24 h-1 bg-tertiary mx-auto mt-6"></div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 max-w-2xl mx-auto">
        @foreach([
            ['name' => 'Archbishop Mar Joseph Pamplany', 'role' => 'Chancellor Tely-Alpha Center For Religious Science, Moderator Alpha Higher Institute of Religious Sciences', 'image' => 'front/images/Pamplany.jpg'],
            ['name' => 'Archbishop Mar George Valiamattam', 'role' => 'Founder Alpha Institute', 'image' => 'front/images/valiamattam.jpg'],
            {{--
            ['name' => 'Bishop Mar Joseph Srampickal', 'role' => 'Patron at UK', 'image' => 'front/images/srampickal.jpg'],
            ['name' => 'Ret. Rev. Dr. Paul Hinder', 'role' => 'Patron at Gulf Region', 'image' => 'front/images/hinder.jpg'],
            ['name' => 'Bishop Mar Lawrence Mukkuzhy', 'role' => 'Patron at Karnataka', 'image' => 'front/images/mukkuzhy.jpg'],
            ['name' => 'Bishop Mar Joseph Kollamparabil', 'role' => 'Patron at Jagadalpur', 'image' => 'front/images/kollamparambil.jpg'],
            ['name' => 'Bishop Mar Jacob Angadiyath', 'role' => 'Patron at USA', 'image' => 'front/images/CMM.jpg'],
            --}}
        ] as $patron)
            <article class="group h-full">
                <div class="relative overflow-hidden rounded-xl mb-6 aspect-[3/4] bg-surface-container-high">
                    <img
                        alt="{{ $patron['name'] }}"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                        src="{{ asset($patron['image']) }}"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex flex-col justify-end p-6">
                        <p class="text-on-primary text-xs font-label uppercase tracking-widest">{{ $patron['role'] }}</p>
                    </div>
                </div>
                <h4 class="font-headline text-lg xl:text-base text-primary font-bold text-center leading-snug">{{ $patron['name'] }}</h4>
                <p class="font-label text-sm text-on-surface-variant text-center mt-1">{{ $patron['role'] }}</p>
            </article>
        @endforeach
    </div>
</section>
@endsection
