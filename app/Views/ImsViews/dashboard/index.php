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
                <a id="graph-link" href="<?=base_url('ims/stock/stock_graph')?>">
                    <div class="card text-black mb-3">
                        <div class="card-body" id="chart">
                            <h4>Stock Overview</h4>
                            <canvas id="stockChart"></canvas>
                        </div>
                    </div>
                </a>
            </div>
            <!-- for sales -->
            <div class="col-md-6">
                <a id="graph-link" href="<?=base_url('ims/sales/sales_graph')?>">
                    <div class="card text-black mb-3">
                        <div class="card-body" id="chart">
                            <h4>Sales Overview</h4>
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <!-- for purchase -->
            <div class="col-md-6">
                <a id="graph-link" href="<?=base_url('ims/purchase_order/purchase_graph')?>">
                    <div class="card text-black mb-3">
                        <div class="card-body" id="chart">
                            <h4>Purchases Overview</h4>
                            <canvas id="purchasesChart"></canvas>
                        </div>
                    </div>
                </a>
            </div>
            <!-- for items -->
            <div class="col-md-6">
                <a id="graph-link" href="<?=base_url('ims/item_management/items_graph')?>">
                    <div class="card text-black mb-3">
                        <div class="card-body" id="chart">
                            <h4>Items Overview</h4>
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
        const chartConfigs = [
            { id: 'stockChart', data: <?= json_encode($stocks) ?>, label: 'Stock Quantity', bgColor: 'red', borderColor: 'black', keyName: 'quantity' },
            { id: 'salesChart', data: <?= json_encode($sales) ?>, label: 'Sales Quantity', bgColor: 'blue', borderColor: 'red', keyName: 'quantity' },
            { id: 'purchasesChart', data: <?= json_encode($purchases) ?>, label: 'Purchases Quantity', bgColor: 'purple', borderColor: 'green', keyName: 'quantity' },
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
                        }
                    }
                }
            });
        });
    });
</script>
</body>
<?= $this->endSection() ?>
