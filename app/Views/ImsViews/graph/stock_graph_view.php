<?= $this->extend('ImsViews/layout/default') ?>
<?= $this->section('content') ?>
<body style="background-color: #10898d;">
    <!-- Chart Section -->
    <div class="row">
        <!-- for stock -->
        <div class="col-md-12">
            <div class="card text-black mb-3">
                <div class="card-body" id="chart">
                    <h5>Stock Overview</h5>
                    <div class="chart-container">
                        <canvas id="stockChart"></canvas>
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
                id: 'stockChart',
                data: <?= json_encode($stocks) ?>,
                label: 'Stock Quantity',
                bgColor: 'red',
                borderColor: 'black',
                keyName: 'quantity'
            };

            const itemsPerPage = 50;
            const ctx = document.getElementById(chartConfig.id).getContext('2d');
            let stockChart;
            let currentPage = 1;
            const totalPages = Math.ceil(chartConfig.data.length / itemsPerPage);

            function updateChart() {
                const start = (currentPage - 1) * itemsPerPage;
                const end = start + itemsPerPage;
                const currentData = chartConfig.data.slice(start, end);

                const chartData = currentData.map(item => item.name);
                const chartValues = currentData.map(item => item[chartConfig.keyName]);

                if (stockChart) {
                    stockChart.data.labels = chartData;
                    stockChart.data.datasets[0].data = chartValues;
                    stockChart.update();
                } else {
                    stockChart = new Chart(ctx, {
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
                                duration: 2000,
                                easing: 'easeInOutQuart'
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Quantity'
                                    }
                                },
                                x: {
                                    title: {
                                        display: false,
                                        text: 'Product Name'
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
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

</body>
<?= $this->endSection() ?>
