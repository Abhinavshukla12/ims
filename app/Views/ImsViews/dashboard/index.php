<?= $this->extend('ImsViews/layout/default') ?>
<?= $this->section('content') ?>
<body style="background-color: #f2f2f2;">
<div class="container mt-3">
    <div class="row banner">
        <div class="col-md-12" id="main">
            <h1 class="text-center">Welcome to Factory Management System</h1>
            <p class="text-center">Manage your factory's operations efficiently and effectively.</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card bg-info text-white mb-3">
                <div class="card-body">
                    <h3 class="card-title">Statistics Summary</h3>
                    <div class="row">
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
                    <div class="row mt-3">
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
</body>
<style>
.card {
    border: 1px solid #ccc;
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
    background-image: url('<?=base_url('assets/img/banner.jpg')?>');
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
</style>
<?= $this->endSection() ?>