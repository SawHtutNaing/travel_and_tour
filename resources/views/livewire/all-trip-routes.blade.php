
<div class="bg-gray-100 dark:bg-gray-900 min-h-screen text-gray-900 dark:text-gray-100">
    <div class="container mx-auto px-4 py-8">

        <!-- Header -->
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Find Your Perfect Stay</h1>
            <p class="text-gray-600 dark:text-gray-400">Discover amazing trip_routes for your next trip</p>
        </header>

        <!-- Search and Filters Section -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 mb-8">
            <!-- Search Bar -->
            <div class="mb-6">
                <div class="relative">
                    <input type="search" id="tableSearch" wire:model.live='search'
                            class="w-full px-4 py-2 pl-10 pr-4 border border-slate-200 dark:border-slate-700 rounded-lg bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500"
                            placeholder="Search...">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400 dark:text-gray-500"></i>
                    </div>


                </div>

                {{-- <button type="button" wire:click="search_fun"
                class=" bg-red-500 w-52 h-32">

                    <span class="ml-2">search </span>
                </button> --}}
            </div>

            <div class="p-4 bg-white dark:bg-gray-800 rounded shadow-md flex  gap-x-3">
                <input
                    type="number"
                    wire:model.live="min_amount"
                    class="  p-2 border rounded text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 focus:outline-none focus:ring focus:border-blue-500"
                    placeholder="Min Amount"
                >
                <input
                    type="number"
                    wire:model.live="max_amount"
                    class=" p-2 border rounded text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 focus:outline-none focus:ring focus:border-blue-500"
                    placeholder="Max Amount"
                >
            </div>





        </div>

        <!-- Results Count and Sort -->
        {{-- <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
            <p class="text-gray-600 dark:text-gray-400 mb-4 sm:mb-0"><span class="font-semibold">{{ $trip_routes->count() }}</span> trip_routes found</p>

            <div class="flex items-center">
                <label for="sort" class="mr-2 text-gray-700 dark:text-gray-300">Sort by:</label>
                <select id="sort" class="px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-900 dark:text-white">
                    <option value="recommended">Recommended</option>
                    <option value="price-low">Price: Low to High</option>
                    <option value="price-high">Price: High to Low</option>

                </select>
            </div>
        </div>
         --}}
        <!-- trip_route Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">


            @foreach ($trip_routes as $trip_route)


            <div class="overflow-hidden shadow-lg destination-card group rounded-2xl bg-white dark:bg-gray-800"

            onclick="redirect('{{ route('user.trip_rotue_rent', $trip_route->id) }}')"

            >
                <div class="relative overflow-hidden">
                    <img src="{{ $trip_route->image }}"
                        alt="Luxury trip_route" class="object-cover w-full h-64 transition duration-300 group-hover:scale-105">
                    <div class="absolute inset-0 transition-colors bg-black/25 group-hover:bg-black/40"></div>
                    <div class="absolute text-white bottom-4 left-4">
                        <h3 class="text-xl font-bold">{{ $trip_route->name }}</h3>
                        <p class="text-sm">{{$trip_route->location}}</p>
                        <p class="text-sm">${{ $trip_route->amount }} per trip</p>
                    </div>
                </div>
            </div>

            @endforeach










        </div>

        {{-- <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <nav class="inline-flex rounded-md shadow">
                <a href="#" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-l-md hover:bg-gray-50 dark:hover:bg-gray-700">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#" class="px-4 py-2 bg-blue-500 dark:bg-blue-600 text-white border border-blue-500 dark:border-blue-600">1</a>
                <a href="#" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">2</a>
                <a href="#" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">3</a>
                <a href="#" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-r-md hover:bg-gray-50 dark:hover:bg-gray-700">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
        </div> --}}
    </div>

 <script>
     function redirect(url) {
    window.location.href = url;
}
 </script>


</div>
