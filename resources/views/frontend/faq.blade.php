@extends('layouts.alpha')

@section('title', 'FAQ | The Alpha Institute')

@section('content')
<!-- Hero Section -->
<section class="relative h-[300px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="FAQ Background" class="w-full h-full object-cover brightness-[0.4]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCgpAdv8Hd7KSDe5L-wgA0PUdeIplPcxCCMIKMF4c72LJYJx9E0pqx1V5YznRt7Cu-3uGQ4TSLz4m6c6ZOJA5eYxasJgm9T_-KLJHaevh3MHoZienoHyRA7Gvw5Ud_FcTiiSHuydaqa9aSTXQPMk7BeycdtH4RRI4nld_3Cz9IrbKMFE9znS1HNiMXk7Bz3LGFAnPEBDH_MOGzbum1u_ScyN44akTX2Eg-QPfaJWu5zCrByo5wdASMNDOc4tgdjeklaGotIRrLu6Q"/>
    </div>
    <div class="relative z-10 text-center px-6">
        <h1 class="font-display text-5xl md:text-6xl text-white tracking-tight mb-4">Common Inquiries</h1>
        <div class="h-1 w-20 bg-tertiary-fixed mx-auto mb-6"></div>
        <p class="text-surface-variant font-body text-lg max-w-2xl mx-auto opacity-90 italic">
            Find answers to frequently asked questions about our academic programs, registration, and more.
        </p>
    </div>
</section>

<section class="max-w-4xl mx-auto px-6 py-24">
    <div class="space-y-4">
        @php
            $faqs = \App\Models\Faq::latest()->get();
        @endphp

        @forelse($faqs as $f)
        <div class="border border-outline-variant/20 rounded-2xl overflow-hidden bg-surface-container-lowest shadow-sm">
            <button class="w-full flex items-center justify-between p-6 text-left group hover:bg-surface-container-low transition-colors" onclick="toggleFaq({{ $f->id }})">
                <span class="font-display text-lg text-primary font-bold group-hover:text-primary-container transition-colors">{{ $f->question }}</span>
                <span id="icon-{{ $f->id }}" class="material-symbols-outlined text-primary transition-transform duration-300">add</span>
            </button>
            <div id="answer-{{ $f->id }}" class="hidden px-6 pb-6 text-on-surface-variant leading-relaxed font-body">
                {!! $f->answer !!}
            </div>
        </div>
        @empty
        <div class="py-24 text-center bg-surface-container-low rounded-3xl border border-dashed border-outline-variant">
            <span class="material-symbols-outlined text-5xl text-outline mb-4 opacity-50">help_outline</span>
            <p class="text-on-surface-variant">No FAQs available yet.</p>
        </div>
        @endforelse
    </div>
</section>

<script>
    function toggleFaq(id) {
        const answer = document.getElementById(`answer-${id}`);
        const icon = document.getElementById(`icon-${id}`);
        
        if (answer.classList.contains('hidden')) {
            answer.classList.remove('hidden');
            icon.style.transform = 'rotate(45deg)';
        } else {
            answer.classList.add('hidden');
            icon.style.transform = 'rotate(0deg)';
        }
    }
</script>
@endsection

