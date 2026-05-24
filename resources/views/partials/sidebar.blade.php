<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('front')}}/images/logo.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Admin</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class=" {{ request()->is('dashboard') ? 'active' : '' }} ">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview {{ request()->is('admin/courses') || request()->is('admin/course/*') || request()->is('admin/semesters') || request()->is('admin/semester/*') ? 'active' : ''  }} ">
                <a href="#">
                    <i class="fa fa-paper-plane-o"></i> <span>Courses</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="">
                    <li class="{{request()->is('admin/courses') || request()->is('admin/course/*') ? 'active' : ''}}"><a href="{{ route('course') }}"><i class="fa fa-list"></i> Manage Course</a></li>
                    <li class="{{request()->is('admin/semesters') || request()->is('admin/semester/*') ? 'active' : ''}}"><a href="{{ route('semester') }}"><i class="fa fa-list"></i> Manage Semester</a></li>
                </ul>
            </li>
            <li class="{{request()->is('admin/gallery') ? 'active' : ''}}">
                <a href="{{ route('gallery') }}">
                    <i class="fa fa-image"></i> Gallery
                </a>
            </li>
            <li class="treeview {{request()->is('admin/publications') || request()->is('admin/publications/*') || request()->is('admin/categories') || request()->is('admin/category/*') ? 'active' : ''}}">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Publications</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{request()->is('admin/categories') || request()->is('admin/category/*') ? 'active' : ''}}">
                        <a href="{{ route('category') }}">
                            <i class="fa fa-list"></i> Publication Category
                        </a>
                    </li>
                    <li class="{{request()->is('admin/publications') || request()->is('admin/publications/*') ? 'active' : ''}}">
                        <a href="{{ route('publications') }}">
                            <i class="fa fa-list"></i> Publications
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{request()->is('admin/books') || request()->is('admin/book/*') || request()->is('admin/library_categories') || request()->is('admin/library_category/*') ? 'active' : ''}}">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Library</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{request()->is('admin/libraries') || request()->is('admin/library/*') ? 'active' : ''}}">
                        <a href="{{ route('library') }}">
                            <i class="fa fa-list"></i> Category
                        </a>
                    </li>
                    <li class="{{request()->is('admin/books') || request()->is('admin/book/*') ? 'active' : ''}}">
                        <a href="{{ route('book') }}">
                            <i class="fa fa-list"></i> Library Books
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{request()->is('admin/news') ? 'active' : ''}}">
                <a href="{{ route('news') }}">
                    <i class="fa fa-book"></i> Latest News
                </a>
            </li>

            <li class="treeview {{request()->is('admin/download_categories') || request()->is('admin/download_category/*') || request()->is('admin/downloads') || request()->is('admin/downloads/*') ? 'active' : ''}}">
                <a href="#">
                    <i class="fa fa-download"></i> <span>Downloads</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{request()->is('admin/download_categories') || request()->is('admin/download_category/*') ? 'active' : ''}}">
                        <a href="{{ route('download_category') }}">
                            <i class="fa fa-download"></i> Category
                        </a>                        
                    </li>
                    <li class="{{request()->is('admin/downloads') || request()->is('admin/downloads/*') ? 'active' : ''}}">
                        <a href="{{ route('downloads') }}">
                            <i class="fa fa-download"></i> Downloads
                        </a>                        
                    </li>
                </ul>
            </li>
            <li class="{{request()->is('admin/study_centres') ? 'active' : ''}}">
                <a href="{{ route('study_centre') }}">
                    <i class="fa fa-building"></i> Study Centres
                </a>
            </li>
            <li class="{{request()->is('admin/faq') ? 'active' : ''}}">
                <a href="{{ route('faq') }}">
                    <i class="fa fa-question"></i> FAQ
                </a>
            </li>
            <li class="{{request()->is('admin/professors') ? 'active' : ''}}">
                <a href="{{ route('professor') }}">
                    <i class="fa fa-user"></i> Our Professors
                </a>
            </li>
            <li class="{{request()->is('admin/hand-books') ? 'active' : ''}}">
                <a href="{{ route('hand-book') }}">
                    <i class="fa fa-user"></i> Hand Book
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
