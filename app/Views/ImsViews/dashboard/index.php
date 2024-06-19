<!-- app/Views/home.php -->

<?= $this->extend('ImsViews/layout/default') ?>
<?= $this->section('content') ?>
<body style="background-color: #f2f2f2;">
<div class="container mt-3">
    <div class="row banner">
        <div class="col-md-12" id="main">
            <h1 class="text-center">Welcome to Management System</h1>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Stocks</h3>
                    <p class="card-text">Total Records: <?= count($stocks) ?></p>
                    <div class="d-grid gap-2">
                        <a href="<?=base_url('ims/stock')?>" class="btn btn-lg btn-success">View Records</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Sales</h3>
                    <p class="card-text">Total Records: <?= count($sales) ?></p>
                    <div class="d-grid gap-2">
                        <a href="<?=base_url('ims/sales')?>" class="btn btn-lg btn-success">View Records</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Purchases</h3>
                    <p class="card-text">Total Records: <?= count($purchases) ?></p>
                    <div class="d-grid gap-2">
                        <a href="<?=base_url('ims/purchase_order')?>" class="btn btn-lg btn-success">View Records</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Items</h3>
                    <p class="card-text">Total Records: <?= count($items) ?></p>
                    <div class="d-grid gap-2">
                        <a href="<?=base_url('ims/item_management')?>" class="btn btn-lg btn-success">View Records</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Suppliers</h3>
                    <p class="card-text">Total Records: <?= count($suppliers) ?></p>
                    <div class="d-grid gap-2">
                        <a href="<?=base_url('ims/suppliers')?>" class="btn btn-lg btn-success">View Records</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Documents</h3>
                    <p class="card-text">Total Records: <?= count($documents) ?></p>
                    <div class="d-grid gap-2">
                        <a href="<?=base_url('ims/document')?>" class="btn btn-lg btn-success">View Records</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Warehouses</h3>
                    <p class="card-text">Total Records: <?= count($warehouses) ?></p>
                    <div class="d-grid gap-2">
                        <a href="<?=base_url('ims/warehouse')?>" class="btn btn-lg btn-success">View Records</a>
                    </div>
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
button {
    height: 45px; /* Set the height of the button */
    width: 100%; /* Make the button width responsive to its container */
    margin-bottom: 10px;
    font-size: 8px; /* Increase the font size for better readability */
    border-radius: 8px; /* Add some border-radius for a softer look */
    background-color: #dc3545; /* Change the background color */
    color: #fff; /* Set text color to white */
    border: none; /* Remove the default button border */
    transition: background-color 0.3s ease; /* Add a smooth transition effect */
}
button:hover {
    background-color: #c82333; /* Darken the background color on hover */
    color: #fff; /* Maintain white text color on hover */
    cursor: pointer; /* Change cursor to pointer on hover */
}
.banner {
    background-image: url('<?=base_url('assets/img/banner.jpg')?>'); /* Add your background image path */
    background-size: cover; /* Ensure the background image covers the entire container */
    background-position: center; /* Center the background image */
    color: #fff; /* Set text color to white */
    padding: 60px 0; /* Add more padding for better spacing */
    text-align: center; /* Center align text */
    border-radius: 10px; /* Add border radius */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
}
.banner h1 {
    margin-bottom: 0; /* Remove default margin for h1 */
    font-size: 36px; /* Increase font size */
    font-family: "Arial", sans-serif;
}
.banner p {
    font-size: 18px; /* Set font size for additional text */
    margin-top: 20px; /* Add margin on top */
}
.banner .col-md-12 {
    padding: 0 20px; /* Add padding to the container */
}
</style>
<?= $this->endSection() ?>
