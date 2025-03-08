<div>

    <body class="bg-slate-50 dark:bg-slate-900">
        <div class="min-h-screen p-6">
            <div class="max-w-3xl mx-auto">
                <!-- Header -->
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Add New Journey Route</h1>
                    <p class="text-slate-500 dark:text-slate-400">Fill in the details to add a new journey route to the
                        system
                    </p>
                </div>

                <!-- Form Card -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm p-6">
                    <form class="space-y-6" wire:submit.prevent='save'>
                        <!-- Hotel Name -->
                        <div>
                            <label for="point_one"
                                class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                                From <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="point_one" name="point_one" required wire:model='point_one'
                                class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400"
                                placeholder="Enter Location">
                            @error('point_one')
                                <p class=" mt-1 text-sm text-red-500" id="nameError">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Location -->
                        <div>
                            <label for="point_two"
                                class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                                To <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="point_two" name="point_two" required wire:model='point_two'
                                class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400"
                                placeholder="Enter Location">
                            @error('point_two')
                                <p class=" mt-1 text-sm text-red-500" id="nameError">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Amount per Day -->
                        <div>
                            <label for="distance"
                                class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                                Distance <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">km</span>
                                <input type="number" id="distance" name="distance" required min="0"
                                    wire:model='distance' step="0.01"
                                    class="w-full pl-8 pr-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400"
                                    placeholder="0.00">
                            </div>
                            @error('amount_per_day')
                                <p class=" mt-1 text-sm text-red-500" id="nameError">{{ $message }}</p>
                            @enderror

                        </div>
                        <!-- Submit Button -->

                        <button type="button" onclick="window.history.back()"
                            class="px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                            Create Journey Route
                        </button>

                    </form>
                </div>
            </div>
        </div>

    </body>

</div>
