<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login Page</title>

        {{-- Tailwind CSS CDN --}}
        <script src="https://cdn.tailwindcss.com"></script>

        {{-- Flowbite CSS --}}
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

        {{-- Flowbite JS --}}
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

        {{-- Icon --}}
        <link rel="icon" type="image/png" href="images/caffee-logo.png">

        {{-- other CSS --}}
        <link rel="stylesheet" href="{{ asset('css/style2.css') }}">

        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        colors: {
                            primary: {
                                "50": "#eff6ff",
                                "100": "#dbeafe",
                                "200": "#bfdbfe",
                                "300": "#93c5fd",
                                "400": "#60a5fa",
                                "500": "#3b82f6",
                                "600": "#2563eb",
                                "700": "#1d4ed8",
                                "800": "#1e40af",
                                "900": "#1e3a8a",
                                "950": "#172554"
                            }
                        }
                    }
                }
            }
        </script>
    </head>

    <body>
        <section class="bg-gray-50 dark:bg-gray-900 anim-fade-up" style="animation-delay: 0.05s">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                    Welcome Back
                </a>
                @include('flash-message')
                <div
                    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8 mt-2">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Login
                        </h1>
                        <form class="space-y-4 md:space-y-6" action="/handleLogin" method="POST">
                            @csrf
                            <div>
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                    email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@company.com" required="">
                            </div>
                            <div>
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required="">
                                <button type="button" id="togglePassword"
                                    class="inline-block rounded-lg shadow-lg text-white bg-slate-500 hover:bg-slate-700 px-4 py-2 mt-3">Show</button>
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign
                                in</button>
                        </form>
                    </div>
                    <div class="mt-5 flex px-3 py-4">
                        <a href="/customers/home"
                            class="inline-block text-white rounded-lg shadow-lg px-4 py-2 bg-slate-500 hover:bg-slate-700">Kembali</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Alpine.js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </body>

</html>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const passwordInput = document.querySelector("#password");
        const toggleButton = document.querySelector("#togglePassword");

        toggleButton.addEventListener("click", function() {
            // Toggle the type attribute
            const isPassword = passwordInput.getAttribute("type") === "password";
            passwordInput.setAttribute("type", isPassword ? "text" : "password");

            // Toggle the button text
            this.textContent = isPassword ? "Hide" : "Show";
        });
    });
</script>
