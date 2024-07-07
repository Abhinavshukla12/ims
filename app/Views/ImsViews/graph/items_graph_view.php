<?= $this->extend('ImsViews/layout/default') ?>
<?= $this->section('content') ?>
<body style="background-color: #10898d;">
    <!-- Chart Section -->
    <div class="row">
        <!-- for stock -->
        <div class="col-md-22">
            <div class="card text-black mb-3">
                <div class="card-body" id="chart">
                    <h5>Items Overview</h5>
                    <canvas id="itemsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const chartConfigs = [
                { id: 'itemsChart', data: <?= json_encode($items) ?>, label: 'Items Quantity', bgColor: 'yellow', borderColor: 'blue', keyName: 'quantity' }
            ];

            chartConfigs.forEach(chartConfig => {
                const ctx = document.getElementById(chartConfig.id).getContext('2d');
                const chartData = chartConfig.data.map(item => item.name);
                const chartValues = chartConfig.data.map(item => item[chartConfig.keyName]);

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: chartData,
                        datasets: [{
                            label: chartConfig.label,
                            data: chartValues,
                            backgroundColor: chartConfig.bgColor,
                            borderColor: chartConfig.borderColor,
                            borderWidth: 2
                        }]
                    },
                    options: {
                        animation: {
                            duration: 2000, // Control animation duration in milliseconds
                            easing: 'easeInOutQuart' // Easing function for animation
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            },
                            x: {
                                ticks: {
                                    display: false // Hide x-axis labels (names)
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false  // Hide the legend (dataset label)
                            }
                        }
                    }
                });
            });
        });
    </script>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #333;
        }
        canvas {
            width: 100%;
            height: auto;
        }
    </style>
</body>
<?= $this->endSection() ?>
