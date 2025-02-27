import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [ 
                    'public/assets/js/jquery.js', 
                    'public/assets/js/app.js', 
                    'public/assets/js/datatables.js',
                    'public/assets/js/sweetAlert2.js', 
                
                    // General Css
                    'public/assets/css/app.css',
                    'public/assets/css/datatables.css',
                    'public/assets/css/loading-page.css', 
                    'public/assets/css/login-media.css', 
                    'public/assets/css/bootstrap-icons.css',
                    'public/assets/css/sweetAlert2.css', 
                    'public/assets/css/login.css', 
                    'public/assets/css/admin/header.css', 
                    'public/assets/css/admin/sidebar.css', 
                    'public/assets/css/admin/footer.css',
                    'public/assets/css/admin/dashboard/main.css',

                    // Dashboard
                    'public/assets/css/admin/dashboard/table.css', 
                    'public/assets/css/admin/dashboard/reports.css',

                    //Books
                    'public/assets/css/admin/books/books.css',

                    // sass
                    'public/assets/sass/app.scss', 

                    // Js
                    'public/assets/js/loading-page.js', 
                    'public/assets/js/login-toggler.js',
                    'public/assets/js/admin/layout/realtime_update.js',
                    'public/assets/js/tippy.js'
                 ],

            refresh: true,
        }),
    ],
});
