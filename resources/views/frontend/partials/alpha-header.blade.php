<nav class="bg-surface/80 dark:bg-surface-container-highest/80 backdrop-blur-xl sticky top-0 w-full z-50 shadow-[0_32px_32px_rgba(27,28,28,0.06)] border-b border-outline-variant/20 flex justify-between items-center px-6 py-4">
    <div class="flex items-center gap-4">
        <a href="{{ url('/') }}">
            <img alt="The Alpha Institute Logo" class="h-10 w-10 object-contain rounded-sm" src="{{ asset('front/images/logo.png') }}"/>
        </a>
    </div>
    
    <!-- Desktop Navigation Links -->
    <div class="hidden xl:flex items-center space-x-3 font-['Noto_Serif'] font-bold tracking-tight text-[13px]">
        <a class="text-on-surface-variant dark:text-surface-variant hover:text-primary-container transition-all duration-300 {{ request()->is('about') ? 'text-primary' : '' }}" href="{{ url('about') }}">About</a>
        
        <div class="nav-dropdown relative group cursor-pointer">
            <span class="text-on-surface-variant dark:text-surface-variant font-bold pb-1 flex items-center gap-1 {{ request()->is('course*') || request()->is('courses') ? 'text-primary border-b-2 border-tertiary-fixed' : '' }}">Courses <span class="material-symbols-outlined text-[16px]">expand_more</span></span>
            <div class="dropdown-content hidden absolute top-full left-0 mt-1 bg-surface border border-outline-variant/20 shadow-xl rounded-lg py-3 w-52 glass-effect z-50">
                <a class="block px-6 py-2 hover:bg-primary/5 text-primary" href="{{ url('courses') }}">All Programs</a>
                @if (($courses = \App\Models\Course::orderBy('created_at')->get()) && !$courses->isEmpty())
                    @foreach($courses->take(5) as $course)
                        <a class="block px-6 py-2 hover:bg-primary/5 text-on-surface-variant text-xs" href="{{ url('course/'.$course->slug) }}">{{$course->name}}</a>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="nav-dropdown relative group cursor-pointer">
            <span class="text-on-surface-variant dark:text-surface-variant font-medium hover:text-primary-container flex items-center gap-1 {{ request()->is('study-centres') ? 'text-primary' : '' }}">Study Centers <span class="material-symbols-outlined text-[16px]">expand_more</span></span>
            <div class="dropdown-content hidden absolute top-full left-0 mt-1 bg-surface border border-outline-variant/20 shadow-xl rounded-lg py-3 w-52 glass-effect z-50">
                <a class="block px-6 py-2 hover:bg-primary/5 text-on-surface-variant" href="{{ url('study-centres') }}">View Centers</a>
            </div>
        </div>

        <a class="text-on-surface-variant dark:text-surface-variant font-medium hover:text-primary-container transition-all {{ request()->is('faq') ? 'text-primary' : '' }}" href="{{ url('faq') }}">FAQ</a>
        <a class="text-on-surface-variant dark:text-surface-variant font-medium hover:text-primary-container transition-all {{ request()->is('downloads') ? 'text-primary' : '' }}" href="{{ url('downloads') }}">Downloads</a>
        <a class="text-on-surface-variant dark:text-surface-variant font-medium hover:text-primary-container transition-all {{ request()->is('publications') ? 'text-primary' : '' }}" href="{{ url('publications') }}">Publications</a>
        <a class="text-on-surface-variant dark:text-surface-variant font-medium hover:text-primary-container transition-all {{ request()->is('library') ? 'text-primary' : '' }}" href="{{ url('library') }}">Library</a>
        <a class="text-on-surface-variant dark:text-surface-variant font-medium hover:text-primary-container transition-all {{ request()->is('contact') ? 'text-primary' : '' }}" href="{{ url('contact') }}">Contact Us</a>
    </div>

    <!-- Right-side Buttons -->
    <div class="flex items-center space-x-3">
        <!-- Student Login (Desktop) -->
        <div class="nav-dropdown relative group cursor-pointer hidden lg:block">
            <button class="text-primary font-bold text-sm hover:opacity-80 transition-all py-2 flex items-center gap-1">
                Student Login <span class="material-symbols-outlined text-[16px]">expand_more</span>
            </button>
            <div class="dropdown-content hidden absolute top-full right-0 mt-1 bg-surface border border-outline-variant/20 shadow-xl rounded-lg py-3 w-48 glass-effect z-50">
                <a class="block px-6 py-2 hover:bg-primary/5 text-on-surface-variant text-sm" href="http://www.icampuz.in/aits/" target="_blank">AHIRS Portal</a>
                <a class="block px-6 py-2 hover:bg-primary/5 text-on-surface-variant text-sm" href="http://www.icampuz.in/aits/" target="_blank">TACRS Portal</a>
            </div>
        </div>

        <!-- Registration Button (Desktop & Mobile) -->
        <div class="nav-dropdown relative group cursor-pointer">
            <button type="button" data-registration-open class="bg-primary text-on-primary px-5 py-2.5 rounded-md font-bold text-sm shadow-sm hover:shadow-md active:scale-95 transition-all flex items-center gap-1">
                Registration <span class="material-symbols-outlined text-[16px]">expand_more</span>
            </button>
            <div class="dropdown-content hidden absolute top-full right-0 mt-1 bg-surface border border-outline-variant/20 shadow-xl rounded-lg py-3 w-52 glass-effect z-50">
                <a class="block px-6 py-2 hover:bg-primary/5 text-on-surface-variant text-sm" href="javascript:;" data-target="#registerModal" data-toggle="modal">Online Registration</a>
            </div>
        </div>

        <!-- Mobile Hamburger Menu Button -->
        <button id="mobile-menu-open" class="xl:hidden text-on-surface hover:text-primary p-2 rounded-full hover:bg-surface-container-high transition-colors focus:outline-none">
            <span class="material-symbols-outlined text-[28px]">menu</span>
        </button>
    </div>
