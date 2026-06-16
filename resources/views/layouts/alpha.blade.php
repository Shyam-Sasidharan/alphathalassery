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
        const registrationColleges = {
            ahirs: {
                label: 'Alpha Higher Institute of Religious Sciences',
                description: 'Linked with Dharmaram Vidya Kshetram, Bengalauru.'
            },
            tacrs: {
                label: 'Tely-Alpha Center For Religious Sciences',
                description: 'Run by the Archdiocese of Tellicherry.'
            }
        };

        function setRegistrationCollege(college) {
            const selectedCollege = registrationColleges[college] ? college : 'ahirs';
            const selectedLabel = registrationColleges[selectedCollege].label;
            const selectedDescription = registrationColleges[selectedCollege].description;

            $('[data-registration-college-input]').val(selectedCollege);
            $('[data-registration-college-label]').text(selectedLabel);
            $('[data-registration-college-title]').text(selectedLabel);
            $('[data-registration-college-description]').text(selectedDescription);

            $('[data-registration-college-option]').each(function() {
                const isActive = $(this).data('registration-college-option') === selectedCollege;
                $(this)
                    .toggleClass('bg-primary text-on-primary', isActive)
                    .toggleClass('bg-surface-container-low text-on-surface', !isActive);
            });

            $('[data-registration-college-group]').each(function() {
                const isActive = $(this).data('registration-college-group') === selectedCollege;
                $(this).toggle(isActive).prop('disabled', !isActive);
                $(this).find('option').prop('disabled', !isActive);
            });

            $('select[name="course"], select[name="centre"]').each(function() {
                const selectedOption = $(this).find('option:selected');
                if (selectedOption.closest('[data-registration-college-group]').data('registration-college-group') !== selectedCollege) {
                    $(this).val('');
                }
            });
        }

        // Registration modal trigger
        $(document).on('click', '[data-registration-open]', function() {
            setRegistrationCollege($(this).data('registration-college'));
            $('#registerModal').modal('show');
        });

        $(document).on('click', '[data-registration-college-option]', function() {
            setRegistrationCollege($(this).data('registration-college-option'));
        });

        $(document).on('change', '[data-registration-college-input]', function() {
            setRegistrationCollege($(this).val());
        });

        setRegistrationCollege($('[data-registration-college-input]').val());
    </script>
</body>
</html>
