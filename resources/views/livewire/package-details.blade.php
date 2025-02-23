<div>

    <body class="bg-slate-50 dark:bg-slate-900">
        <div class="min-h-screen p-6">
            <div class="max-w-3xl mx-auto">
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

                        <!-- Submit Button -->
                        <div class="flex space-x-4">
                            <button type="button" onclick="window.history.back()"
                                class="px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                Create Package
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</div>
