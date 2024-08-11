<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <base href="{{ \URL::to('/') }}">
    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdn.fontawesome.com/6.0.0-beta3/cs s/all.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('faviconnsss.ico') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/app.js') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

</head>

<body class="bg-white dark:bg-gray-900">

    @include('components.navbar')
    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
        @include('components.sidebar')
        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-white lg:ml-64 dark:bg-gray-900">
            <main>
                <div class="px-4 pt-6 rounded-md shadow-md">
                    @yield('content')
                    <div class="flex justify-center shadow-md rounded-md">
                        @include('components.footer')
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('assets/js/flowbite.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebarBackdrop = document.getElementById('sidebarBackdrop');
            const navbarDropdown = document.getElementById('navbar-dropdown');
            document.getElementById('toggle-nav').addEventListener('click', function() {
                navbarDropdown.classList.toggle('hidden');
                sidebarBackdrop.classList.toggle('hidden');
            });
            document.getElementById('toggleSidebarMobileSearch').addEventListener('click', function() {
                navbarDropdown.classList.toggle('hidden');
                sidebarBackdrop.classList.toggle('hidden');
            });
            document.getElementById('sidebarBackdrop').addEventListener('click', function() {
                navbarDropdown.classList.toggle('hidden');
                sidebarBackdrop.classList.toggle('hidden');
            });

            const dropdownButton = document.getElementById('user-menu-button-2');
            const dropdownMenu = document.getElementById('dropdown-2');

            dropdownButton.addEventListener('click', () => {
                dropdownMenu.classList.toggle('hidden');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const close = document.getElementById('close');
            const message = document.getElementById('message');

            if (close) {
                close.addEventListener('click', function() {
                    if (message) {
                        message.style.display = 'none';
                    }
                });
            }
        });

        (function() {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>


</body>

</html>
