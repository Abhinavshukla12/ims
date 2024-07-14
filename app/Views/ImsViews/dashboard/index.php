<?= $this->extend('ImsViews/layout/default') ?>
<?= $this->section('content') ?>
<body style="background-color: #10898d;">
    <div class="container mt-3">
        <div class="row banner">
            <div class="col-md-2 logo-container">
                <img src="<?=base_url('public/aseets/img/banner/1.png')?>" alt="Logo" class="logo">
            </div>
            <div class="col-md-10 text-black" id="main">
                <h1>Welcome to Factory Management System</h1>
                <p>Manage your factory's operations efficiently and effectively.</p>
            </div>
        </div>

        <div id="records">
            <div class="col-md-12">
                <div class="card text-black mb-3">
                    <div class="card-body">
                        <h3>Statistics Summary</h3><br>
                        <div class="row text-black">
                            <div class="col-md-3">
                                <h4>Total Stocks: <?= count($stocks ?? []) ?></h4>
                                <p>All available stock items in the factory.</p>
                            </div>
                            <div class="col-md-3">
                                <h4>Total Sales: <?= count($sales ?? []) ?></h4>
                                <p>All sales orders completed to date.</p>
                            </div>
                            <div class="col-md-3">
                                <h4>Total Purchases: <?= count($purchases ?? []) ?></h4>
                                <p>All purchase orders made to date.</p>
                            </div>
                            <div class="col-md-3">
                                <h4>Total Items: <?= count($items ?? []) ?></h4>
                                <p>All items currently listed in inventory.</p>
                            </div>
                        </div>
                        <div class="row mt-3 text-black">
                            <div class="col-md-3">
                                <h4>Total Suppliers: <?= count($suppliers ?? []) ?></h4>
                                <p>All suppliers associated with the factory.</p>
                            </div>
                            <div class="col-md-3">
                                <h4>Total Documents: <?= count($documents ?? []) ?></h4>
                                <p>All documents maintained in the system.</p>
                            </div>
                            <div class="col-md-3">
                                <h4>Total Warehouses: <?= count($warehouses ?? []) ?></h4>
                                <p>All warehouses linked to the factory.</p>
                            </div>
                            <div class="col-md-3">
                                <h4>Total Employees: <?= count($employees ?? []) ?></h4>
                                <p>All employees currently working in the factory.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="row">
            <!-- for stock -->
            <div class="col-md-6">
                    <div class="card text-black mb-3">
                        <div class="card-body" id="chart">
                            <a id="graph-link" href="<?=base_url('ims/stock/stock_graph')?>"><h4>Stock Overview</h4></a>
                            <canvas id="stockChart"></canvas>
                        </div>
                    </div>
                </a>
            </div>
            <!-- for sales -->
            <div class="col-md-6">
                    <div class="card text-black mb-3">
                        <div class="card-body" id="chart">
                            <a id="graph-link" href="<?=base_url('ims/sales/sales_graph')?>"><h4>Sales Overview</h4></a>
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <!-- for purchase -->
            <div class="col-md-6">
                    <div class="card text-black mb-3">
                        <div class="card-body" id="chart">
                            <a id="graph-link" href="<?=base_url('ims/purchase_order/purchase_graph')?>"><h4>Purchases Overview</h4></a>
                            <canvas id="purchasesChart"></canvas>
                        </div>
                    </div>
                </a>
            </div>
            <!-- for items -->
            <div class="col-md-6">
                    <div class="card text-black mb-3">
                        <div class="card-body" id="chart">
                            <a id="graph-link" href="<?=base_url('ims/item_management/items_graph')?>"><h4>Items Overview</h4></a>
                            <canvas id="itemsChart"></canvas>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row mt-3 text-black">
            <div class="col-md-4">
                <div class="card text-black mb-3 recent-activities">
                    <div class="card-body">
                        <h4>Recent Sales</h4>
                        <ul>
                            <?php foreach ($recentSales as $sale): ?>
                                <li><?= $sale['name'] ?> - <?= $sale['quantity'] ?> units on <?= $sale['created_at'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-black mb-3 recent-activities">
                    <div class="card-body">
                        <h4>Recent Purchases</h4>
                        <ul>
                            <?php foreach ($recentPurchases as $purchase): ?>
                                <li><?= $purchase['name'] ?> - <?= $purchase['quantity'] ?> units on <?= $purchase['created_at'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-black mb-3 recent-activities">
                    <div class="card-body">
                        <h4>Recent Stocks</h4>
                        <ul>
                            <?php foreach ($recentStocks as $stock): ?>
                                <li><?= $stock['name'] ?> - <?= $stock['quantity'] ?> units on <?= $stock['created_at'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
    // Replace this with your PHP-generated data (aggregated by month)
    const stocksByMonth = <?= json_encode($stocksByMonth) ?>;
    const salesByMonth = <?= json_encode($salesByMonth) ?>;
    const purchasesByMonth = <?= json_encode($purchasesByMonth) ?>;
    const itemsByMonth = <?= json_encode($itemsByMonth) ?>;

    const chartConfigs = [
        { id: 'stockChart', data: stocksByMonth, label: 'Stock Quantity' },
        { id: 'salesChart', data: salesByMonth, label: 'Sales Quantity' },
        { id: 'purchasesChart', data: purchasesByMonth, label: 'Purchases Quantity' },
        { id: 'itemsChart', data: itemsByMonth, label: 'Items Quantity' }
    ];

    chartConfigs.forEach(chartConfig => {
        const ctx = document.getElementById(chartConfig.id).getContext('2d');
        const chartData = Object.keys(chartConfig.data); // Take only the last 12 months
        const chartValues = Object.values(chartConfig.data); // Take only the last 12 months

        // Generate a list of 12 distinct colors
        const backgroundColors = [
            'rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(255, 206, 86, 0.5)', 
            'rgba(75, 192, 192, 0.5)', 'rgba(153, 102, 255, 0.5)', 'rgba(255, 159, 64, 0.5)',
            'rgba(201, 203, 207, 0.5)', 'rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 
            'rgba(255, 206, 86, 0.5)', 'rgba(75, 192, 192, 0.5)', 'rgba(153, 102, 255, 0.5)'
        ];

        const borderColors = backgroundColors.map(color => color.replace('0.5', '1'));

        new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: chartData,
                datasets: [{
                    label: chartConfig.label,
                    data: chartValues,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 2
                }]
            },
            options: {
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart'
                },
                scales: {
                    r: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    }
                }
            }
        });
    });
});

</script>
</body>
<?= $this->endSection() ?>
