<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Loan Applicaiton</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

            <!-- sidebar -->
            @include('components.admin.sidebar')

            <!-- Page Content -->
            <main>
                <div class="p-4 sm:ml-64">
                    <div class="p-4  border-gray-200 rounded-lg dark:border-gray-700 mt-14">
                    @yield('content')  
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
