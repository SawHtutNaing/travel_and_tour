<div>

<div>

    @livewireStyles
    <!-- Include ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</div>
<div class="h-full">
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Dashboard</h1>
            <button
                onclick="document.documentElement.classList.toggle('dark'); updateCharts();"
                class="p-2 rounded-full bg-gray-200 dark:bg-gray-700"
            >
                <span class="dark:hidden">🌙</span>
                <span class="hidden dark:inline">☀️</span>
            </button>
        </div>

        <div class="mb-6 flex space-x-4 items-end">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Start Date
                </label>
                <input
                    type="date"
                    wire:model.deferred="start_date"
                    class="p-2 border rounded-md bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white"
                />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    End Date
                </label>
                <input
                    type="date"
                    wire:model.deferred="end_date"
                    class="p-2 border rounded-md bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white"
                />
            </div>
            <div>
                <button
                    wire:click="applyDateRange"
                    class="p-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
                >
                    Apply
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Hotel Bookings Chart -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <h2 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Hotel Bookings</h2>
                <div id="hotelChart"></div>
            </div>

            <!-- Trip Routes Chart -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <h2 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Trip Routes</h2>
                <div id="tripRouteChart"></div>
            </div>

            <!-- Packages Chart -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <h2 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Packages</h2>
                <div id="packageChart"></div>
            </div>

            <!-- Vehicle Rents Chart -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <h2 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Vehicle Rents</h2>
                <div id="vehicleRentChart"></div>
            </div>
        </div>
    </div>

    <!-- Pass chart data to JavaScript -->
    <script>
        window.hotelChartData = @json($hotelChartData);
        window.tripRouteChartData = @json($tripRouteChartData);
        window.packageChartData = @json($packageChartData);
        window.vehicleRentChartData = @json($vehicleRentChartData);
    </script>

    <!-- ApexCharts initialization script -->
    <script>
        let charts = {
            hotelChart: null,
            tripRouteChart: null,
            packageChart: null,
            vehicleRentChart: null,
        };

        function initCharts() {
            // Validate chart data
            const chartData = [
                { name: 'hotelChartData', data: window.hotelChartData },
                { name: 'tripRouteChartData', data: window.tripRouteChartData },
                { name: 'packageChartData', data: window.packageChartData },
                { name: 'vehicleRentChartData', data: window.vehicleRentChartData },
            ];

            for (const { name, data } of chartData) {
                if (!data || !data.labels) {
                    console.error(`Chart data for ${name} is invalid or missing`);
                    return;
                }
            }

            // Chart options factory
            function getChartOptions(labels, series, dualAxis = false) {
                const isDark = document.documentElement.classList.contains('dark');
                return {
                    chart: {
                        type: 'bar',
                        height: 300,
                        toolbar: { show: false },
                    },
                    series,
                    xaxis: {
                        categories: labels,
                        labels: { style: { colors: isDark ? '#fff' : '#000' } },
                    },
                    yaxis: dualAxis ? [
                        {
                            title: { text: 'Count', style: { color: isDark ? '#fff' : '#000' } },
                            labels: { style: { colors: isDark ? '#fff' : '#000' } },
                        },
                        {
                            opposite: true,
                            title: { text: 'Amount ($)', style: { color: isDark ? '#fff' : '#000' } },
                            labels: { style: { colors: isDark ? '#fff' : '#000' } },
                        },
                    ] : {
                        title: { text: 'Count', style: { color: isDark ? '#fff' : '#000' } },
                        labels: { style: { colors: isDark ? '#fff' : '#000' } },
                    },
                    colors: ['#3b82f6', '#10b981'],
                    grid: { borderColor: isDark ? 'rgba(255,255,255,0.1)' : 'rgba(0,0,0,0.1)' },
                    theme: { mode: isDark ? 'dark' : 'light' },
                };
            }

            // Initialize or update charts
            if (!charts.hotelChart) {
                charts.hotelChart = new ApexCharts(document.querySelector('#hotelChart'), getChartOptions(
                    window.hotelChartData.labels,
                    [
                        { name: 'Bookings', data: window.hotelChartData.counts },
                        { name: 'Amount ($)', data: window.hotelChartData.amounts },
                    ],
                    true
                ));
                charts.hotelChart.render();
            } else {
                charts.hotelChart.updateOptions(getChartOptions(
                    window.hotelChartData.labels,
                    [
                        { name: 'Bookings', data: window.hotelChartData.counts },
                        { name: 'Amount ($)', data: window.hotelChartData.amounts },
                    ],
                    true
                ));
            }

            if (!charts.tripRouteChart) {
                charts.tripRouteChart = new ApexCharts(document.querySelector('#tripRouteChart'), getChartOptions(
                    window.tripRouteChartData.labels,
                    [{ name: 'Trip Routes', data: window.tripRouteChartData.counts }]
                ));
                charts.tripRouteChart.render();
            } else {
                charts.tripRouteChart.updateOptions(getChartOptions(
                    window.tripRouteChartData.labels,
                    [{ name: 'Trip Routes', data: window.tripRouteChartData.counts }]
                ));
            }

            if (!charts.packageChart) {
                charts.packageChart = new ApexCharts(document.querySelector('#packageChart'), getChartOptions(
                    window.packageChartData.labels,
                    [
                        { name: 'Packages', data: window.packageChartData.counts },
                        { name: 'Amount ($)', data: window.packageChartData.amounts },
                    ],
                    true
                ));
                charts.packageChart.render();
            } else {
                charts.packageChart.updateOptions(getChartOptions(
                    window.packageChartData.labels,
                    [
                        { name: 'Packages', data: window.packageChartData.counts },
                        { name: 'Amount ($)', data: window.packageChartData.amounts },
                    ],
                    true
                ));
            }

            if (!charts.vehicleRentChart) {
                charts.vehicleRentChart = new ApexCharts(document.querySelector('#vehicleRentChart'), getChartOptions(
                    window.vehicleRentChartData.labels,
                    [
                        { name: 'Vehicle Rents', data: window.vehicleRentChartData.counts },
                        { name: 'Amount ($)', data: window.vehicleRentChartData.amounts },
                    ],
                    true
                ));
                charts.vehicleRentChart.render();
            } else {
                charts.vehicleRentChart.updateOptions(getChartOptions(
                    window.vehicleRentChartData.labels,
                    [
                        { name: 'Vehicle Rents', data: window.vehicleRentChartData.counts },
                        { name: 'Amount ($)', data: window.vehicleRentChartData.amounts },
                    ],
                    true
                ));
            }
        }

        function updateCharts() {
            initCharts(); // Reuse initCharts for updates
        }

        // Initialize charts after Livewire loads
        document.addEventListener('livewire:init', () => {
            initCharts();
        });
    </script>

    @livewireScripts
</div>


</div>
