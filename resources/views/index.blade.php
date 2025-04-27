  <div>
    @extends('layouts.master')

    @section('content')

        <body class="transition-colors duration-300 bg-white dark:bg-slate-900">
            <!-- Navigation -->


            <!-- Hero Section -->
            <section id="home" class="relative pt-24 pb-32 bg-center bg-cover lg:pt-32 lg:pb-40"
                style="background-image: url('https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1748&q=80');">
                <div class="absolute inset-0 bg-black/50"></div>
                <div class="relative px-4 mx-auto text-center max-w-7xl sm:px-6 lg:px-8">
                    <h1 class="mb-6 text-4xl font-bold text-white sm:text-5xl md:text-6xl">
                        Discover the World's Beauty
                        <span class="block text-teal-400">With TravelEase</span>
                    </h1>
                    <p class="max-w-3xl mx-auto mt-4 text-xl text-slate-200">
                        Experience unforgettable adventures and create lasting memories with our curated travel 'package's.
                    </p>
                    <div class="flex justify-center gap-4 mt-10">
                        <a href="{{ route('user.packages') }}"
                            class="px-8 py-3 font-medium text-white transition-colors bg-teal-500 rounded-full hover:bg-teal-600">
                            Explore Packages
                        </a>
                        <a href="#contact"
                            class="px-8 py-3 font-medium text-white transition-colors border-2 border-white rounded-full hover:bg-white/10">
                            Contact Us
                        </a>
                    </div>
                </div>
            </section>

            <!-- Travel Stats -->
            <section class="py-12 bg-teal-500 dark:bg-teal-600">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="grid grid-cols-2 gap-8 text-center md:grid-cols-4">
                        <div class="text-white">
                            <div class="mb-2 text-4xl font-bold">500+</div>
                            <div class="text-teal-100">Destinations</div>
                        </div>
                        <div class="text-white">
                            <div class="mb-2 text-4xl font-bold">10k+</div>
                            <div class="text-teal-100">Happy Travelers</div>
                        </div>
                        <div class="text-white">
                            <div class="mb-2 text-4xl font-bold">15+</div>
                            <div class="text-teal-100">Years Experience</div>
                        </div>
                        <div class="text-white">
                            <div class="mb-2 text-4xl font-bold">98%</div>
                            <div class="text-teal-100">Satisfaction Rate</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Popular Destinations -->
            <section id="destinations" class="py-20">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="mb-16 text-center">
                        <h2 class="mb-4 text-3xl font-bold text-slate-900 dark:text-white">Partner Hotels</h2>
                        <p class="text-slate-600 dark:text-slate-300">Explore our most sought-after travel destinations</p>
                    </div>

    @include('livewire.card.hotel_card')
                    <div class="mt-12 text-center">
                        <a href="{{ route('user.all_hotels') }}"
                            class="inline-block px-8 py-3 font-medium text-white transition-colors bg-teal-500 rounded-full hover:bg-teal-600">
                            View All Hotels
                        </a>
                    </div>
                </div>
            </section>

            <!-- Tour Packages -->
          {{-- @include('livewire.card.package_card') --}}
            <!-- Why Choose Us -->
            <section id="about" class="py-20">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="mb-16 text-center">
                        <h2 class="mb-4 text-3xl font-bold text-slate-900 dark:text-white">Why Choose Us</h2>
                        <p class="text-slate-600 dark:text-slate-300">What makes us different from other travel agencies</p>
                    </div>
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                        <div class="text-center">
                            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-teal-500 rounded-full">
                                <i class="text-2xl text-white fas fa-globe"></i>
                            </div>
                            <h3 class="mb-2 text-xl font-semibold text-slate-900 dark:text-white">Expert Guides</h3>
                            <p class="text-slate-600 dark:text-slate-300">Professional and experienced local guides</p>
                        </div>
                        <div class="text-center">
                            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-teal-500 rounded-full">
                                <i class="text-2xl text-white fas fa-shield-alt"></i>
                            </div>
                            <h3 class="mb-2 text-xl font-semibold text-slate-900 dark:text-white">Safe Travel</h3>
                            <p class="text-slate-600 dark:text-slate-300">Your safety is our top priority</p>
                        </div>
                        <div class="text-center">
                            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-teal-500 rounded-full">
                                <i class="text-2xl text-white fas fa-dollar-sign"></i>
                            </div>
                            <h3 class="mb-2 text-xl font-semibold text-slate-900 dark:text-white">Best Prices</h3>
                            <p class="text-slate-600 dark:text-slate-300">Competitive prices and great value</p>
                        </div>
                        <div class="text-center">
                            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-teal-500 rounded-full">
                                <i class="text-2xl text-white fas fa-headset"></i>
                            </div>
                            <h3 class="mb-2 text-xl font-semibold text-slate-900 dark:text-white">24/7 Support</h3>
                            <p class="text-slate-600 dark:text-slate-300">Always here when you need us</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Testimonials -->
            <section class="py-20 bg-slate-50 dark:bg-slate-800/50">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="mb-16 text-center">
                        <h2 class="mb-4 text-3xl font-bold text-slate-900 dark:text-white">What Our Travelers Say</h2>
                        <p class="text-slate-600 dark:text-slate-300">Real experiences from real travelers</p>
                    </div>
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                        <div class="p-6 bg-white shadow-lg dark:bg-slate-800 rounded-2xl">
                            <div class="flex items-center mb-4">
                                <img src="https://randomuser.me/api/portraits/women/17.jpg" alt="Sarah"
                                    class="w-12 h-12 rounded-full">
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold text-slate-900 dark:text-white">Sarah Johnson</h4>
                                    <div class="flex text-teal-500">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="text-slate-600 dark:text-slate-300">"Amazing experience! The guides were knowledgeable
                                and friendly. Will definitely book again!"</p>
                        </div>
                        <div class="p-6 bg-white shadow-lg dark:bg-slate-800 rounded-2xl">
                            <div class="flex items-center mb-4">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Michael"
                                    class="w-12 h-12 rounded-full">
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold text-slate-900 dark:text-white">Michael Chen</h4>
                                    <div class="flex text-teal-500">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="text-slate-600 dark:text-slate-300">"Perfect organization from start to finish. The
                                luxury package exceeded our expectations!"</p>
                        </div>
                        <div class="p-6 bg-white shadow-lg dark:bg-slate-800 rounded-2xl">
                            <div class="flex items-center mb-4">
                                <img src="https://randomuser.me/api/portraits/women/28.jpg" alt="Emma"
                                    class="w-12 h-12 rounded-full">
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold text-slate-900 dark:text-white">Emma Davis</h4>
                                    <div class="flex text-teal-500">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="text-slate-600 dark:text-slate-300">"The cultural immersion was incredible. We learned so
                                much about local traditions!"</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Photo Gallery -->
            <section id="gallery" class="py-20">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="mb-16 text-center">
                        <h2 class="mb-4 text-3xl font-bold text-slate-900 dark:text-white">Travel Gallery</h2>
                        <p class="text-slate-600 dark:text-slate-300">Capture the moments that last forever</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
                        <div class="relative overflow-hidden rounded-lg group">
                            <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?ixlib=rb-4.0.3"
                                alt="Paris" class="object-cover w-full h-64 transition duration-300 group-hover:scale-110">
                            <div class="absolute inset-0 transition-colors bg-black/25 group-hover:bg-black/40"></div>
                            <div class="absolute text-white bottom-4 left-4">
                                <h4 class="text-lg font-semibold">Paris</h4>
                            </div>
                        </div>
                        <div class="relative overflow-hidden rounded-lg group">
                            <img src="https://images.unsplash.com/photo-1493246507139-91e8fad9978e?ixlib=rb-4.0.3"
                                alt="Maldives" class="object-cover w-full h-64 transition duration-300 group-hover:scale-110">
                            <div class="absolute inset-0 transition-colors bg-black/25 group-hover:bg-black/40"></div>
                            <div class="absolute text-white bottom-4 left-4">
                                <h4 class="text-lg font-semibold">Maldives</h4>
                            </div>
                        </div>
                        <div class="relative overflow-hidden rounded-lg group">
                            <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?ixlib=rb-4.0.3"
                                alt="Dubai" class="object-cover w-full h-64 transition duration-300 group-hover:scale-110">
                            <div class="absolute inset-0 transition-colors bg-black/25 group-hover:bg-black/40"></div>
                            <div class="absolute text-white bottom-4 left-4">
                                <h4 class="text-lg font-semibold">Dubai</h4>
                            </div>
                        </div>
                        <div class="relative overflow-hidden rounded-lg group">
                            <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-4.0.3"
                                alt="Switzerland"
                                class="object-cover w-full h-64 transition duration-300 group-hover:scale-110">
                            <div class="absolute inset-0 transition-colors bg-black/25 group-hover:bg-black/40"></div>
                            <div class="absolute text-white bottom-4 left-4">
                                <h4 class="text-lg font-semibold">Switzerland</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Newsletter -->
            <section class="py-20 bg-teal-500 dark:bg-teal-600">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2 class="mb-4 text-3xl font-bold text-white">Subscribe to Our Newsletter</h2>
                        <p class="mb-8 text-teal-100">Get the latest travel deals and updates straight to your inbox</p>
                        <form class="max-w-md mx-auto">
                            <div class="flex gap-4">
                                <input type="email" placeholder="Enter your email"
                                    class="flex-1 px-4 py-3 rounded-full focus:outline-none focus:ring-2 focus:ring-white/50">
                                <button type="submit"
                                    class="px-8 py-3 font-medium text-teal-500 transition-colors bg-white rounded-full hover:bg-teal-50">
                                    Subscribe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            <!-- Contact Section -->
            <section id="contact" class="py-20">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="mb-16 text-center">
                        <h2 class="mb-4 text-3xl font-bold text-slate-900 dark:text-white">Contact Us</h2>
                        <p class="text-slate-600 dark:text-slate-300">Ready to start your adventure? Get in touch with us</p>
                    </div>
                    <div class="max-w-3xl mx-auto">
                        <form class="space-y-6">
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">
                                        Name
                                    </label>
                                    <input type="text" id="name"
                                        class="w-full px-4 py-3 bg-white border rounded-lg border-slate-300 dark:border-slate-700 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent">
                                </div>
                                <div>
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">
                                        Email
                                    </label>
                                    <input type="email" id="email"
                                        class="w-full px-4 py-3 bg-white border rounded-lg border-slate-300 dark:border-slate-700 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent">
                                </div>
                            </div>
                            <div>
                                <label for="destination"
                                    class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">
                                    Preferred Destination
                                </label>
                                <select id="destination"
                                    class="w-full px-4 py-3 bg-white border rounded-lg border-slate-300 dark:border-slate-700 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent">
                                    <option value="">Select a destination</option>
                                    <option value="bali">Bali, Indonesia</option>
                                    <option value="santorini">Santorini, Greece</option>
                                    <option value="maldives">Maldives</option>
                                    <option value="switzerland">Switzerland</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label for="message"
                                    class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">
                                    Message
                                </label>
                                <textarea id="message" rows="4"
                                    class="w-full px-4 py-3 bg-white border rounded-lg border-slate-300 dark:border-slate-700 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent"></textarea>
                            </div>
                            <button type="submit"
                                class="w-full px-6 py-3 font-medium text-white transition-colors bg-teal-500 rounded-full hover:bg-teal-600">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </section>

            <!-- Footer -->
            <footer class="bg-white border-t dark:bg-slate-900 border-slate-200 dark:border-slate-800">
                <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
                        <div>
                            <h3 class="mb-4 text-lg font-semibold text-slate-900 dark:text-white">About TravelEase</h3>
                            <p class="text-slate-600 dark:text-slate-300">Making your travel dreams come true with
                                unforgettable experiences and personalized service.</p>
                        </div>
                        <div>
                            <h3 class="mb-4 text-lg font-semibold text-slate-900 dark:text-white">Quick Links</h3>
                            <ul class="space-y-2">
                                <li><a href="#home" class="text-slate-600 dark:text-slate-300 hover:text-teal-500">Home</a>
                                </li>
                                <li><a href="#destinations"
                                        class="text-slate-600 dark:text-slate-300 hover:text-teal-500">Destinations</a></li>
                                <li><a href="#packages"
                                        class="text-slate-600 dark:text-slate-300 hover:text-teal-500">Packages</a></li>
                                <li><a href="#contact"
                                        class="text-slate-600 dark:text-slate-300 hover:text-teal-500">Contact</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="mb-4 text-lg font-semibold text-slate-900 dark:text-white">Contact Info</h3>
                            <ul class="space-y-2">
                                <li class="text-slate-600 dark:text-slate-300"><i class="mr-2 fas fa-map-marker-alt"></i>123
                                    Travel Street, City</li>
                                <li class="text-slate-600 dark:text-slate-300"><i class="mr-2 fas fa-phone"></i>+1 234 567 890
                                </li>
                                <li class="text-slate-600 dark:text-slate-300"><i
                                        class="mr-2 fas fa-envelope"></i>info@travelease.com</li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="mb-4 text-lg font-semibold text-slate-900 dark:text-white">Follow Us</h3>
                            <div class="flex space-x-4">
                                <a href="#" class="text-slate-600 dark:text-slate-300 hover:text-teal-500"><i
                                        class="fab fa-facebook"></i></a>
                                <a href="#" class="text-slate-600 dark:text-slate-300 hover:text-teal-500"><i
                                        class="fab fa-twitter"></i></a>
                                <a href="#" class="text-slate-600 dark:text-slate-300 hover:text-teal-500"><i
                                        class="fab fa-instagram"></i></a>
                                <a href="#" class="text-slate-600 dark:text-slate-300 hover:text-teal-500"><i
                                        class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="pt-8 mt-8 text-center border-t border-slate-200 dark:border-slate-800">
                        <p class="text-slate-600 dark:text-slate-400">
                            © <span id="current-year"></span> TravelEase. All rights reserved.
                        </p>
                    </div>
                </div>
            </footer>

            <script>
                document.getElementById('current-year').textContent = new Date().getFullYear();

                function redirect(url) {
    window.location.href = url;
}


            </script>
        </body>
    @endsection
  </div>


