@extends('layouts.alpha')

@section('title', 'Contact Us | The Alpha Institute')

@section('content')
<!-- Scholarly Hero Section with Glassmorphism -->
<section class="relative h-[450px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="Contact Background" class="w-full h-full object-cover brightness-[0.35]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCgpAdv8Hd7KSDe5L-wgA0PUdeIplPcxCCMIKMF4c72LJYJx9E0pqx1V5YznRt7Cu-3uGQ4TSLz4m6c6ZOJA5eYxasJgm9T_-KLJHaevh3MHoZienoHyRA7Gvw5Ud_FcTiiSHuydaqa9aSTXQPMk7BeycdtH4RRI4nld_3Cz9IrbKMFE9znS1HNiMXk7Bz3LGFAnPEBDH_MOGzbum1u_ScyN44akTX2Eg-QPfaJWu5zCrByo5wdASMNDOc4tgdjeklaGotIRrLu6Q"/>
    </div>
    <div class="relative z-10 text-center px-6">
        <div class="inline-block px-4 py-1.5 mb-6 rounded-full bg-tertiary-fixed/20 border border-tertiary-fixed/30 backdrop-blur-md">
            <span class="text-tertiary-fixed font-label text-[10px] uppercase tracking-[0.3em] font-bold">Get In Touch</span>
        </div>
        <h1 class="font-display text-5xl md:text-7xl text-white tracking-tight mb-4">Connect With Us</h1>
        <div class="h-1.5 w-24 bg-tertiary-fixed mx-auto mb-8 rounded-full"></div>
        <p class="text-surface-variant font-body text-lg md:text-xl max-w-2xl mx-auto opacity-90 italic leading-relaxed">
            Whether you are a prospective scholar or a curious seeker, our doors are open for dialogue and guidance.
        </p>
    </div>
</section>

