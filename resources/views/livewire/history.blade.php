<div>
    <div class="w-full bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Your Previous Record</h1>

        <!-- Date Filter -->
        <div class="mb-6 flex space-x-4 items-end">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
                <input
                    type="date"
                    wire:model.deferred="start_date"
                    class="p-2 border rounded-md bg-white border-gray-300 text-gray-900 focus:ring-2 focus:ring-blue-500 transition duration-200"
                />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">End Date</label>
                <input
                    type="date"
                    wire:model.deferred="end_date"
                    class="p-2 border rounded-md bg-white border-gray-300 text-gray-900 focus:ring-2 focus:ring-blue-500 transition duration-200"
                />
            </div>
            <div class="flex space-x-2">
                <button
                    wire:click="applyDateRange"
                    class="p-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200"
                >
                    Apply
                </button>
                <button
                    wire:click="resetDateFilter"
                    class="p-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 transition duration-200"
                >
                    Reset
                </button>
            </div>
        </div>

        <!-- Tabs -->
        <div class="mt-10">
            <div class="flex relative border-b" id="tabs-container">
                <button class="tab-button px-6 py-2 text-sm font-medium transition-colors text-blue-500" data-tab="0">
                    Hotels
                </button>
                <button class="tab-button px-6 py-2 text-sm font-medium transition-colors text-gray-500 hover:text-blue-400" data-tab="1">
                    Trip Routes
                </button>
                <button class="tab-button px-6 py-2 text-sm font-medium transition-colors text-gray-500 hover:text-blue-400" data-tab="2">
                    Packages
                </button>
                <button class="tab-button px-6 py-2 text-sm font-medium transition-colors text-gray-500 hover:text-blue-400" data-tab="3">
                    Vehicle Rents
                </button>
                <!-- Active indicator -->
                <div id="active-indicator" class="absolute bottom-0 h-0.5 bg-blue-500 transition-all duration-300"></div>
            </div>

            <div class="p-4">
                <!-- Hotels Tab -->
                <div class="tab-content active animate-fade-in" data-content="0">
                    <h2 class="text-xl font-semibold text-gray-800">Hotels</h2>
                    <p class="mt-2 text-gray-600">Your past hotel bookings.</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                        @forelse ($hotels as $eachHotel)
                            <div class="bg-white p-4 rounded-lg shadow border hover:shadow-lg transition-shadow duration-200">
                                @if($eachHotel->hotel)
                                    <div class="h-48 bg-gray-200 rounded-md mb-4 overflow-hidden">
                                        <img src="{{ $eachHotel->hotel->image }}" alt="{{ $eachHotel->hotel->name }}" class="h-full w-full object-cover transform hover:scale-105 transition-transform duration-300">
                                    </div>
                                    <h3 class="font-medium text-gray-800">{{ $eachHotel->hotel->name }}</h3>
                                    <p class="text-sm text-gray-500">From: {{ Carbon\Carbon::parse($eachHotel->start_date)->format('M d, Y') }}</p>
                                    <p class="text-sm text-gray-500">To: {{ Carbon\Carbon::parse($eachHotel->end_date)->format('M d, Y') }}</p>
                                    <p class="text-sm text-gray-500">Total: ${{ number_format($eachHotel->total_amount, 2) }}</p>
                                @else
                                    <p class="text-red-500 text-sm">Hotel not found</p>
                                @endif
                            </div>
                        @empty
                            <p class="text-gray-500">No hotel bookings found.</p>
                        @endforelse
                    </div>
                    <div class="mt-6">
                        {{ $hotels->links() }}
                    </div>
                </div>

                <!-- Trip Routes Tab -->
                <div class="tab-content animate-fade-in" data-content="1">
                    <h2 class="text-xl font-semibold text-gray-800">Trip Routes</h2>
                    <p class="mt-2 text-gray-600">Your past trip routes.</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                        @forelse ($trip_routes as $eachRoute)
                            <div class="bg-white p-4 rounded-lg shadow border hover:shadow-lg transition-shadow duration-200">
                                @if($eachRoute->tripRoute)
                                    <div class="h-48 bg-gray-200 rounded-md mb-4 overflow-hidden">
                                        <img src="{{ $eachRoute->tripRoute->image ?? asset('images/placeholder.jpg') }}" alt="{{ $eachRoute->tripRoute->name }}" class="h-full w-full object-cover transform hover:scale-105 transition-transform duration-300">
                                    </div>
                                    <h3 class="font-medium text-gray-800">{{ $eachRoute->tripRoute->name }}</h3>
                                    <p class="text-sm text-gray-500">Route: {{ $eachRoute->tripRoute->start_location }} to {{ $eachRoute->tripRoute->end_location }}</p>
                                    <p class="text-sm text-gray-500">Vehicle Type: {{ $eachRoute->tripRoute->vehicle_type }}</p>
                                    <p class="text-sm text-gray-500">Amount: ${{ number_format($eachRoute->tripRoute->amount, 2) }}</p>
                                    <p class="text-sm text-gray-500">Date: {{ Carbon\Carbon::parse($eachRoute->rent_date)->format('M d, Y') }}</p>
                                @else
                                    <p class="text-red-500 text-sm">Trip route not found</p>
                                @endif
                            </div>
                        @empty
                            <p class="text-gray-500">No trip routes found.</p>
                        @endforelse
                    </div>
                    <div class="mt-6">
                        {{ $trip_routes->links() }}
                    </div>
                </div>

                <!-- Packages Tab -->
                <div class="tab-content animate-fade-in" data-content="2">
                    <h2 class="text-xl font-semibold text-gray-800">Packages</h2>
                    <p class="mt-2 text-gray-600">Your past package bookings.</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                        @forelse ($packages as $eachPackage)
                            <div class="bg-white p-4 rounded-lg shadow border hover:shadow-lg transition-shadow duration-200">
                                @if($eachPackage->package)
                                    <div class="h-48 bg-gray-200 rounded-md mb-4 overflow-hidden">
                                        <img src="{{ $eachPackage->package->image }}" alt="{{ $eachPackage->package->name }}" class="h-full w-full object-cover transform hover:scale-105 transition-transform duration-300">
                                    </div>
                                    <h3 class="font-medium text-gray-800">{{ $eachPackage->package->name }}</h3>
                                    <p class="text-sm text-gray-500">Total: ${{ number_format($eachPackage->total_amount, 2) }}</p>
                                    <p class="text-sm text-gray-500">Persons: {{ $eachPackage->no_of_person }}</p>
                                    <p class="text-sm text-gray-500">Booked: {{ Carbon\Carbon::parse($eachPackage->created_at)->format('M d, Y') }}</p>
                                @else
                                    <p class="text-red-500 text-sm">Package not found</p>
                                @endif
                            </div>
                        @empty
                            <p class="text-gray-500">No packages found.</p>
                        @endforelse
                    </div>
                    <div class="mt-6">
                        {{ $packages->links() }}
                    </div>
                </div>

                <!-- Vehicle Rents Tab -->
                <div class="tab-content animate-fade-in" data-content="3">
                    <h2 class="text-xl font-semibold text-gray-800">Vehicle Rents</h2>
                    <p class="mt-2 text-gray-600">Your past vehicle rentals.</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                        @forelse ($vehicle_rents as $eachRent)
                            <div class="bg-white p-4 rounded-lg shadow border hover:shadow-lg transition-shadow duration-200">
                                @if($eachRent->vehicleRent && $eachRent->journeyRouteRs)
                                    <div class="h-48 bg-gray-200 rounded-md mb-4 overflow-hidden">
                                        <img src="{{ $eachRent->vehicleRent->image ?? asset('images/placeholder.jpg') }}" alt="{{ $eachRent->vehicleRent->name }}" class="h-full w-full object-cover transform hover:scale-105 transition-transform duration-300">
                                    </div>
                                    <h3 class="font-medium text-gray-800">{{ $eachRent->vehicleRent->name }}</h3>

                                    <p class="text-sm text-gray-500">Route: {{ $eachRent->journeyRouteRs->point_one }} to {{ $eachRent->journeyRouteRs->point_two }}</p>
                                    <p class="text-sm text-gray-500">Distance: {{ $eachRent->total_km }} km</p>
                                    <p class="text-sm text-gray-500">Total: ${{ number_format($eachRent->total_amount, 2) }}</p>
                                    <p class="text-sm text-gray-500">Seats: {{ $eachRent->vehicleRent->seat }}</p>
                                    <p class="text-sm text-gray-500">Rented: {{ Carbon\Carbon::parse($eachRent->created_at)->format('M d, Y') }}</p>
                                @else
                                    <p class="text-red-500 text-sm">Vehicle or route not found</p>
                                @endif
                            </div>
                        @empty
                            <p class="text-gray-500">No vehicle rentals found.</p>
                        @endforelse
                    </div>
                    <div class="mt-6">
                        {{ $vehicle_rents->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Custom styles for active indicator and animations */
        .tab-content {
            opacity: 0;
            display: none;
            transition: opacity 0.3s ease;
        }

        .tab-content.active {
            opacity: 1;
            display: block;
        }

        #active-indicator {
            position: absolute;
            bottom: 0;
            height: 2px;
            background-color: #3b82f6;
            transition: all 0.3s ease;
        }

        /* Fade-in animation */
        .animate-fade-in {
            animation: fadeIn 0.3s ease forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');
            const activeIndicator = document.getElementById('active-indicator');

            function setActiveIndicator(button) {
                const buttonRect = button.getBoundingClientRect();
                const containerRect = button.parentElement.getBoundingClientRect();
                activeIndicator.style.width = buttonRect.width + 'px';
                activeIndicator.style.left = (buttonRect.left - containerRect.left) + 'px';
            }

            setActiveIndicator(tabButtons[0]);

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tabIndex = this.getAttribute('data-tab');

                    tabButtons.forEach(btn => {
                        btn.classList.remove('text-blue-500');
                        btn.classList.add('text-gray-500', 'hover:text-blue-400');
                    });
                    this.classList.remove('text-gray-500', 'hover:text-blue-400');
                    this.classList.add('text-blue-500');

                    tabContents.forEach(content => {
                        content.classList.remove('active');
                    });

                    const activeContent = document.querySelector(`.tab-content[data-content="${tabIndex}"]`);
                    void activeContent.offsetWidth;
                    activeContent.classList.add('active');

                    setActiveIndicator(this);
                });
            });

            window.addEventListener('resize', function() {
                const activeButton = document.querySelector('.tab-button.text-blue-500');
                if (activeButton) {
                    setActiveIndicator(activeButton);
                }
            });
        });
    </script>



</div>
