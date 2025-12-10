# Chart.js Integration Guide for Dashboards

## 📊 Adding Beautiful Charts to Company Dashboard & Admin Dashboard

### Step 1: Add Chart.js CDN

Add this to the `<head>` section or before the closing `</body>` tag in your layout file (`resources/views/layouts/app.blade.php`):

```html
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
```

### Step 2: Company Dashboard Charts

#### Replace the chart sections in `resources/views/company/dashboard.blade.php`:

**Line ~100-160: Replace Applications per Category section with:**
```blade
<!-- Applications per Category Chart -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('Applications per Category') }}</h3>
    </div>
    <div class="p-6">
        <canvas id="categoryChart" style="max-height: 300px;"></canvas>
    </div>
</div>
```

**Line ~163-208: Replace Applications Trend section with:**
```blade
<!-- Applications Trend Chart -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('Applications Trend (Last 7 Days)') }}</h3>
    </div>
    <div class="p-6">
        <canvas id="trendChart" style="max-height: 300px;"></canvas>
    </div>
</div>
```

#### Add this script before the closing `</x-app-layout>` tag:

```blade
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Check if dark mode is enabled
    const isDarkMode = document.documentElement.classList.contains('dark');
    const textColor = isDarkMode ? '#E5E7EB' : '#374151';
    const gridColor = isDarkMode ? '#374151' : '#E5E7EB';

    // Category Doughnut Chart
    const categoryCtx = document.getElementById('categoryChart');
    if (categoryCtx) {
        new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: ['Software Development', 'Marketing', 'Design', 'Sales', 'Customer Support'],
                datasets: [{
                    label: 'Applications',
                    data: [45, 32, 28, 25, 26],
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.8)',   // Blue
                        'rgba(168, 85, 247, 0.8)',   // Purple
                        'rgba(34, 197, 94, 0.8)',    // Green
                        'rgba(251, 146, 60, 0.8)',   // Orange
                        'rgba(236, 72, 153, 0.8)'    // Pink
                    ],
                    borderColor: [
                        'rgb(59, 130, 246)',
                        'rgb(168, 85, 247)',
                        'rgb(34, 197, 94)',
                        'rgb(251, 146, 60)',
                        'rgb(236, 72, 153)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: textColor,
                            padding: 15,
                            font: {
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: isDarkMode ? '#1F2937' : '#FFFFFF',
                        titleColor: textColor,
                        bodyColor: textColor,
                        borderColor: gridColor,
                        borderWidth: 1,
                        padding: 12,
                        displayColors: true
                    }
                }
            }
        });
    }

    // Trend Line Chart
    const trendCtx = document.getElementById('trendChart');
    if (trendCtx) {
        new Chart(trendCtx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Applications',
                    data: [12, 19, 15, 25, 18, 28, 22],
                    fill: true,
                    backgroundColor: 'rgba(99, 102, 241, 0.1)',
                    borderColor: 'rgb(99, 102, 241)',
                    borderWidth: 3,
                    tension: 0.4,
                    pointBackgroundColor: 'rgb(99, 102, 241)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: isDarkMode ? '#1F2937' : '#FFFFFF',
                        titleColor: textColor,
                        bodyColor: textColor,
                        borderColor: gridColor,
                        borderWidth: 1,
                        padding: 12
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: textColor,
                            stepSize: 5
                        },
                        grid: {
                            color: gridColor,
                            drawBorder: false
                        }
                    },
                    x: {
                        ticks: {
                            color: textColor
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }
});
</script>
@endpush
```

### Step 3: Admin Dashboard Charts

For `resources/views/dashboard.blade.php` (admin dashboard), add similar charts:

#### Add canvas elements:
```blade
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <!-- Users Growth Chart -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">User Growth</h3>
        <canvas id="usersChart" style="max-height: 300px;"></canvas>
    </div>

    <!-- Applications by Status Chart -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Applications by Status</h3>
        <canvas id="statusChart" style="max-height: 300px;"></canvas>
    </div>
</div>
```

#### Add script:
```blade
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const isDarkMode = document.documentElement.classList.contains('dark');
    const textColor = isDarkMode ? '#E5E7EB' : '#374151';
    const gridColor = isDarkMode ? '#374151' : '#E5E7EB';

    // Users Growth Bar Chart
    const usersCtx = document.getElementById('usersChart');
    if (usersCtx) {
        new Chart(usersCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'New Users',
                    data: [45, 52, 48, 67, 73, 89],
                    backgroundColor: 'rgba(59, 130, 246, 0.8)',
                    borderColor: 'rgb(59, 130, 246)',
                    borderWidth: 2,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: isDarkMode ? '#1F2937' : '#FFFFFF',
                        titleColor: textColor,
                        bodyColor: textColor,
                        borderColor: gridColor,
                        borderWidth: 1
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { color: textColor },
                        grid: { color: gridColor }
                    },
                    x: {
                        ticks: { color: textColor },
                        grid: { display: false }
                    }
                }
            }
        });
    }

    // Status Pie Chart
    const statusCtx = document.getElementById('statusChart');
    if (statusCtx) {
        new Chart(statusCtx, {
            type: 'pie',
            data: {
                labels: ['Pending', 'Accepted', 'Rejected', 'Reviewed'],
                datasets: [{
                    data: [45, 30, 15, 10],
                    backgroundColor: [
                        'rgba(251, 191, 36, 0.8)',  // Yellow
                        'rgba(34, 197, 94, 0.8)',   // Green
                        'rgba(239, 68, 68, 0.8)',   // Red
                        'rgba(59, 130, 246, 0.8)'   // Blue
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: textColor,
                            padding: 15
                        }
                    }
                }
            }
        });
    }
});
</script>
@endpush
```

### Step 4: Ensure @stack('scripts') in Layout

Make sure your `resources/views/layouts/app.blade.php` has this before `</body>`:

```blade
@stack('scripts')
</body>
```

### Chart Types Available:

1. **Line Chart** - Trends over time
2. **Bar Chart** - Comparisons
3. **Doughnut Chart** - Proportions with center hole
4. **Pie Chart** - Proportions
5. **Radar Chart** - Multi-dimensional data
6. **Polar Area** - Circular segments

### Features Included:

✅ **Dark Mode Support** - Auto-detects and adjusts colors
✅ **Responsive** - Works on all screen sizes
✅ **Interactive** - Hover tooltips
✅ **Animated** - Smooth transitions
✅ **Beautiful Colors** - Matches Tailwind palette
✅ **Customizable** - Easy to modify data

### Next Steps:

1. Add Chart.js CDN to layout
2. Replace chart sections in dashboards
3. Add the JavaScript code
4. Test in browser
5. Customize colors and data as needed

**Your dashboards will look amazing with these interactive charts!** 📊✨
