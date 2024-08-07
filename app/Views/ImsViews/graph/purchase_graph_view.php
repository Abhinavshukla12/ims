<?= $this->extend('ImsViews/layout/default') ?>
<?= $this->section('content') ?>
<body style="background-color: #10898d;">
    <!-- Purchases Overview Section -->
    <div class="row">
        <!-- for purchases -->
        <div class="col-md-12">
            <div class="card text-black mb-3">
                <div class="card-body" id="chart">
                    <h5>Purchases Overview</h5>
                    <div class="chart-container">
                        <canvas id="purchasesChart"></canvas>
                    </div>
                    <div class="pagination-container">
                        <button id="prevPage">Previous</button>
                        <span id="pageInfo"></span>
                        <button id="nextPage">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const chartConfig = {
                id: 'purchasesChart',
                data: <?= json_encode($purchases) ?>,
                label: 'Purchases Quantity',
                bgColor: 'purple',
                borderColor: 'green',
                keyName: 'quantity'
            };

            const itemsPerPage = 50;
            const ctx = document.getElementById(chartConfig.id).getContext('2d');
            let purchasesChart;
            let currentPage = 1;
            const totalPages = Math.ceil(chartConfig.data.length / itemsPerPage);

            function updateChart() {
                const start = (currentPage - 1) * itemsPerPage;
                const end = start + itemsPerPage;
                const currentData = chartConfig.data.slice(start, end);

                const chartData = currentData.map(item => item.name);
                const chartValues = currentData.map(item => item[chartConfig.keyName]);

                if (purchasesChart) {
                    purchasesChart.data.labels = chartData;
                    purchasesChart.data.datasets[0].data = chartValues;
                    purchasesChart.update();
                } else {
                    purchasesChart = new Chart(ctx, {
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
                            responsive: true,
                            maintainAspectRatio: false,
                            animation: {
                                duration: 2000,
                                easing: 'easeInOutQuart'
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Quantity'
                                    },
                                    ticks: {
                                        callback: function(value) {
                                            return value.toLocaleString(); // Format Y-axis values
                                        }
                                    }
                                },
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Product Name'
                                    },
                                    ticks: {
                                        autoSkip: false,
                                        maxRotation: 45,
                                        minRotation: 45
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return `${context.label}: ${context.raw.toLocaleString()}`; // Format tooltips
                                        }
                                    }
                                }
                            }
                        }
                    });
                }

                document.getElementById('pageInfo').innerText = `Page ${currentPage} of ${totalPages}`;
            }

            document.getElementById('prevPage').addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    updateChart();
                }
            });

            document.getElementById('nextPage').addEventListener('click', () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    updateChart();
                }
            });

            updateChart();
        });
    </script>

    <style>
        .chart-container {
            width: 100%;
            height: 620px; /* Adjust height as needed */
        }
    </style>
</body>
<?= $this->endSection() ?>
