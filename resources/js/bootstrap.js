import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';



function toggleDarkMode() {
    document.documentElement.classList.toggle('dark');
    localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
    updateCharts(); // Update charts when switching themes
}

// Check for saved dark mode preference
if (localStorage.getItem('darkMode') === 'true' ||
    (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
}

// Sidebar toggle for mobile
function toggleSidebar() {

    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('lg:translate-x-0');
    // sidebar.classList.toggle('-translate-x-full');
    sidebar.classList.toggle('-translate-x-4/5');
}

window.toggleSidebar = toggleSidebar;
window.toggleDarkMode = toggleDarkMode;

// // Initialize Charts
// function initializeCharts() {
//     // Revenue Chart
//     const revenueCtx = document.getElementById('revenueChart').getContext('2d');
//     const isDark = document.documentElement.classList.contains('dark');
//     const textColor = isDark ? '#94a3b8' : '#475569';

//     window.revenueChart = new Chart(revenueCtx, {
//         type: 'line',
//         data: {
//             labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
//             datasets: [{
//                 label: 'Revenue',
//                 data: [4200, 5300, 4800, 6200, 5800, 7200, 6800],
//                 borderColor: '#0d9488',
//                 backgroundColor: 'rgba(13, 148, 136, 0.1)',
//                 fill: true,
//                 tension: 0.4
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
//                         color: isDark ? 'rgba(148, 163, 184, 0.1)' : 'rgba(148, 163, 184, 0.2)'
//                     },
//                     ticks: {
//                         color: textColor
//                     }
//                 }
//             }
//         }
//     });
