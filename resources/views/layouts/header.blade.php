<div>
    {{-- <link rel="stylesheet" href="{{ asset('node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}"> --}}
    @vite('resources/css/app.css', 'resources/js/app.js')

    <nav
        class="fixed top-0 left-0 right-0 z-50 border-b bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-slate-200 dark:border-slate-800">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <span
                        class="text-2xl font-bold text-transparent bg-gradient-to-r from-teal-500 to-blue-500 bg-clip-text">
                        TravelEase
                    </span>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <div class="flex items-center ml-10 space-x-4">
                        <a href="#home"
                            class="px-3 py-2 text-sm font-medium rounded-md text-slate-600 dark:text-slate-200 hover:text-teal-500 dark:hover:text-teal-400">
                            Home
                        </a>
                        <a href="#destinations"
                            class="px-3 py-2 text-sm font-medium rounded-md text-slate-600 dark:text-slate-200 hover:text-teal-500 dark:hover:text-teal-400">
                            Destinations
                        </a>
                        <a href="#packages"
                            class="px-3 py-2 text-sm font-medium rounded-md text-slate-600 dark:text-slate-200 hover:text-teal-500 dark:hover:text-teal-400">
                            Packages
                        </a>
                        <a href="#about"
                            class="px-3 py-2 text-sm font-medium rounded-md text-slate-600 dark:text-slate-200 hover:text-teal-500 dark:hover:text-teal-400">
                            About
                        </a>
                        <a href="#gallery"
                            class="px-3 py-2 text-sm font-medium rounded-md text-slate-600 dark:text-slate-200 hover:text-teal-500 dark:hover:text-teal-400">
                            Gallery
                        </a>
                        <a href="#contact"
                            class="px-3 py-2 text-sm font-medium rounded-md text-slate-600 dark:text-slate-200 hover:text-teal-500 dark:hover:text-teal-400">
                            Contact
                        </a>
                        <button onclick="toggleDarkMode()"
                            class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800">
                            <i class="fas fa-moon dark:hidden"></i>
                            <i class="hidden fas fa-sun dark:block text-slate-200"></i>
                        </button>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button onclick="toggleMenu()"
                        class="p-2 rounded-md text-slate-600 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">
                        <i class="fas fa-bars" id="menu-icon"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile menu -->
            <div class="hidden md:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="#home"
                        class="block px-3 py-2 text-base font-medium rounded-md text-slate-600 dark:text-slate-200 hover:text-teal-500 dark:hover:text-teal-400">
                        Home
                    </a>
                    <a href="#destinations"
                        class="block px-3 py-2 text-base font-medium rounded-md text-slate-600 dark:text-slate-200 hover:text-teal-500 dark:hover:text-teal-400">
                        Destinations
                    </a>
                    <a href="#packages"
                        class="block px-3 py-2 text-base font-medium rounded-md text-slate-600 dark:text-slate-200 hover:text-teal-500 dark:hover:text-teal-400">
                        Packages
                    </a>
                    <a href="#about"
                        class="block px-3 py-2 text-base font-medium rounded-md text-slate-600 dark:text-slate-200 hover:text-teal-500 dark:hover:text-teal-400">
                        About
                    </a>
                    <a href="#gallery"
                        class="block px-3 py-2 text-base font-medium rounded-md text-slate-600 dark:text-slate-200 hover:text-teal-500 dark:hover:text-teal-400">
                        Gallery
                    </a>
                    <a href="#contact"
                        class="block px-3 py-2 text-base font-medium rounded-md text-slate-600 dark:text-slate-200 hover:text-teal-500 dark:hover:text-teal-400">
                        Contact
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <script>
        // Dark mode toggle
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));

        }

        // Mobile menu toggle
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('menu-icon');
            const isOpen = menu.classList.contains('block');

            menu.classList.toggle('hidden');
            menu.classList.toggle('block');

            menuIcon.classList = isOpen ? 'fas fa-bars' : 'fas fa-times';
        }

        // Set current year in footer

        // Check for saved dark mode preference
        if (localStorage.getItem('darkMode') === 'true' ||
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }

        // Close mobile menu when clicking a link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('mobile-menu').classList.add('hidden');
                document.getElementById('mobile-menu').classList.remove('block');
                document.getElementById('menu-icon').classList = 'fas fa-bars';
            });
        });
    </script>
</div>
