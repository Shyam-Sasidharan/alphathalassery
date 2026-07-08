@extends('layouts.alpha')

@section('title', 'FAQ | The Alpha Institute')

@section('content')
@include('frontend.partials.page-banner', [
    'pageKey' => 'faq',
    'defaultTitle' => 'Common Inquiries',
    'defaultDescription' => 'Find answers to frequently asked questions about our academic programs, registration, and more.',
    'height' => 'h-[300px]',
])

<section class="max-w-4xl mx-auto px-6 py-24">
    <div class="space-y-4">
        @php
            $faqs = \App\Models\Faq::orderBy('created_at', 'asc')->orderBy('id', 'asc')->get();
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