</nav>

<!-- Mobile Menu Drawer Backdrop -->
<div id="mobile-menu-backdrop" class="fixed inset-0 bg-black/50 z-50 opacity-0 pointer-events-none transition-opacity duration-300 xl:hidden"></div>

<!-- Mobile Menu Drawer Sidebar -->
<div id="mobile-menu-drawer" class="fixed top-0 right-0 h-full w-[300px] bg-surface dark:bg-surface-container-highest z-50 translate-x-full transition-transform duration-300 xl:hidden shadow-2xl flex flex-col">
    <!-- Drawer Header -->
    <div class="flex items-center justify-between px-6 py-5 border-b border-outline-variant/20">
        <span class="font-display font-bold text-primary tracking-tight">Navigation</span>
        <button id="mobile-menu-close" class="text-on-surface hover:text-primary transition-colors flex items-center justify-center p-1 rounded-full hover:bg-surface-container-high">
            <span class="material-symbols-outlined">close</span>
        </button>
    </div>
    
    <!-- Drawer Body (Scrollable) -->
    <div class="flex-1 overflow-y-auto px-6 py-6 space-y-6">
        <!-- Main Nav Links -->
        <div class="flex flex-col space-y-4 font-['Noto_Serif'] font-bold text-[15px] tracking-tight">
            <a class="text-on-surface-variant hover:text-primary transition-all py-1 {{ request()->is('about') ? 'text-primary border-l-2 border-primary pl-2' : '' }}" href="{{ url('about') }}">About</a>
            
            <!-- Courses Dropdown Accordion -->
            <div class="space-y-2">
                <button type="button" class="mobile-collapse-btn flex items-center justify-between w-full text-on-surface-variant hover:text-primary transition-all py-1">
                    <span>Courses</span>
                    <span class="material-symbols-outlined text-[18px] transition-transform duration-200">expand_more</span>
                </button>
                <div class="mobile-collapse-content hidden pl-4 border-l border-outline-variant/20 space-y-2 py-1 text-sm font-medium">
                    <a class="block py-1 hover:text-primary text-primary" href="{{ url('courses') }}">All Programs</a>
                    @if (($courses = \App\Models\Course::orderBy('created_at')->get()) && !$courses->isEmpty())
                        @foreach($courses as $course)
                            <a class="block py-1 text-on-surface-variant hover:text-primary text-[13px]" href="{{ url('course/'.$course->slug) }}">{{$course->name}}</a>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Study Centers Accordion -->
            <div class="space-y-2">
                <button type="button" class="mobile-collapse-btn flex items-center justify-between w-full text-on-surface-variant hover:text-primary transition-all py-1">
                    <span>Study Centers</span>
                    <span class="material-symbols-outlined text-[18px] transition-transform duration-200">expand_more</span>
                </button>
                <div class="mobile-collapse-content hidden pl-4 border-l border-outline-variant/20 space-y-2 py-1 text-sm font-medium">
                    <a class="block py-1 text-on-surface-variant hover:text-primary" href="{{ url('study-centres') }}">View Centers</a>
                </div>
            </div>

            <a class="text-on-surface-variant hover:text-primary transition-all py-1 {{ request()->is('faq') ? 'text-primary border-l-2 border-primary pl-2' : '' }}" href="{{ url('faq') }}">FAQ</a>
            <a class="text-on-surface-variant hover:text-primary transition-all py-1 {{ request()->is('downloads') ? 'text-primary border-l-2 border-primary pl-2' : '' }}" href="{{ url('downloads') }}">Downloads</a>
            <a class="text-on-surface-variant hover:text-primary transition-all py-1 {{ request()->is('publications') ? 'text-primary border-l-2 border-primary pl-2' : '' }}" href="{{ url('publications') }}">Publications</a>
            <a class="text-on-surface-variant hover:text-primary transition-all py-1 {{ request()->is('library') ? 'text-primary border-l-2 border-primary pl-2' : '' }}" href="{{ url('library') }}">Library</a>
            <a class="text-on-surface-variant hover:text-primary transition-all py-1 {{ request()->is('contact') ? 'text-primary border-l-2 border-primary pl-2' : '' }}" href="{{ url('contact') }}">Contact Us</a>
        </div>

        <!-- Auxiliary Student Actions -->
        <div class="border-t border-outline-variant/20 pt-6 space-y-4">
            <!-- Student Portal Accordion -->
            <div class="space-y-2">
                <button type="button" class="mobile-collapse-btn flex items-center justify-between w-full text-primary font-bold text-sm">
                    <span>Student Portal</span>
                    <span class="material-symbols-outlined text-[18px] transition-transform duration-200">expand_more</span>
                </button>
                <div class="mobile-collapse-content hidden pl-4 border-l border-outline-variant/20 space-y-2 py-1 text-sm">
                    <a class="block py-1 text-on-surface-variant hover:text-primary" href="http://www.icampuz.in/aits/" target="_blank">AHIRS Portal</a>
                    <a class="block py-1 text-on-surface-variant hover:text-primary" href="http://www.icampuz.in/aits/" target="_blank">TACRS Portal</a>
                </div>
            </div>

            <!-- Online Registration button -->
            <button type="button" data-registration-open class="w-full bg-primary text-on-primary py-3 rounded-md font-bold text-sm shadow-sm hover:shadow-md active:scale-[0.98] transition-all flex items-center justify-center gap-1">
                Online Registration <span class="material-symbols-outlined text-[16px]">how_to_reg</span>
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuOpenBtn = document.getElementById('mobile-menu-open');
        const mobileMenuCloseBtn = document.getElementById('mobile-menu-close');
        const mobileMenuBackdrop = document.getElementById('mobile-menu-backdrop');
        const mobileMenuDrawer = document.getElementById('mobile-menu-drawer');

        function openMobileMenu() {
            mobileMenuBackdrop.classList.remove('pointer-events-none', 'opacity-0');
            mobileMenuBackdrop.classList.add('opacity-100');
            mobileMenuDrawer.classList.remove('translate-x-full');
            mobileMenuDrawer.classList.add('translate-x-0');
            document.body.classList.add('overflow-hidden');
        }

        function closeMobileMenu() {
            mobileMenuBackdrop.classList.remove('opacity-100');
            mobileMenuBackdrop.classList.add('pointer-events-none', 'opacity-0');
            mobileMenuDrawer.classList.remove('translate-x-0');
            mobileMenuDrawer.classList.add('translate-x-full');
            document.body.classList.remove('overflow-hidden');
        }

        if (mobileMenuOpenBtn) {
            mobileMenuOpenBtn.addEventListener('click', openMobileMenu);
        }
        if (mobileMenuCloseBtn) {
            mobileMenuCloseBtn.addEventListener('click', closeMobileMenu);
        }
        if (mobileMenuBackdrop) {
            mobileMenuBackdrop.addEventListener('click', closeMobileMenu);
        }

        // Toggle mobile accordion menus
        const collapseBtns = document.querySelectorAll('.mobile-collapse-btn');
        collapseBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const arrow = this.querySelector('.material-symbols-outlined');
                if (content.classList.contains('hidden')) {
                    content.classList.remove('hidden');
                    if (arrow) arrow.style.transform = 'rotate(180deg)';
                } else {
                    content.classList.add('hidden');
                    if (arrow) arrow.style.transform = '';
                }
            });
        });
    });
</script>
