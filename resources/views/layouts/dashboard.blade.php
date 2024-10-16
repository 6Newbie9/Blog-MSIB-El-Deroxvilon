<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog MSIB - Beranda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html {
            height: 100%;
        }

        body {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        body.light-mode {
            background-color: #FAF7F0;
            color: #212529;
        }

        .navbar.light-mode,
        .footer.light-mode {
            background-color: #ffedd5;
            /* Peach light */
            color: #2c3e50;
            /* Dark slate gray */
        }

        .card.light-mode {
            background-color: #D8D2C2;
            color: #212529;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card.night-mode p {
            color: #ffffff;
        }

        span.light-mode {
            color: #3b3b3b;
        }

        body.night-mode {
            background-color: #2c2c2c;
            color: #f8f9fa;
        }

        .light-mode a {
            color: black;
        }

        .night-mode a {
            color: #c0c0c0;
        }

        .navbar.night-mode,
        .footer.night-mode {
            background-color: #343a40;
            color: #f8f9fa;
        }

        .card.night-mode {
            background-color: #3b3b3b;
            color: #f8f9fa;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        }

        .mode-toggle {
            cursor: pointer;
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .mode-toggle:hover {
            background-color: #0056b3;
        }

        .dropdownMenu.light-mode {
            background-color: #ffe4c4;
            color: #3b3b3b;
            border: 1px solid #e0e0e0;
        }

        .dropdownMenu.night-mode {
            background-color: #343a40;
            color: #f8f9fa;
            border: 1px solid #444444;
        }

        #mainFooter {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
            margin-top: auto;
        }

        .night-mode #mainFooter {
            background-color: #35383f;
            color: white;
        }

        .light-mode #mainFooter {
            background-color: #ffe4c4;
            /* Bisque */
            color: #2c3e50;
            /* Dark slate gray */
        }

        .night-mode h1 {
            color: #c0c0c0;
        }
    </style>
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar flex items-center justify-between p-5 bg-gray-800 text-white">
        <div class="container mx-auto flex items-center justify-between">
            <a class="text-lg font-bold" href="#!">Blog MSIB</a>
            <div class="flex items-center space-x-6">
                <ul class="hidden md:flex space-x-4">
                    <li><a class="hover:text-gray-400" href="{{ route('dashboard') }}">Home</a></li>
                    <li><a class="hover:text-gray-400" href="/categories">Kategori</a></li>
                    <li><a class="hover:text-gray-400" href="/posts">Post Artikel</a></li>
                    <li><a class="hover:text-gray-400" href="/users">User</a></li>
                </ul>
                <div class="relative">
                    <button class="block text-white hover:text-gray-400" id="dropdownButton">
                        <span id="accountText">Account</span>
                    </button>
                    <div id="dropdownMenu"
                        class="dropdownMenu absolute right-0 mt-2 w-48 rounded-lg shadow-lg py-2 hidden">
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm hover:bg-gray-200 dark:hover:bg-gray-700">Profile</a>

                        <!-- Form for Logout -->
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-200 dark:hover:bg-gray-700">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                <button class="mode-toggle ml-3" onclick="toggleMode()">
                    <span id="modeIcon" class="fa-solid"></span>
                </button>
            </div>
        </div>
    </nav>
    {{-- {{ $slot }}  --}}
    <div class="container mx-auto max-w-full">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show bg-green-100 border border-green-400 text-green-700 rounded-lg shadow-md p-4"
                role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show bg-red-100 border border-red-400 text-red-700 rounded-lg shadow-md p-4"
                role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @yield('content')
    </div>

    <!-- Footer-->
    <footer id="mainFooter" class="py-5 bg-gray-800 text-center text-white">
        <div class="container">
            <p class="m-0">&copy; Bloog MSIB 2024</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Cek mode yang disimpan di localStorage saat halaman dimuat
        document.addEventListener("DOMContentLoaded", function() {
            const mode = localStorage.getItem('theme') || 'light';
            applyMode(mode);

            // Set icon to sun/moon based on the mode
            const modeIcon = document.getElementById('modeIcon');
            if (mode === 'night') {
                modeIcon.classList.add('fa-moon');
            } else {
                modeIcon.classList.add('fa-sun');
            }
        });

        function applyMode(mode) {
            const isNight = mode === 'night';
            document.body.classList.toggle('night-mode', isNight);
            document.body.classList.toggle('light-mode', !isNight);

            document.querySelectorAll('.navbar, .card, .footer, #dropdownMenu, #accountText').forEach(el => {
                el.classList.toggle('night-mode', isNight);
                el.classList.toggle('light-mode', !isNight);
            });
        }

        function toggleMode() {
            const modeIcon = document.getElementById('modeIcon');
            const currentMode = document.body.classList.contains('night-mode') ? 'night' : 'light';
            const newMode = currentMode === 'night' ? 'light' : 'night';

            applyMode(newMode);
            localStorage.setItem('theme', newMode);

            // Update the icon
            modeIcon.classList.toggle('fa-moon', newMode === 'night');
            modeIcon.classList.toggle('fa-sun', newMode === 'light');
        }

        // Dropdown toggle script
        document.getElementById('dropdownButton').addEventListener('click', function() {
            const dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown menu when clicking outside
        window.addEventListener('click', function(e) {
            const dropdownButton = document.getElementById('dropdownButton');
            const dropdownMenu = document.getElementById('dropdownMenu');
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });

        
    </script>


</body>

</html>
