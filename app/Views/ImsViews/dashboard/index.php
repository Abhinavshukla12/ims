<!-- app/Views/home.php -->

<?= $this->extend('ImsViews/layout/default') ?>
<?= $this->section('content') ?>
<body style="background-color: #f2f2f2;">
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12" id="main">
            <h1 class="text-center">Welcome to Management System</h1>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Stocks</h3>
                    <p class="card-text">Total Records: <?= count($stocks) ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Sales</h3>
                    <p class="card-text">Total Records: <?= count($sales) ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Purchases</h3>
                    <p class="card-text">Total Records: <?= count($purchases) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Items</h3>
                    <p class="card-text">Total Records: <?= count($items) ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Suppliers</h3>
                    <p class="card-text">Total Records: <?= count($suppliers) ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Documents</h3>
                    <p class="card-text">Total Records: <?= count($documents) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Warehouses</h3>
                    <p class="card-text">Total Records: <?= count($warehouses) ?></p>
                </div>
            </div>
        </div>
        <!-- Add more columns for other models if needed -->
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
    }
    
    .card-text {
        color: #666;
    }
</style>
<?= $this->endSection() ?>
