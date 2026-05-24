    @include('partials.head')
    @include('partials.header')
    @include('partials.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layouts.notification')
        <!-- Content Header (Page header) -->
        @yield('content', 'EduTech')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('partials.footer')
