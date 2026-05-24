@extends('layouts.alpha')

@section('title', 'Bible Apostolate | The Alpha Institute')

@section('content')
<!-- Hero Section -->
<section class="relative h-[400px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="Bible Background" class="w-full h-full object-cover brightness-[0.35]" src="{{asset('front')}}/images/bible.jpg"/>
    </div>
    <div class="relative z-10 text-center px-6">
        <h1 class="font-display text-5xl md:text-7xl text-white tracking-tight mb-4">Bible Apostolate</h1>
        <div class="h-1 w-24 bg-tertiary-fixed mx-auto mb-6"></div>
        <p class="text-surface-variant font-body text-lg md:text-xl max-w-3xl mx-auto opacity-90 italic">
            Proclaiming the Word of God in its pristine purity to all faithful and every human person.
        </p>
    </div>
</section>

<section class="max-w-7xl mx-auto px-6 py-24">
    <div class="flex flex-col lg:flex-row gap-16 items-center">
        <div class="w-full lg:w-1/3">
            <div class="relative group">
                <div class="absolute -inset-4 bg-primary/5 rounded-3xl group-hover:bg-primary/10 transition-colors"></div>
                <img src="{{asset('front')}}/images/bible.jpg" class="relative rounded-2xl shadow-2xl w-full object-cover aspect-[3/4]" alt="Holy Bible">
            </div>
        </div>
        <div class="w-full lg:w-2/3 space-y-8">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary/5 rounded-full text-primary font-bold text-xs uppercase tracking-widest">
                <span class="material-symbols-outlined text-sm">auto_stories</span>
                Mission of the Word
            </div>
            <h2 class="font-display text-4xl text-primary font-bold leading-tight">Proclaiming the Gospel to All Nations</h2>
            <div class="prose prose-lg max-w-none text-on-surface-variant">
                <p class="text-justify leading-relaxed">
                    In response to Jesus' instruction, "... and the gospel must first be preached to all the nations" (Mk 13:10), the Archdiocese of Thalassery tries to make the Word of God known, loved, pondered upon, and preserved in the hearts of all faithful and every human person.
                </p>
                <p class="text-justify leading-relaxed">
                    The Department of Bible Apostolate is focused on proclaiming the WORD OF GOD in its pristine purity. In this endeavor, we make use of all possible ways like teaching, preaching, reading, sharing, and various forms of art. E-Platforms like YouTube, Twitter, Facebook, WhatsApp, and Instagram are our means to reach out to the faithful.
                </p>
                <p class="text-justify leading-relaxed">
                    The Department of Bible Apostolate is an effective instrument of the Archdiocese to fulfill the mission entrusted by the Lord. Numerous volumes and editions of Bible Chithra-kadha, Alpha Center for Theology, Ajapalakan- Homiletic Reflections of the Sunday Syro-Malabar Readings, Theological Publications, Logos Quiz Program, Bible Sandhya in parish level, and Biblical and Foreign Language courses are some of the landmarks of this department.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-8">
                <div class="flex items-start gap-4 p-6 bg-surface-container-lowest rounded-2xl border border-outline-variant/10">
                    <span class="material-symbols-outlined text-primary text-3xl">record_voice_over</span>
                    <div>
                        <h4 class="font-bold text-primary mb-1">Preaching & Teaching</h4>
                        <p class="text-xs text-on-surface-variant">Disseminating scriptural wisdom through traditional and modern channels.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-6 bg-surface-container-lowest rounded-2xl border border-outline-variant/10">
                    <span class="material-symbols-outlined text-primary text-3xl">devices</span>
                    <div>
                        <h4 class="font-bold text-primary mb-1">Digital Presence</h4>
                        <p class="text-xs text-on-surface-variant">Reaching global audiences via social platforms and e-learning.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

