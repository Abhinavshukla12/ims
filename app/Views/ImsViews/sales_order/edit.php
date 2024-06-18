<!-- app/Views/sales/edit.php -->

<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
<div class="row mt-4">
    <div class="col-12">
        <h1>Edit Sales Order</h1>
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <form action="<?= base_url('ims/sales/update/' . $sale['order_id']) ?>" method="post">
            <div class="form-group">
                <label for="customer_id">Customer ID:</label>
                <input type="text" id="customer_id" name="customer_id" class="form-control" value="<?= $sale['customer_id'] ?>" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?= $sale['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="order_date">Order Date:</label>
                <input type="date" id="order_date" name="order_date" class="form-control" value="<?= $sale['order_date'] ?>" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" class="form-control" value="<?= $sale['quantity'] ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" class="form-control" value="<?= $sale['price'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</body>
<?= $this->endSection() ?>
