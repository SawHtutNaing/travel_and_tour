<body class="bg-slate-100 dark:bg-slate-900">
    <div class="flex min-h-screen">


        <!-- Main Content -->
        <main class="flex-1 ">
            <!-- Top Navigation -->
            <header
                class="sticky top-0 z-40 flex items-center h-16 gap-4 px-4 bg-white border-b border-slate-200 dark:border-slate-700 dark:bg-slate-800">
                <button onclick="toggleSidebar()"
                    class="p-2 rounded-lg lg:hidden hover:bg-slate-100 dark:hover:bg-slate-700">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Search -->
                <div class="flex items-center flex-1 gap-4">
                    <div class="relative flex-1 max-w-md">
                        <i class="absolute -translate-y-1/2 fas fa-search left-3 top-1/2 text-slate-400"></i>
                        <input type="search" placeholder="Search..."
                            class="w-full py-2 pl-10 pr-4 border rounded-lg border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500">
                    </div>
                </div>

                <!-- Right Navigation -->
                <div class="flex items-center gap-4">
                    <button class="relative p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700">
                        <i class="fas fa-bell text-slate-500 dark:text-slate-400"></i>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <button class="relative p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700">
                        <i class="fas fa-envelope text-slate-500 dark:text-slate-400"></i>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="p-4 space-y-6 lg:p-6">
                <!-- Stats Grid -->
                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                    <!-- Total Bookings -->
                    <div class="p-6 bg-white shadow-sm dark:bg-slate-800 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-sm font-medium text-slate-600 dark:text-slate-400">Total Bookings</h3>
                            <span class="p-2 text-teal-500 rounded-lg bg-teal-50 dark:bg-teal-500/10">
                                <i class="fas fa-ticket-alt"></i>
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-2xl font-bold text-slate-900 dark:text-white">2,856</p>
                                <p class="text-sm text-green-500"><i class="fas fa-arrow-up"></i> +14.5%</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Revenue -->
                    <div class="p-6 bg-white shadow-sm dark:bg-slate-800 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-sm font-medium text-slate-600 dark:text-slate-400">Total Revenue</h3>
                            <span class="p-2 text-blue-500 rounded-lg bg-blue-50 dark:bg-blue-500/10">
                                <i class="fas fa-dollar-sign"></i>
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-2xl font-bold text-slate-900 dark:text-white">$186.2k</p>
                                <p class="text-sm text-green-500"><i class="fas fa-arrow-up"></i> +8.1%</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Customers -->
                    <div class="p-6 bg-white shadow-sm dark:bg-slate-800 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-sm font-medium text-slate-600 dark:text-slate-400">Total Customers</h3>
                            <span class="p-2 text-purple-500 rounded-lg bg-purple-50 dark:bg-purple-500/10">
                                <i class="fas fa-users"></i>
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-2xl font-bold text-slate-900 dark:text-white">3,486</p>
                                <p class="text-sm text-green-500"><i class="fas fa-arrow-up"></i> +12.4%</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Tours -->
                    <div class="p-6 bg-white shadow-sm dark:bg-slate-800 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-sm font-medium text-slate-600 dark:text-slate-400">Total Tours</h3>
                            <span class="p-2 text-orange-500 rounded-lg bg-orange-50 dark:bg-orange-500/10">
                                <i class="fas fa-map-marked-alt"></i>
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-2xl font-bold text-slate-900 dark:text-white">186</p>
                                <p class="text-sm text-green-500"><i class="fas fa-arrow-up"></i> +4.7%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Grid -->
                <div class="grid gap-4 md:grid-cols-2">
                    <!-- Revenue Chart -->
                    <div class="p-6 bg-white shadow-sm dark:bg-slate-800 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-base font-semibold text-slate-900 dark:text-white">Revenue Overview</h3>
                            <select
                                class="px-2 py-1 text-sm bg-transparent border rounded-lg border-slate-200 dark:border-slate-700">
                                <option>Last 7 Days</option>
                                <option>Last 30 Days</option>
                                <option>Last 90 Days</option>
                            </select>
                        </div>
                        <canvas id="revenueChart" height="300"></canvas>
                    </div>

                    <!-- Bookings Chart -->
                    <div class="p-6 bg-white shadow-sm dark:bg-slate-800 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-base font-semibold text-slate-900 dark:text-white">Bookings Analytics</h3>
                            <select
                                class="px-2 py-1 text-sm bg-transparent border rounded-lg border-slate-200 dark:border-slate-700">
                                <option>Last 7 Days</option>
                                <option>Last 30 Days</option>
                                <option>Last 90 Days</option>
                            </select>
                        </div>
                        <canvas id="bookingsChart" height="300"></canvas>
                    </div>
                </div>

                <!-- Recent Bookings Table -->
                <div class="bg-white shadow-sm dark:bg-slate-800 rounded-xl">
                    <div class="flex items-center justify-between p-6 border-b border-slate-200 dark:border-slate-700">
                        <h3 class="text-base font-semibold text-slate-900 dark:text-white">Recent Bookings</h3>
                        <button class="text-sm text-teal-500 hover:text-teal-600 dark:hover:text-teal-400">View
                            All</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left border-b border-slate-200 dark:border-slate-700">
                                    <th class="px-6 py-3 text-sm font-semibold text-slate-900 dark:text-white">Customer
                                    </th>
                                    <th class="px-6 py-3 text-sm font-semibold text-slate-900 dark:text-white">
                                        Destination</th>
                                    <th class="px-6 py-3 text-sm font-semibold text-slate-900 dark:text-white">Date
                                    </th>
                                    <th class="px-6 py-3 text-sm font-semibold text-slate-900 dark:text-white">Amount
                                    </th>
                                    <th class="px-6 py-3 text-sm font-semibold text-slate-900 dark:text-white">Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-slate-200 dark:border-slate-700">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <img src="https://ui-avatars.com/api/?name=John+Doe" alt="John Doe"
                                                class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="text-sm font-medium text-slate-900 dark:text-white">John Doe
                                                </p>
                                                <p class="text-sm text-slate-500 dark:text-slate-400">john@example.com
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Bali, Indonesia
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Oct 24, 2023</td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">$1,200</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-500/10 dark:text-green-500">
                                            Confirmed
                                        </span>
                                    </td>
                                </tr>
                                <tr class="border-b border-slate-200 dark:border-slate-700">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <img src="https://ui-avatars.com/api/?name=Sarah+Smith" alt="Sarah Smith"
                                                class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="text-sm font-medium text-slate-900 dark:text-white">Sarah
                                                    Smith</p>
                                                <p class="text-sm text-slate-500 dark:text-slate-400">sarah@example.com
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Paris, France</td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Oct 23, 2023</td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">$2,400</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-500/10 dark:text-yellow-500">
                                            Pending
                                        </span>
                                    </td>
                                </tr>
                                <tr class="border-b border-slate-200 dark:border-slate-700">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <img src="https://ui-avatars.com/api/?name=Mike+Johnson"
                                                alt="Mike Johnson" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="text-sm font-medium text-slate-900 dark:text-white">Mike
                                                    Johnson</p>
                                                <p class="text-sm text-slate-500 dark:text-slate-400">mike@example.com
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Tokyo, Japan</td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Oct 22, 2023</td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">$3,100</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-500/10 dark:text-blue-500">
                                            In Progress
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Bookings Chart
        //     const bookingsCtx = document.getElementById('bookingsChart').getContext('2d');
        //     window.bookingsChart = new Chart(bookingsCtx, {
        //         type: 'bar',
        //         data: {
        //             labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        //             datasets: [{
        //                 label: 'Bookings',
        //                 data: [65, 59, 80, 81, 56, 55, 40],
        //                 backgroundColor: '#0d9488',
        //                 borderRadius: 4
        //             }]
        //         },
        //         options: {
        //             responsive: true,
        //             maintainAspectRatio: false,
        //             plugins: {
        //                 legend: {
        //                     display: false
        //                 }
        //             },
        //             scales: {
        //                 y: {
        //                     beginAtZero: true,
        //                     grid: {
        //                         color: isDark ? 'rgba(148, 163, 184, 0.1)' : 'rgba(148, 163, 184, 0.2)'
        //                     },
        //                     ticks: {
        //                         color: textColor
        //                     }
        //                 },
        //                 x: {
        //                     grid: {
        //                         display: false
        //                     },
        //                     ticks: {
        //                         color: textColor
        //                     }
        //                 }
        //             }
        //         }
        //     });
        // }

        // Update charts when switching themes
        // function updateCharts() {
        //     if (window.revenueChart) window.revenueChart.destroy();
        //     if (window.bookingsChart) window.bookingsChart.destroy();
        //     initializeCharts();
        // }

        // // Initialize charts on page load
        // initializeCharts();
    </script>
</body>

</html>
