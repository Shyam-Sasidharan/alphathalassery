<footer class="bg-primary text-on-primary w-full mt-24 pt-16 pb-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 px-8 lg:px-12 max-w-7xl mx-auto">
        <div class="space-y-6">
            <div class="flex items-center gap-3">
                <img src="{{ asset('front/images/logo.png') }}" alt="Alpha Institute" class="h-12 w-12 object-contain">
                <div class="font-headline text-xl font-bold tracking-tight italic text-white">The Alpha Institute</div>
            </div>
            <p class="font-body text-sm tracking-wide text-on-primary/70 leading-relaxed">
                A center dedicated to theological learning, sacred tradition, and the dialogue between faith and reason.
            </p>
            <div class="flex gap-4">
                <span class="material-symbols-outlined text-tertiary-fixed opacity-80">church</span>
                <span class="material-symbols-outlined text-tertiary-fixed opacity-80">school</span>
                <span class="material-symbols-outlined text-tertiary-fixed opacity-80">menu_book</span>
            </div>
        </div>

        <div class="space-y-4">
            <h5 class="text-tertiary-fixed font-semibold text-sm uppercase tracking-widest">Quick Links</h5>
            <ul class="space-y-2 font-body text-sm tracking-wide">
                <li><a class="text-on-primary/70 hover:text-white transition-colors" href="{{ url('about') }}">About</a></li>
                <li><a class="text-on-primary/70 hover:text-white transition-colors" href="{{ url('courses') }}">Courses</a></li>
                <li><a class="text-on-primary/70 hover:text-white transition-colors" href="{{ url('study-centres') }}">Study Centers</a></li>
                <li><a class="text-on-primary/70 hover:text-white transition-colors" href="{{ url('contact') }}">Contact Us</a></li>
            </ul>
        </div>

        <div class="space-y-4">
            <h5 class="text-tertiary-fixed font-semibold text-sm uppercase tracking-widest">Resources</h5>
            <ul class="space-y-2 font-body text-sm tracking-wide">
                <li><a class="text-on-primary/70 hover:text-white transition-colors" href="{{ url('downloads') }}">Downloads</a></li>
                <li><a class="text-on-primary/70 hover:text-white transition-colors" href="{{ url('publications') }}">Publications</a></li>
                <li><a class="text-on-primary/70 hover:text-white transition-colors" href="{{ url('library') }}">Library</a></li>
                <li><a class="text-on-primary/70 hover:text-white transition-colors" href="{{ url('faq') }}">FAQ</a></li>
            </ul>
        </div>

        <div class="space-y-4">
            <h5 class="text-tertiary-fixed font-semibold text-sm uppercase tracking-widest">Contact</h5>
            <div class="text-on-primary/70 text-sm flex items-start gap-3">
                <span class="material-symbols-outlined text-sm mt-1">location_on</span>
                <span>Alpha Center for Theology and Science<br>Sandesa Bhavan, Thalassery-1<br>Kerala, India</span>
            </div>
            <div class="text-on-primary/70 text-sm flex items-center gap-3">
                <span class="material-symbols-outlined text-sm">call</span>
                <a class="hover:text-white transition-colors" href="tel:+914902343707">0091 490 2343707</a>
            </div>
            <div class="text-on-primary/70 text-sm flex items-center gap-3">
                <span class="material-symbols-outlined text-sm">mail</span>
                <a class="hover:text-white transition-colors" href="mailto:alphits@gmail.com">alphits@gmail.com</a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-8 lg:px-12 mt-16 pt-8 border-t border-white/10 text-center">
        <p class="font-body text-xs tracking-widest text-on-primary/50 uppercase">
            &copy; {{ date('Y') }} The Alpha Institute. All Rights Reserved.
        </p>
    </div>
</footer>
