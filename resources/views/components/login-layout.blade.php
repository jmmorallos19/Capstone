<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Dream Library</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/app-logo.png') }}">
    
    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Link to the compiled CSS file -->
    @vite(['public/assets/sass/app.scss',
           'public/assets/css/login-media.css', 
           'public/assets/css/sweetAlert2.css', 
           'public/assets/css/login.css', 
           'public/assets/css/loading-page.css', 
           'public/assets/css/bootstrap-icons.css', 
           'public/assets/js/loading-page.js', 
           'public/assets/js/app.js', 
           'public/assets/js/login-toggler.js' ])

</style>
</head>
<body class="p-0 m-0">
    @include('components.admin.layout.loading-screen')

    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })

            Toast.fire({
                icon: 'success',
                title: "{{ session('success') }}",
            })
        </script>
    @endif

    @if (session('status'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })

            Toast.fire({
                icon: 'success',
                title: "{{ session('status') }}",
            })
        </script>
    @endif

    <div class="row p-0 m-0" style="min-height: 100vh;">
        <main class="col col-6 d-flex justify-content-center align-items-center d-none d-lg-block" style="background-image: url('{{ asset('/assets/images/bg.jpg')}}'); position: relative;">    >
            <div class="overlay z-0 d-flex justify-content-center align-items-center" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.7); z-index: 1;">
                <div class="col col-lg-8">
                    <h1 class="m-0 fs-1" style="font-weight: 800; color: white; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); letter-spacing: 2px; line-height: 1.3;">
                        Library Management System - by Dream Library
                    </h1>
                </div>
            </div>
        </main>
    
        <div class="col col-lg-6 col-12 d-flex justify-content-center align-items-center">
            {{ $slot }}
        </div>
    </div>


</body>
</html>