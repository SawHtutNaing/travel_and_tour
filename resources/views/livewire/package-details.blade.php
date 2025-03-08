<div>

    <body class="bg-slate-50 dark:bg-slate-900">
        <div class="min-h-screen p-6">
            <div class=" mx-auto">
                <!-- Header -->
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Add New Package</h1>
                    <p class="text-slate-500 dark:text-slate-400">Fill in the details to add a new package to the
                        system
                    </p>
                </div>

                <!-- Form Card -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm p-6">
                    <form class="space-y-6" wire:submit.prevent='save'>
                        <!-- Trip Route Name -->
                        <div>
                            <label for="name"
                                class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                                Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" required wire:model='name'
                                class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400"
                                placeholder="Enter trip name">
                            @error('name')
                                <p class="mt-1 text-sm text-red-500" id="nameError">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="description"
                                class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                                description <span class="text-red-500">*</span>
                            </label>
                            <textarea id="description" name="description" required rows="3" wire:model='description'
                                class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400"
                                placeholder="Enter detailed hotel description"></textarea>
                            @error('description')
                                <p class=" mt-1 text-sm text-red-500" id="nameError">{{ $message }}</p>
                            @enderror
                        </div>



                        <!-- Location -->


                        <!-- Amount per Day -->
                        <div>
                            <label for="total_amount"
                                class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                                Total Amount <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">$</span>
                                <input type="number" id="total_amount" name="total_amount" required min="0"
                                    wire:model='total_amount' step="0.01"
                                    class="w-full pl-8 pr-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400"
                                    placeholder="0.00">
                            </div>
                            @error('total_amount')
                                <p class="mt-1 text-sm text-red-500" id="total_amount_Error">{{ $message }}</p>
                            @enderror
                        </div>


                        <div>
                            <label for="start_location"
                                class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">

                                Start Location <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="start_location" name="start_location" required
                                wire:model='start_location'
                                class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400"
                                placeholder="Enter Start Point ">
                            @error('start_location')
                                <p class="mt-1 text-sm text-red-500" id="nameError">{{ $message }}</p>
                            @enderror
                        </div>



                        <div>
                            <label for="Location"
                                class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">

                                End Location <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="Location" name="Location" required wire:model='end_location'
                                class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400"
                                placeholder="Enter End Point ">
                            @error('end_location')
                                <p class="mt-1 text-sm text-red-500" id="nameError">{{ $message }}</p>
                            @enderror
                        </div>






                        <!-- Image Upload -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                                Package Image <span class="text-red-500">*</span>
                            </label>
                            <!-- Image Preview -->
                            <div class="mb-4">
                                @if ($imagePreview)
                                    <div
                                        class="relative w-full h-64 rounded-lg border-2 border-dashed border-slate-300 dark:border-slate-600 overflow-hidden">
                                        <img src="{{ $imagePreview }}" class="w-full h-full object-cover">
                                        <button type="button" wire:click='removeImage'
                                            class="absolute top-2 right-2 p-2 rounded-full bg-red-500 text-white hover:bg-red-600">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>

                            <!-- File Input -->
                            <input type="file" id="image" name="image" accept="image/*" wire:model='image'
                                class="w-full text-sm text-slate-700 dark:text-slate-300 border border-slate-300 dark:border-slate-600 rounded-lg py-2 px-4 focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400">
                            @error('image')
                                <p class="mt-1 text-sm text-red-500" id="imageError">{{ $message }}</p>
                            @enderror
                        </div>


                        <h3 class="mt-6 text-lg font-bold dark:text-white  text-black">Assign Hotels</h3>
                        <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <!-- Table Header -->
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th  class="px-4  py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                            Hotel Name
                                        </th>
                                        <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                            Days
                                        </th>
                                        <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                            Start Date
                                        </th>
                                        <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                            End Date
                                        </th>
                                        <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                            Actual Amount
                                        </th>
                                        <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                            Amount
                                        </th>
                                        <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                            Action
                                        </th>
                                    </tr>
                                </thead>

                                <!-- Table Body -->
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($hotels as $index => $hotel)
                                    <tr class="hover:bg-gray-50  text-black dark:text-white dark:hover:bg-gray-700/50 transition-colors">
                                        <td class=" " >
                                            <select
                                                wire:model.live="hotels.{{ $index }}.hotel_id"
                                                class="w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 dark:focus:ring-blue-400/20 outline-none transition-shadow"
                                            >
                                                <option value="">Select Hotel</option>
                                                @foreach ($availableHotels as $hotel)
                                                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class=" ">
                                            <input
                                                type="text"
                                                disabled
                                                wire:model.live="hotels.{{ $index }}.days"
                                                min="1"
                                                placeholder="Days"
                                            >
                                        </td>
                                        <td class=" ">
                                            <input
                                                type="date"

                                                wire:model.live="hotels.{{ $index }}.start_date"
                                                class="w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 dark:focus:ring-blue-400/20 outline-none transition-shadow"
                                            >
                                        </td>
                                        <td class=" ">
                                            <input
                                                type="date"

                                                wire:model.live="hotels.{{ $index }}.end_date"
                                                class="w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 dark:focus:ring-blue-400/20 outline-none transition-shadow"
                                            >
                                        </td>
                                        <td class=" ">
                                            <div class="relative">
                                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">$</span>
                                                <input
                                                    type="number"
                                                    disabled
                                                    wire:model.live="hotels.{{ $index }}.actual_amount"
                                                    class="w-full pl-8 pr-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 dark:focus:ring-blue-400/20 outline-none transition-shadow"
                                                    min="0"
                                                    step="0.01"
                                                    placeholder="0.00"
                                                >
                                            </div>
                                        </td>
                                        <td class=" ">
                                            <div class="relative">
                                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">$</span>
                                                <input
                                                disabled
                                                    type="number"
                                                    wire:model.live="hotels.{{ $index }}.amount"
                                                    class="w-full pl-8 pr-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 dark:focus:ring-blue-400/20 outline-none transition-shadow"
                                                    min="0"
                                                    step="0.01"
                                                    placeholder="0.00"
                                                >
                                            </div>
                                        </td>
                                        <td class=" ">
                                            <button
                                                type="button"
                                                wire:click="removeHotelRow({{ $index }})"
                                                class="inline-flex items-center justify-center p-2 rounded-lg text-red-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/10 focus:outline-none focus:ring-2 focus:ring-red-500/20 transition-colors"
                                                title="Remove Row"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Add New Row Button -->
                            <div class="p-4 border-t border-gray-200 dark:border-gray-700">
                                <button
                                    type="button"
                                    wire:click="addHotelRow"
                                    class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                    Add Hotel
                                </button>
                            </div>
                        </div>
                        {{-- <button type="button" wire:click="addHotelRow" class="mt-2 text-blue-500">+ Add Hotel</button> --}}

                        {{-- <button type="submit" class="mt-4 bg-teal-500 text-white p-2 rounded">Save Package</button> --}}



                    {{-- assign triproute  --}}



                    <h3 class="mt-6 text-lg font-bold dark:text-white  text-black">Assign Trip Route</h3>
                    <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <!-- Table Header -->
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th  class="px-4  py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                        Name
                                    </th>
                                    <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                        Amount
                                    </th>


                                    <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">

                                        Date
                                    </th>

                                    <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">

                                        Action
                                    </th>





                                </tr>
                            </thead>

                            <!-- Table Body -->
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($tripRoutes as $index => $tripRoute)
                                <tr class="hover:bg-gray-50  text-black dark:text-white dark:hover:bg-gray-700/50 transition-colors">
                                    <td class=" " >
                                        <select
                                            wire:model="tripRoutes.{{ $index }}.trip_route_id"
                                            class="w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 dark:focus:ring-blue-400/20 outline-none transition-shadow"
                                        >
                                            <option value="">Select tripRoute</option>
                                            @foreach ($allTripRoutes as $avaTripRoute)
                                                <option value="{{ $avaTripRoute->id }}">{{ $avaTripRoute->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class=" ">
                                        <div class="relative">
                                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">$</span>
                                            <input
                                                type="number"
                                                wire:model="tripRoutes.{{ $index }}.amount"
                                                class="w-full pl-8 pr-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 dark:focus:ring-blue-400/20 outline-none transition-shadow"
                                                min="0"
                                                step="0.01"
                                                placeholder="0.00"
                                            >
                                        </div>
                                    </td>
                                    <td class=" ">
                                        <input
                                            type="date"
                                            wire:model="tripRoutes.{{ $index }}.date"
                                            class="w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 dark:focus:ring-blue-400/20 outline-none transition-shadow"
                                        >
                                    </td>

                                    <td class=" ">
                                        <button
                                            type="button"
                                            wire:click="removeHotelRow({{ $index }})"
                                            class="inline-flex items-center justify-center p-2 rounded-lg text-red-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/10 focus:outline-none focus:ring-2 focus:ring-red-500/20 transition-colors"
                                            title="Remove Row"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Add New Row Button -->
                        <div class="p-4 border-t border-gray-200 dark:border-gray-700">
                            <button
                                type="button"
                                wire:click="addTripRouteRow"
                                class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                Add Trip Route
                            </button>
                        </div>
                    </div>






                        <!-- Submit Button -->
                        <div class="flex space-x-4">
                            <button type="button" onclick="window.history.back()"
                                class="px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</div>
