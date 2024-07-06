<?= $this->extend('ImsViews/layout/default') ?>
<?= $this->section('content') ?>
<body style="background-color: #10898d;">
<div class="container mt-3">
    <div class="row banner">
        <div class="col-md-12" id="main">
            <h1 style='color: black; font-weight: 18px;'>Welcome to Factory Management System</h1>
            <p class="text-center text-black">Manage your factory's operations efficiently and effectively.</p>
        </div>
    </div>

    <div id="records">
        <div class="col-md-12">
            <div class="card text-black mb-3">
                <div class="card-body">
                    <u><h2>Statistics Summary</h2></u><br>
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
</body>
<style>
    #records {
        width: 1263px;
        margin-top: 20px;
    }
    .card {
        background-color: #046169;
        border: 0.3px solid white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: box-shadow 0.3s ease-in-out;
    }
    .card:hover {
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }
    .card-title {
        color: #333;
        font-size: 18px;
    }
    .card-text {
        color: #666;
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
        background-image: url('<?= base_url('assets/img/banner.jpg') ?>');
        background-size: cover;
        background-position: center;
        color: #fff;
        padding: 60px 0;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .banner h1 {
        margin-bottom: 0;
        font-size: 36px;
        font-family: "Arial", sans-serif;
    }
    .banner p {
        font-size: 18px;
        margin-top: 20px;
    }
    .banner .col-md-12 {
        padding: 0 20px;
    }
    .recent-activities {
        background-color: #046169;
        border: 0.3px solid white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: box-shadow 0.3s ease-in-out;
    }
    .recent-activities:hover {
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }
    .recent-activities h4 {
        color: #fff;
        font-size: 18px;
    }
    .recent-activities ul {
        list-style: none;
        padding: 0;
        color: #fff;
    }
    .recent-activities ul li {
        margin-bottom: 5px;
    }
</style>
<?= $this->endSection() ?>
