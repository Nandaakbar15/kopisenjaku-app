<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kopi Senjaku - Admin Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700&family=Space+Grotesk:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3H47BT6CB4MNblPk6OO7fdLcuIsKk4sCqsolEbDjxjqhd7FsPBJmASYsCZPlNsWVlwrwa6hyMEtw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Flowbite CSS -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">

    <!-- Icon -->
    <link rel="icon" type="image/png" href="{{ asset('images/coffee-logo.png') }}">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: "DM Sans", system-ui, sans-serif;
            background-color: #f8f9fb;
            color: #2d3344;
        }
    </style>
</head>

<body>
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    @include('dashboardAdmin.partials.sidebar')

    <!-- Main Content -->
    <main class="main-content" id="mainContent">
        <!-- Top Bar -->
        @include('dashboardAdmin.partials.header')

        <!-- Page Content -->
        <div class="content-wrapper">
            <div class="px-6 py-6 max-w-[1600px] mx-auto">
                <!-- Flash message -->
                @include('flash-message')

                <!-- Page Content -->
                @yield('content')

                <!-- Footer -->
                @include('dashboardAdmin.partials.footer')
            </div>
        </div>
    </main>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    <!-- Custom Scripts -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
