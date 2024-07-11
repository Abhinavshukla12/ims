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
<style>
    #records {
        width: 100%;
        margin-top: 20px;
    }
    .card {
        background-color: white;
        border: 0.3px solid white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
    }
    .card:hover {
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        transform: translateY(-5px);
    }
    .card-title {
        color: #fff;
        font-size: 20px;
        font-weight: bold;
    }
    .card-text {
        color: #ddd;
    }
    .btn {
        height: 45px;
        width: 100%;
        margin-bottom: 10px;
        font-size: 14px;
        border-radius: 8px;
        background-color: #28a745;
        color: #fff;
        border: none;
        transition: background-color 0.3s ease;
    }
    .btn:hover {
        background-color: #218838;
        color: #fff;
        cursor: pointer;
    }
    .banner {
        background-image: linear-gradient(135deg, #006666 0%, #00cccc 100%);
        color: #fff;
        padding: 60px 0;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
    }
    .banner h1 {
        margin-bottom: 0;
        font-size: 36px;
        font-family: "Arial", sans-serif;
        animation: fadeInDown 1s ease-in-out;
        background: linear-gradient(100deg, #8B0000, #00008B);
       -webkit-background-clip: text;
       -webkit-text-fill-color: transparent;
    }
    .banner p {
        font-size: 18px;
        margin-top: 20px;
        animation: fadeInUp 1s ease-in-out;
    }
    .banner .col-md-12 {
        padding: 0 20px;
    }
    #chart{
        background-color: white;
        border: 0.3px solid white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
    }
    #graph-link {
        text-decoration: none;
    }
    .recent-activities {
        background-color: white;
        border: 0.3px solid white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
    }
    .recent-activities:hover {
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        transform: translateY(-5px);
    }
    .recent-activities h4 {
        color: black;
        font-size: 20px;
        font-weight: bold;
    }
    .recent-activities ul {
        list-style: none;
        padding: 0;
        color: black;
    }
    .recent-activities ul li {
        margin-bottom: 5px;
        padding: 10px;
        border-bottom: 1px solid #333;
        transition: background-color 0.3s ease;
    }
    .recent-activities ul li:hover {
        background-color: #10898d;
        color: white;
    }
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<?= $this->endSection() ?>
