<div>

    <body class="bg-slate-50 dark:bg-slate-900">
        <div class="min-h-screen p-6">
            <div class="max-w-3xl mx-auto">
                <!-- Header -->
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Add New Hotel</h1>
                    <p class="text-slate-500 dark:text-slate-400">Fill in the details to add a new hotel to the system
                    </p>
                </div>

                <!-- Form Card -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm p-6">
                    <form class="space-y-6" wire:submit.prevent='save'>
                        <!-- Hotel Name -->
                        <div>
                            <label for="name"
                                class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                                Hotel Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" required wire:model='hotel_name'
                                class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400"
                                placeholder="Enter hotel name">
                            @error('hotel_name')
                                <p class=" mt-1 text-sm text-red-500" id="nameError">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Location -->
                        <div>
                            <label for="location"
                                class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                                Location <span class="text-red-500">*</span>
                            </label>
                            <textarea id="location" name="location" required rows="3" wire:model='hotel_location'
                                class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400"
                                placeholder="Enter detailed hotel location"></textarea>
                            @error('hotel_location')
                                <p class=" mt-1 text-sm text-red-500" id="nameError">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Amount per Day -->
                        <div>
                            <label for="amount"
                                class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                                Amount per Day <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">$</span>
                                <input type="number" id="amount" name="amount_per_day" required min="0"
                                    wire:model='amount_per_day' step="0.01"
                                    class="w-full pl-8 pr-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400"
                                    placeholder="0.00">
                            </div>
                            @error('amount_per_day')
                                <p class=" mt-1 text-sm text-red-500" id="nameError">{{ $message }}</p>
                            @enderror

                        </div>

                        <div>
                            <label for="price_adjustment"
                                class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                                Price Adjustment <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">$</span>
                                <input type="number" id="price_adjustment" name="price_adjustment" required
                                    min="0" wire:model='price_adjustment' step="0.01"
                                    class="w-full pl-8 pr-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400"
                                    placeholder="0.00">
                            </div>
                            @error('price_adjustment')
                                <p class=" mt-1 text-sm text-red-500" id="nameError">{{ $message }}</p>
                            @enderror

                        </div>


                        <div>
                            <label for="adjustment_type"
                                class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                                Adjustment Type <span class="text-red-500">*</span>
                            </label>

                            <select id="adjustment_type" name="adjustment_type" wire:model="adjustment_type"
                                class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg
                                       focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent
                                       bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400">

                                <option value="">Select a Adjustment Type</option>
                                <option value="1">Discount</option>
                                <option value="2">Mark Up </option>


                            </select>

                            @error('adjustment_type')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>





                        <!-- Image Upload -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                                Hotel Image <span class="text-red-500">*</span>
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
                            <input type="file" id="image" name="image" accept="image/*"
                                wire:model='hotel_image' class="">
                            <!-- Image Preview -->




                            @error('hotel_image')
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
                            Create Hotel
                        </button>

                    </form>
                </div>
            </div>
        </div>

        {{-- <script>
            // Image preview functionality
            function previewImage(input) {
                const preview = document.getElementById('preview');
                const imagePreview = document.getElementById('imagePreview');
                const uploadBox = document.getElementById('uploadBox');
                const file = input.files[0];

                if (file) {
                    // Validate file type
                    const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                    if (!validTypes.includes(file.type)) {
                        alert('Please upload a valid image file (PNG, JPG or JPEG)');
                        input.value = '';
                        return;
                    }

                    // Validate file size (2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        alert('File size should be less than 2MB');
                        input.value = '';
                        return;
                    }

                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                        uploadBox.classList.add('hidden');
                    }

                    reader.readAsDataURL(file);
                }
            }

            // Remove image preview
            function removeImage() {
                const input = document.getElementById('image');
                const imagePreview = document.getElementById('imagePreview');
                const uploadBox = document.getElementById('uploadBox');

                input.value = '';
                imagePreview.classList.add('hidden');
                uploadBox.classList.remove('hidden');
            }


            // Drag and drop functionality
            const dropZone = document.querySelector('label[for="image"]');

            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                dropZone.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, unhighlight, false);
            });

            function highlight(e) {
                dropZone.classList.add('border-teal-500');
            }

            function unhighlight(e) {
                dropZone.classList.remove('border-teal-500');
            }

            dropZone.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                const input = document.getElementById('image');

                input.files = files;
                previewImage(input);
            }
        </script> --}}
    </body>

</div>
