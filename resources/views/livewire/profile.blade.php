<div class=" bg-white dark:bg-gray-800   mt-10     mx-auto px-4 py-8">
    <header class="">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">My Profile</h1>
        <p class="text-gray-600 dark:text-gray-300">Manage your account information and password</p>
    </header>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                <div class="flex flex-col items-center">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 rounded-full overflow-hidden bg-gray-200 dark:bg-gray-700">
                            @if ($newImage)
                            <img src="{{ $newImage->temporaryUrl() }}" class="w-full h-full object-cover">
                        @elseif ($image)
                            <img src="{{ asset('storage/' . $image) }}" class="w-full h-full object-cover">
                        @else
                            <img src="https://via.placeholder.com/150" class="w-full h-full object-cover">
                        @endif
                        
                        </div>
                        <label class="absolute bottom-0 right-0 bg-blue-500 hover:bg-blue-600 text-white rounded-full p-2 cursor-pointer shadow-lg transition-colors">
                            <i class="fas fa-camera"></i>
                            <input type="file" wire:model="newImage" class="hidden" accept="image/*">
                        </label>
                    </div>

                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-1">{{ $name }}</h2>
                    <p class="text-gray-500 dark:text-gray-300 mb-4">{{ $email }}</p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Profile Info -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-6"><i class="fas fa-user mr-2 text-blue-500"></i> Profile Information</h2>

                @if ($profileUpdated)
                    <div class="bg-green-100 dark:bg-green-900 border border-green-200 dark:border-green-700 text-green-700 dark:text-green-300 px-4 py-3 rounded-lg mb-4">
                        <p><strong>Success!</strong> Your profile has been updated.</p>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"> Name</label>
                        <input type="text" wire:model.defer="name" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring focus:ring-blue-500">
                    </div>
                  
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                    <input type="email" wire:model.defer="email" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring focus:ring-blue-500">
                </div>

               

                <div class="flex justify-end mt-6">
                    <button wire:click="saveProfile" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Save Changes</button>
                </div>
            </div>

            <!-- Password -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-6">
                    <i class="fas fa-lock mr-2 text-blue-500"></i> Security
                </h2>
            
                @if ($passwordUpdated)
                    <div class="bg-green-100 dark:bg-green-900 border border-green-200 dark:border-green-700 text-green-700 dark:text-green-300 px-4 py-3 rounded-lg mb-4">
                        <p><strong>Success!</strong> Password updated successfully.</p>
                    </div>
                @endif
            
                <!-- Current Password -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Current Password</label>
                    <input type="password" wire:model.defer="current_password" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring focus:ring-blue-500">
                    @error('current_password')
                        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>
            
                <!-- New Password -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">New Password</label>
                    <input type="password" wire:model.defer="new_password" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring focus:ring-blue-500">
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Must be 8+ characters with number and special character.</p>
                    @error('new_password')
                        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>
            
                <!-- Confirm Password -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Confirm Password</label>
                    <input type="password" wire:model.defer="confirm_password" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring focus:ring-blue-500">
                    @error('confirm_password')
                        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>
            
                <!-- Button -->
                <div class="flex justify-end">
                    <button wire:click="updatePassword" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Update Password</button>
                </div>
            </div>
            
        </div>
    </div>
</div>
