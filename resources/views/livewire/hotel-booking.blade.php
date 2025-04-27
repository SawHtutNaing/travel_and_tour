<div class="min-h-screen mt-10 p-6 bg-slate-50 dark:bg-slate-900">
    <div class="">
        <!-- Header -->
        <div class="my-5">
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Book This Hotel</h1>
            <p class="text-slate-500 dark:text-slate-400">Choose your dates and confirm your booking</p>
        </div>

        <!-- Booking Form Card -->
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm p-6">
            <form class="space-y-6" wire:submit.prevent="bookHotel">
                <!-- Total Amount -->
                <div>
                    <label for="total_amount"

                        class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                        Total Amount <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">$</span>
                        <input type="number" id="total_amount" name="total_amount" required min="0"

                            wire:model.live="total_amount" 
                            class="w-full pl-8 pr-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg
                                   focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent
                                   bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400"
                            placeholder="Enter total amount">
                    </div>
                    @error('total_amount')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Start Date -->
                <div>
                    <label for="start_date"
                        class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                        Start Date <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="start_date" name="start_date" required wire:model.live="start_date"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg
                               focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent
                               bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400">
                    @error('start_date')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- End Date -->
                <div>
                    <label for="end_date"
                        class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                        End Date <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="end_date" name="end_date" required wire:model.live="end_date"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg
                               focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent
                               bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400">
                    @error('end_date')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between">
                    <button type="button" onclick="redirect('{{ route('index') }}')"
                        class="px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg
                               text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700
                               focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600
                               focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                        Book Now
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
function redirect(url) {
    window.location.href = url;
} 
    </script>
</div>
