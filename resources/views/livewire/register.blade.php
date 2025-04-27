<form wire:submit.prevent="register()" class="mt-8 space-y-6">





    <body class="min-h-screen bg-slate-100 dark:bg-slate-900">
        <div class="flex items-center justify-center min-h-screen p-4">
            <!-- Login Container -->
            <div class="w-full max-w-md p-8 space-y-8 bg-white shadow-lg dark:bg-slate-800 rounded-2xl">
                <!-- Header -->
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-slate-900 dark:text-white">
                        Welcome
                    </h2>
                    <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">
                        Please reigster  your  account
                    </p>
                </div>

                @if (session()->has('error'))
                    <div class="p-4 text-sm text-red-500 rounded-lg bg-red-50 dark:bg-red-900/50 dark:text-red-400">
                        <i class="mr-2 fas fa-exclamation-circle"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif
                <!-- Login Form -->

                <!-- Email Input -->

                <div>
                    <label for="name" class="block mb-1 text-sm font-medium text-slate-700 dark:text-slate-300">
                        Name
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fas fa-user text-slate-400"></i>
                        </div>
                        <input id="name" name="name" type="text" required wire:model='name'
                            class="block w-full pl-10 pr-3 py-2.5 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400"
                            placeholder="Mr.John">
                        @error('name')
                            <li class="text-red-500">{{ $message }}</li>
                        @enderror

                    </div>

                </div>



                <div>
                    <label for="email" class="block mb-1 text-sm font-medium text-slate-700 dark:text-slate-300">
                        Email Address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fas fa-envelope text-slate-400"></i>
                        </div>
                        <input id="email" name="email" type="email" required wire:model='email'
                            class="block w-full pl-10 pr-3 py-2.5 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400"
                            placeholder="admin@example.com">
                        @error('email')
                            <li class="text-red-500">{{ $message }}</li>
                        @enderror

                    </div>

                </div>

                <!-- Password Input -->
                <div>
                    <label for="password" class="block mb-1 text-sm font-medium text-slate-700 dark:text-slate-300">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fas fa-lock text-slate-400"></i>
                        </div>
                        <input id="password" name="password" type="password" required wire:model='password'
                            class="block w-full pl-10 pr-3 py-2.5 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400"
                            placeholder="••••••••">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <button type="button" id="togglePassword"
                                class="text-slate-400 hover:text-slate-500 dark:hover:text-slate-300 focus:outline-none">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                        @error('password')
                            <li class="text-red-500">{{ $message }}</li>
                        @enderror

                    </div>

                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    {{-- <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox"
                                class="w-4 h-4 text-teal-500 rounded cursor-pointer focus:ring-teal-400 border-slate-300">
                            <label for="remember-me"
                                class="block ml-2 text-sm cursor-pointer text-slate-700 dark:text-slate-300">
                                Remember me
                            </label>
                        </div> --}}
                    {{-- <a href="#" class="text-sm font-medium text-teal-500 hover:text-teal-400">
                            Forgot password?
                        </a> --}}
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full flex justify-center items-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-teal-500 hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-400 transition-colors"
                    {{-- id="submitButton" --}}>
                    <span>Register</span>

                </button>

                <!-- Error Message -->

                @session('error')
                    <div class="hidden p-4 text-sm text-red-500 rounded-lg bg-red-50 dark:bg-red-900/50 dark:text-red-400"
                        id="errorMessage">
                        <i class="mr-2 fas fa-exclamation-circle"></i>
                        <span>Invalid email or password. Please try again.</span>
                    </div>
                @endsession




                <div class="text-center">
<a href="{{ route('user.login') }}" class=" text-white">Login</a>
                </div>



                <!-- Dark Mode Toggle -->
                <div class="text-center">
                    <button onclick="toggleDarkMode()"
                        class="inline-flex items-center justify-center p-2 rounded-lg text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700">
                        <i class="fas fa-moon dark:hidden"></i>
                        <i class="hidden fas fa-sun dark:block"></i>
                        <span class="ml-2 text-sm">Toggle Theme</span>
                    </button>
                </div>
            </div>
        </div>


        <script>
            // Dark mode functionality
            function toggleDarkMode() {
                document.documentElement.classList.toggle('dark');
                localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
            }

            // Check for saved dark mode preference
            if (localStorage.getItem('darkMode') === 'true' ||
                (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }

            // Toggle password visibility
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                toggleIcon.classList.toggle('fa-eye');
                toggleIcon.classList.toggle('fa-eye-slash');
            });

            // Form validation and submission
        </script>
    </body>


</form>
