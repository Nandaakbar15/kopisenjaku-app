<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title', 'Kopi Senjaku') - Coffee Shop Indonesia</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <!-- Icon -->
        <link rel="icon" type="image/png" href="{{ asset('images/coffee-logo.png') }}">
        @yield('styles')
    </head>

    <body class="bg-white text-gray-800">
        <!-- Navbar -->
        @include('customers.partials.navbar')

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        @include('customers.partials.footer')

        @yield('scripts')
    </body>

</html>
