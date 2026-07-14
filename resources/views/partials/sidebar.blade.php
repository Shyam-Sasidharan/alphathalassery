<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <div class="cms-app-launcher">
            <a href="{{ route('dashboard') }}" class="cms-app-tile cms-tile-blue {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="fa fa-th-large"></i>
                <span>Overview</span>
            </a>
            <a href="{{ route('course') }}" class="cms-app-tile cms-tile-mint {{ request()->is('admin/courses') || request()->is('admin/course/*') ? 'active' : '' }}">
                <i class="fa fa-paper-plane-o"></i>
                <span>Courses</span>
            </a>
            <a href="{{ route('semester') }}" class="cms-app-tile cms-tile-lavender {{ request()->is('admin/semesters') || request()->is('admin/semester/*') ? 'active' : '' }}">
                <i class="fa fa-sliders"></i>
                <span>Semesters</span>
            </a>
            <a href="{{ route('gallery') }}" class="cms-app-tile cms-tile-pink {{ request()->is('admin/gallery') ? 'active' : '' }}">
                <i class="fa fa-image"></i>
                <span>Gallery</span>
            </a>
            <a href="{{ route('gallery_folder') }}" class="cms-app-tile cms-tile-pink {{ request()->is('admin/gallery_folders') || request()->is('admin/gallery_folder/*') ? 'active' : '' }}">
                <i class="fa fa-folder-open-o"></i>
                <span>Gallery Folders</span>
            </a>
            <a href="{{ route('page_banner') }}" class="cms-app-tile cms-tile-blue {{ request()->is('admin/page_banners') || request()->is('admin/page_banner/*') ? 'active' : '' }}">
                <i class="fa fa-picture-o"></i>
                <span>Page Banners</span>
            </a>
            <a href="{{ route('recognized_certificate') }}" class="cms-app-tile cms-tile-green {{ request()->is('admin/recognized_certificates') || request()->is('admin/recognized_certificate/*') ? 'active' : '' }}">
                <i class="fa fa-certificate"></i>
                <span>Recognized Certificates</span>
            </a>
            <a href="{{ route('category') }}" class="cms-app-tile cms-tile-green {{ request()->is('admin/categories') || request()->is('admin/category/*') ? 'active' : '' }}">
                <i class="fa fa-sitemap"></i>
                <span>Publication Category</span>
            </a>
            <a href="{{ route('publications') }}" class="cms-app-tile cms-tile-amber {{ request()->is('admin/publications') || request()->is('admin/publications/*') ? 'active' : '' }}">
                <i class="fa fa-book"></i>
                <span>Publications</span>
            </a>
            <a href="{{ route('library') }}" class="cms-app-tile cms-tile-violet {{ request()->is('admin/libraries') || request()->is('admin/library/*') ? 'active' : '' }}">
                <i class="fa fa-university"></i>
                <span>Library Category</span>
            </a>
            <a href="{{ route('book') }}" class="cms-app-tile cms-tile-sky {{ request()->is('admin/books') || request()->is('admin/book/*') ? 'active' : '' }}">
                <i class="fa fa-leanpub"></i>
                <span>Books</span>
            </a>
            <a href="{{ route('news') }}" class="cms-app-tile cms-tile-rose {{ request()->is('admin/news') ? 'active' : '' }}">
                <i class="fa fa-newspaper-o"></i>
                <span>News</span>
            </a>
            <a href="{{ route('download_category') }}" class="cms-app-tile cms-tile-soft {{ request()->is('admin/download_categories') || request()->is('admin/download_category/*') ? 'active' : '' }}">
                <i class="fa fa-folder-o"></i>
                <span>Download Cat.</span>
            </a>
            <a href="{{ route('downloads') }}" class="cms-app-tile cms-tile-cyan {{ request()->is('admin/downloads') || request()->is('admin/downloads/*') ? 'active' : '' }}">
                <i class="fa fa-download"></i>
                <span>Downloads</span>
            </a>
            <a href="{{ route('study_centre') }}" class="cms-app-tile cms-tile-lime {{ request()->is('admin/study_centres') ? 'active' : '' }}">
                <i class="fa fa-building"></i>
                <span>Centres</span>
            </a>
            <a href="{{ route('faq') }}" class="cms-app-tile cms-tile-fade {{ request()->is('admin/faq') ? 'active' : '' }}">
                <i class="fa fa-question"></i>
                <span>FAQ</span>
            </a>
            <a href="{{ route('professor') }}" class="cms-app-tile cms-tile-aqua {{ request()->is('admin/professors') ? 'active' : '' }}">
                <i class="fa fa-users"></i>
                <span>Professors</span>
            </a>
            <a href="{{ route('hand-book') }}" class="cms-app-tile cms-tile-warm {{ request()->is('admin/hand-books') ? 'active' : '' }}">
                <i class="fa fa-file-pdf-o"></i>
                <span>Hand Book</span>
            </a>
        </div>
    </section>
    <!-- /.sidebar -->
</aside>
