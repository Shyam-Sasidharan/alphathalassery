<header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo" data-toggle="push-menu" role="button">
        <span class="logo-mini"><img src="{{ asset('front')}}/images/logo.png" alt="{{ config('app.name') }}"></span>
        <span class="logo-lg"><img src="{{ asset('front')}}/images/logo.png" alt="{{ config('app.name') }}"></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <div class="cms-top-brand">
            <span>Alpha Institute</span>
            <small>CMS Workspace</small>
        </div>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ url('/') }}" target="_blank" title="View website">
                        <i class="fa fa-external-link"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('course.create') }}" title="Add course">
                        <i class="fa fa-plus"></i>
                    </a>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="cms-user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                        <span class="hidden-xs">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <span class="cms-dropdown-logo">
                                <img src="{{ asset('front')}}/images/logo.png" alt="Alpha Institute">
                            </span>

                            <p class="cms-dropdown-user-name">{{ auth()->user()->name ?: 'Admin' }}</p>
                            <p class="cms-dropdown-user-meta">{{ auth()->user()->email }}</p>
                            <p class="cms-dropdown-user-meta">{{ auth()->user()->phone ?: 'Phone not added' }}</p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>
</header>
