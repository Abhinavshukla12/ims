<!-- app/Views/purchase/index.php -->

<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
<div class="row mt-4">
    <div class="col-12">
        <a href="<?= base_url('ims/purchase_order/create') ?>" class="btn btn-primary mb-3">Add Purchase</a>
        <div class="table-responsive">
            <table id="purchaseOrdersTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Supplier ID</th>
                        <th>Item Name</th>
                        <th>Order Date</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($purchase_orders as $order): ?>
                    <tr>
                        <td><?= $order['order_id'] ?></td>
                        <td><?= $order['supplier_id'] ?></td>
                        <td><?= $order['name'] ?></td>
                        <td><?= $order['order_date'] ?></td>
                        <td><?= $order['quantity'] ?></td>
                        <td><?= $order['price'] ?></td>
                        <td><?= $order['created_at'] ?></td>
                        <td><?= $order['updated_at'] ?></td>
                        <td>
                            <a href="<?= base_url('ims/purchase_order/edit/' . $order['order_id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('ims/purchase_order/delete/' . $order['order_id']) ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function() {
        $('#purchaseOrdersTable').DataTable({
            "pagingType": "full_numbers"
        });
    });
</script>
<?= $this->endSection() ?>