<section class="relative z-20 -mt-20 max-w-7xl mx-auto px-6 mb-24">
    <div class="grid lg:grid-cols-12 gap-8 items-stretch">
        <!-- Contact Information Cards (Bento Style) -->
        <div class="lg:col-span-5 grid grid-cols-1 gap-6">
            <div class="bg-surface-container-lowest p-8 rounded-3xl border border-outline-variant/10 shadow-[0_8px_32px_rgba(0,0,0,0.04)] flex gap-6 hover:shadow-xl transition-all group">
                <div class="w-14 h-14 rounded-2xl bg-primary/5 flex items-center justify-center flex-none group-hover:bg-primary group-hover:text-white transition-colors duration-500">
                    <span class="material-symbols-outlined text-3xl">location_on</span>
                </div>
                <div>
                    <h3 class="font-display text-xl font-bold text-primary mb-3">Our Institute</h3>
                    <p class="text-on-surface-variant leading-relaxed font-body">
                        Alpha Institute,<br>
                        Sandesa Bhavan, Thalassery-1,<br>
                        PB.No.71, Kerala, India, 670101
                    </p>
                </div>
            </div>

            <div class="bg-surface-container-lowest p-8 rounded-3xl border border-outline-variant/10 shadow-[0_8px_32px_rgba(0,0,0,0.04)] flex gap-6 hover:shadow-xl transition-all group">
                <div class="w-14 h-14 rounded-2xl bg-secondary/5 flex items-center justify-center flex-none group-hover:bg-secondary group-hover:text-white transition-colors duration-500">
                    <span class="material-symbols-outlined text-3xl">phone_iphone</span>
                </div>
                <div>
                    <h3 class="font-display text-xl font-bold text-secondary mb-3">Direct Lines</h3>
                    <div class="space-y-1 font-body text-on-surface-variant">
                        <p class="flex items-center gap-2"><span class="font-bold text-xs opacity-50">Mobile:</span> +91 80863 12826</p>
                        <p class="flex items-center gap-2"><span class="font-bold text-xs opacity-50">Office:</span> 0490 2343707</p>
                        <p class="flex items-center gap-2"><span class="font-bold text-xs opacity-50">Office:</span> 0490 2344727</p>
                    </div>
                </div>
            </div>

            <div class="bg-surface-container-lowest p-8 rounded-3xl border border-outline-variant/10 shadow-[0_8px_32px_rgba(0,0,0,0.04)] flex gap-6 hover:shadow-xl transition-all group">
                <div class="w-14 h-14 rounded-2xl bg-tertiary/5 flex items-center justify-center flex-none group-hover:bg-tertiary group-hover:text-white transition-colors duration-500">
                    <span class="material-symbols-outlined text-3xl">mail</span>
                </div>
                <div>
                    <h3 class="font-display text-xl font-bold text-tertiary mb-3">Digital Inquiry</h3>
                    <p class="text-on-surface-variant font-body mb-4">info@alphathalassery.org</p>
                    <div class="flex gap-3">
                        <a href="https://www.facebook.com/alphatly" class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/AlphaInstitute2" class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UCFJs8RNJPe7dVAAIsTYGMsA" class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form Container -->
        <div class="lg:col-span-7 bg-white p-8 lg:p-12 rounded-[2rem] shadow-[0_24px_80px_rgba(0,52,101,0.08)] border border-outline-variant/10">
            <div class="mb-10">
                <h2 class="font-display text-3xl font-bold text-primary mb-3">Academic Inquiry Form</h2>
                <p class="text-on-surface-variant font-body">Submit your queries regarding admissions, research opportunities, or academic collaborations.</p>
            </div>

            @if(session('success'))
                <div class="bg-primary-container/30 text-on-primary-container p-5 rounded-2xl mb-10 flex items-center gap-4 border border-primary/20 animate-in fade-in slide-in-from-top-4 duration-500">
                    <span class="material-symbols-outlined text-primary text-3xl">check_circle</span>
                    <p class="font-bold">{{ session('success') }}</p>
                </div>
            @endif

            <form action="{{ route('contact') }}" method="POST" class="space-y-8">
                {!! csrf_field() !!}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="relative group">
                        <label class="block font-label text-[10px] uppercase tracking-widest font-bold text-outline mb-2 group-focus-within:text-primary transition-colors">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full bg-surface-container-low border-b-2 border-outline-variant/30 px-0 py-3 focus:border-primary outline-none transition-all font-body text-lg"
                            placeholder="e.g. John Doe" required>
                        @if($errors->has('name'))<span class="text-error text-[10px] font-bold mt-1 block uppercase tracking-tighter">{{ $errors->first('name') }}</span>@endif
                    </div>
                    <div class="relative group">
                        <label class="block font-label text-[10px] uppercase tracking-widest font-bold text-outline mb-2 group-focus-within:text-primary transition-colors">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full bg-surface-container-low border-b-2 border-outline-variant/30 px-0 py-3 focus:border-primary outline-none transition-all font-body text-lg"
                            placeholder="john@example.com" required>
                        @if($errors->has('email'))<span class="text-error text-[10px] font-bold mt-1 block uppercase tracking-tighter">{{ $errors->first('email') }}</span>@endif
                    </div>
                </div>

                <div class="relative group">
                    <label class="block font-label text-[10px] uppercase tracking-widest font-bold text-outline mb-2 group-focus-within:text-primary transition-colors">Phone Number</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        class="w-full bg-surface-container-low border-b-2 border-outline-variant/30 px-0 py-3 focus:border-primary outline-none transition-all font-body text-lg"
                        placeholder="+91 0000 000 000">
                    @if($errors->has('phone'))<span class="text-error text-[10px] font-bold mt-1 block uppercase tracking-tighter">{{ $errors->first('phone') }}</span>@endif
                </div>

                <div class="relative group">
                    <label class="block font-label text-[10px] uppercase tracking-widest font-bold text-outline mb-2 group-focus-within:text-primary transition-colors">Message Content</label>
                    <textarea name="message" rows="4"
                        class="w-full bg-surface-container-low border-b-2 border-outline-variant/30 px-0 py-3 focus:border-primary outline-none transition-all font-body text-lg resize-none"
                        placeholder="State your inquiry with clarity..." required>{{ old('message') }}</textarea>
                    @if($errors->has('message'))<span class="text-error text-[10px] font-bold mt-1 block uppercase tracking-tighter">{{ $errors->first('message') }}</span>@endif
                </div>

                <div class="flex flex-col md:flex-row items-center justify-between gap-8 pt-4">
                    <div class="flex items-center gap-6 bg-surface-container-high/50 px-6 py-3 rounded-2xl border border-outline-variant/20 backdrop-blur-sm w-full md:w-auto">
                        <div class="bg-white rounded-lg p-1 border border-outline-variant/30 shadow-inner">
                            {!! captcha_img() !!}
                        </div>
                        <input type="text" name="captcha" placeholder="Code"
                            class="bg-transparent border-b-2 border-outline-variant/30 px-0 py-2 focus:border-primary outline-none transition-all w-20 font-bold text-center" required>
                    </div>

                    <button type="submit" class="w-full md:w-auto bg-primary text-on-primary px-12 py-5 rounded-2xl font-bold shadow-[0_12px_40px_rgba(0,52,101,0.2)] hover:shadow-[0_16px_50px_rgba(0,52,101,0.3)] hover:-translate-y-1 active:scale-95 transition-all flex items-center justify-center gap-4">
                        Send Inquiry
                        <span class="material-symbols-outlined">send</span>
                    </button>
                </div>
                @if($errors->has('captcha'))
                    <div class="bg-error/10 text-error p-3 rounded-xl flex items-center gap-2 mt-4">
                        <span class="material-symbols-outlined text-sm">warning</span>
                        <span class="text-[10px] font-bold uppercase tracking-widest">Verification code failed. Please try again.</span>
                    </div>
                @endif
            </form>
        </div>
    </div>
</section>

<!-- Full Width Map Section with Custom Styling -->
<section class="w-full h-[500px] relative">
    <div class="absolute inset-0 bg-primary/5 pointer-events-none z-10"></div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3906.0794828669355!2d75.47554081412422!3d11.759451343495995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba426f449941e09%3A0xaf36ae7cac28ea33!2sAlpha%20Institute%20of%20Theology%20%26%20Science!5e0!3m2!1sen!2sin!4v1581570006994!5m2!1sen!2sin"
        width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20">
        <a href="https://maps.app.goo.gl/YyR6BqW9b9R6BqW9" target="_blank"
            class="bg-white/90 backdrop-blur-md px-8 py-4 rounded-full shadow-2xl border border-primary/10 flex items-center gap-3 hover:bg-primary hover:text-white transition-all group">
            <span class="material-symbols-outlined text-primary group-hover:text-white transition-colors">directions</span>
            <span class="font-label text-sm font-bold uppercase tracking-widest">Get Directions to Thalassery</span>
        </a>
    </div>
</section>

@endsection
