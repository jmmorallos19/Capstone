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

    {{-- jquery-3.6.0.min.js --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Link to the compiled CSS file -->
    @vite([

            // Main Js Files
           'public/assets/js/jquery.js',
           'public/assets/js/app.js', 
           'public/assets/js/datatables.js', 

            //Scss File
           'public/assets/sass/app.scss',

           'public/assets/css/app.css',
           'public/assets/css/datatables.css',
           'public/assets/css/sweetAlert2.css', 
           'public/assets/css/loading-page.css', 
           'public/assets/css/bootstrap-icons.css', 
           'public/assets/css/admin/sidebar.css', 
           'public/assets/css/admin/header.css',
           'public/assets/css/admin/footer.css',

           'public/assets/css/admin/dashboard/main.css', 
           'public/assets/css/admin/dashboard/table.css', 

            //Other Js Files
           'public/assets/js/admin/layout/realtime_update.js',
           'public/assets/js/loading-page.js', 
           'public/assets/js/toggler.js',
           'public/assets/js/tippy.js',

           //Dashboard
           'public/assets/css/admin/dashboard/reports.css',

           //Books
           'public/assets/css/admin/books/books.css',

           ])

</head>
<body style="height: 100vh; min-height: 100vh; max-height: 100vh;">

    @include('components.admin.layout.loading-screen')


    <div class="d-flex" style="height: 100vh; width: 100vw">
       <!-- Sidebar -->
       @includeIf('components.admin.layout.sidebar')
        
        <!-- Main Component -->
        <div class="main w-100 overflow-y-auto" style="height: 100vh;">
            <nav class="navbar navbar-expand w-100 position-sticky" style="border-bottom:none; top: 0%; z-index: 1000;">
                {{-- Admin Header --}}
               @includeIf('components.admin.layout.header')
            </nav>

            <main class="p-md-3 p-1 pb-5 pb-lg-1 mb-3 mb-md-5 mb-xl-0">
                {{$slot}}

            </main>

            <footer class="ps-4 pe-2 position-fixed bottom-0 d-flex align-items-center">   
                <a href="https://j3cs.netlify.app/" target="_blank" class="text-decoration-none m-0">
                  <p class="m-0" >ALL &copy; RESERVED 2024 | J3CS DEVS | DREAM LIBRARY</p>
                </a>
            </footer>
        </div>
    </div>
    
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

    @if (session('error'))
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
            icon: 'error',
            title: "{{ session('error') }}",
        })
        </script>
    @endif
    

</body>
</html>

