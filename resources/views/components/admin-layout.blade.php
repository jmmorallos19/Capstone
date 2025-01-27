<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    
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
           'public/assets/css/loading-page.css', 
           'public/assets/css/bootstrap-icons.css', 
           'public/assets/css/admin/sidebar.css', 
           'public/assets/css/admin/header.css',
           'public/assets/css/admin/footer.css',

           'public/assets/css/admin/dashboard/main.css', 
           'public/assets/css/admin/dashboard/table.css', 

            //Other Js Files
           'public/assets/js/admin/layout/realtime_update.js',
           'public/assets/js/admin/profile/edit-profile.js', 
           'public/assets/js/loading-page.js', 
           'public/assets/js/tooltips.js',  
           'public/assets/js/toggler.js',

           //Dashboard
           'public/assets/css/admin/dashboard/reports.css',

           //Books
           'public/assets/css/admin/books/books.css',

           ])

</head>
<body style="height: 100vh; min-height: 100vh; max-height: 100vh;">

    <!-- Loading Screen -->
    <div id="loading-screen">
        <!-- Logo image -->
        <div class="d-flex justify-content-center align-content-center gap-5 flex-column">
        <img src="{{asset('assets/images/college.jpg')}}" alt="Logo">
        <!-- Optional spinner below the logo -->
        </div>

        <div class="dots"></div>
    </div>


    <div class="d-flex" style="height: 100vh; width: 100vw">
       <!-- Sidebar -->
       @includeIf('components.admin.layout.sidebar')
        
        <!-- Main Component -->
        <div class="main w-100 overflow-y-auto" style="height: 100vh;">
            <nav class="navbar navbar-expand w-100 position-sticky" style="border-bottom:none; top: 0%; z-index: 1000;">
                {{-- Admin Header --}}
               @includeIf('components.admin.layout.header')
            </nav>

            <main class="p-md-3 p-1">
                {{$slot}}

                
            </main>

            <footer class="ps-4 pe-2 position-fixed bottom-0 d-flex align-items-center">   
                <a href="#" class="text-decoration-none m-0">
                  <p class="m-0" >ALL &copy; RESERVED 2024 | J3CS DEVS | DREAM LIBRARY</p>
                </a>
            </footer>
        </div>
    </div>
    
</body>
</html>

