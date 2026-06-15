@extends('layouts.alpha')

@section('title', 'Publications | The Alpha Institute')

@section('css')
<style>
    .publication-summary {
        max-height: 4.8rem;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .publication-card:hover .publication-summary,
    .publication-card:focus-within .publication-summary {
        max-height: 32rem;
    }
</style>
@endsection

@section('content')
<!-- Scholarly Hero Section -->
<section class="relative h-[450px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="Library Background" class="w-full h-full object-cover brightness-[0.35]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCgpAdv8Hd7KSDe5L-wgA0PUdeIplPcxCCMIKMF4c72LJYJx9E0pqx1V5YznRt7Cu-3uGQ4TSLz4m6c6ZOJA5eYxasJgm9T_-KLJHaevh3MHoZienoHyRA7Gvw5Ud_FcTiiSHuydaqa9aSTXQPMk7BeycdtH4RRI4nld_3Cz9IrbKMFE9znS1HNiMXk7Bz3LGFAnPEBDH_MOGzbum1u_ScyN44akTX2Eg-QPfaJWu5zCrByo5wdASMNDOc4tgdjeklaGotIRrLu6Q"/>
    </div>
    <div class="relative z-10 text-center px-6">
        <h1 class="font-display text-5xl md:text-7xl text-white tracking-tight mb-4">Publications</h1>
        <div class="h-1 w-24 bg-tertiary-fixed mx-auto mb-6"></div>
        <p class="text-surface-variant font-body text-lg md:text-xl max-w-2xl mx-auto opacity-90 italic">
            Curating the collective wisdom of religious science through rigorous academic inquiry and scriptural excellence.
        </p>
    </div>
</section>

@php
    $categories = \App\Models\Category::with('items')->get();
    $selectedCategory = $categories->first(function ($category) {
        return $category->slug === request('category');
    });
    $publicationQuery = \App\Models\Publication::with('category')->latest();

    if ($selectedCategory) {
        $publicationQuery->where('category_id', $selectedCategory->id);
    }

    $publications = $publicationQuery->paginate(12);
    $publications->appends(request()->except('page'));
@endphp

<!-- Main Content Area -->
<section class="max-w-7xl mx-auto px-6 py-20">
    <div class="flex flex-col lg:flex-row gap-12">
        <!-- Filters Sidebar -->
        <aside class="w-full lg:w-64 space-y-10">
            <div class="sticky top-32">
                <h2 class="font-display text-xl text-primary mb-6 border-b border-outline-variant/30 pb-2">Categories</h2>
                <ul class="space-y-3 font-label text-sm uppercase tracking-wider">
                    <li>
                        <a class="flex items-center transition-colors group {{ $selectedCategory ? 'text-on-surface-variant hover:text-primary' : 'text-primary font-bold' }}"
                           href="{{ url('publications') }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 transition-all {{ $selectedCategory ? 'bg-outline-variant/50 group-hover:bg-tertiary' : 'bg-tertiary' }}"></span>
                            All Publications
                        </a>
                    </li>
                    @foreach($categories as $category)
                    <li>
                        <a class="flex items-center transition-colors group {{ $selectedCategory && $selectedCategory->id === $category->id ? 'text-primary font-bold' : 'text-on-surface-variant hover:text-primary' }}"
                           href="{{ url('publications') . '?category=' . urlencode($category->slug) }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 transition-all {{ $selectedCategory && $selectedCategory->id === $category->id ? 'bg-tertiary' : 'bg-outline-variant/50 group-hover:bg-tertiary' }}"></span>
                            {{ $category->name }}
                            <span class="ml-auto text-[10px] opacity-60">{{ $category->items->count() }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
                
                {{--
                <div class="mt-12 bg-surface-container-low p-6 rounded-xl border border-outline-variant/20">
                    <h3 class="font-display text-lg text-primary mb-3">Order Enquiry</h3>
                    <p class="text-xs text-on-surface-variant leading-relaxed mb-4">Interested in any of our publications? Fill out the form to get more details.</p>
                    
                    @if(session('success'))
                        <div class="bg-primary-container text-on-primary-container p-3 rounded-lg text-xs mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('get_publication') }}" method="POST" class="space-y-3">
                        {!! csrf_field() !!}
                        <select name="pub_name" class="w-full bg-surface-container-highest border-none rounded-lg text-xs p-3 focus:ring-2 focus:ring-primary/40 text-on-surface-variant outline-none" required>
                            <option value="">Select Publication *</option>
                            @foreach(\App\Models\Publication::orderBy('name')->get() as $p)
                                <option value="{{ $p->name }}" {{ old('pub_name') == $p->name ? 'selected' : '' }}>{{ $p->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="name" placeholder="Your Name" class="w-full bg-surface-container-highest border-none rounded-lg text-xs p-3 focus:ring-2 focus:ring-primary/40" required>
                        <input type="email" name="email" placeholder="Your Email" class="w-full bg-surface-container-highest border-none rounded-lg text-xs p-3 focus:ring-2 focus:ring-primary/40" required>
                        <input type="text" name="phone" placeholder="Phone Number" class="w-full bg-surface-container-highest border-none rounded-lg text-xs p-3 focus:ring-2 focus:ring-primary/40" required>
                        <textarea name="address" placeholder="Address" class="w-full bg-surface-container-highest border-none rounded-lg text-xs p-3 focus:ring-2 focus:ring-primary/40" rows="3" required></textarea>
                        <button type="submit" class="w-full bg-primary text-white text-[10px] uppercase tracking-widest font-bold py-3 rounded-lg hover:bg-primary-container transition-colors">Submit Enquiry</button>
                    </form>
                </div>
                --}}
            </div>
        </aside>

        <!-- Publications Grid -->
        <div class="flex-1">
            <div class="mb-12 flex flex-col md:flex-row justify-between items-start md:items-end border-b border-outline-variant/20 pb-6 gap-4">
                <div>
                    <h2 class="font-display text-3xl text-primary">{{ $selectedCategory ? $selectedCategory->name : 'Academic Catalog' }}</h2>
                    <p class="text-on-surface-variant mt-1">Discover our latest scholarly works and research journals.</p>
                </div>
            </div>

            <!-- Bento Grid Layout -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
                @forelse($publications as $pub)
                <div class="publication-card group bg-surface-container-lowest p-4 rounded-xl shadow-[0_4px_24px_rgba(0,0,0,0.03)] border border-outline-variant/10 hover:shadow-[0_8px_32px_rgba(0,0,0,0.06)] transition-all flex flex-col gap-4">
                    <div class="w-full aspect-[3/4] bg-surface-container-highest rounded flex-shrink-0 relative overflow-hidden group-hover:scale-[1.02] transition-transform">
                        <img alt="{{ $pub->name }}" class="w-full h-full object-cover shadow-lg" src="{{ $pub->photo }}"/>
                    </div>
                    <div class="flex flex-col justify-between py-1 flex-grow">
                        <div>
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-[10px] font-label font-bold text-on-secondary-container bg-secondary-fixed px-2 py-0.5 rounded uppercase tracking-tighter">{{ $pub->category->name ?? 'Publication' }}</span>
                                @if($pub->price)
                                    <span class="text-primary font-bold font-body text-sm">₹{{ $pub->price }}</span>
                                @endif
                            </div>
                            <h3 class="font-display text-lg text-primary leading-tight group-hover:text-primary-container transition-colors mb-2">{{ $pub->name }}</h3>
                            <div class="publication-summary text-on-surface-variant text-xs leading-relaxed">
                                {!! strip_tags($pub->content) !!}
                            </div>
                            @if($pub->author)
                                <p class="text-xs text-outline mt-2 font-medium">By {{ $pub->author }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-20 text-center bg-surface-container-low rounded-3xl border border-dashed border-outline-variant">
                    <span class="material-symbols-outlined text-5xl text-outline mb-4 opacity-50">book_off</span>
                    <p class="text-on-surface-variant">No publications found in our catalog yet.</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-16">
                {{ $publications->links() }}
            </div>
        </div>
    </div>
</section>
@endsection



