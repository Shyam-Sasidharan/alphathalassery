<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'The Alpha Institute')</title>

    <link rel="shortcut icon" href="{{ asset('front/images/logo.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Manrope:wght@400;500;600;700&family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="{{ asset('js/tailwind-config.js') }}"></script>
    
    <!-- Custom Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    
    @yield('css')

    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        
        .animate-ticker {
            display: flex;
            width: fit-content;
            animation: ticker 30s linear infinite;
        }

        @keyframes ticker {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .nav-dropdown:hover .dropdown-content {
            display: block;
        }
        
        [data-registration-open] {
            cursor: pointer;
        }

        /* Ensure Bootstrap modals are hidden by default if CSS is missing */
        .modal {
            display: none;
        }
        .modal.show {
            display: block;
            background: rgba(0, 0, 0, 0.5);
        }
        .modal-open {
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-surface text-on-surface font-body selection:bg-tertiary-fixed selection:text-on-tertiary-fixed">
    @include('frontend.partials.alpha-header')

    <main>
        @yield('content')
    </main>

    @include('frontend.partials.alpha-footer')
    @include('frontend.partials.alpha-registration-modal')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    @yield('js')

    <script>
        // Registration modal trigger
        $(document).on('click', '[data-registration-open]', function() {
            $('#registerModal').modal('show');
        });
    </script>
</body>
</html>
