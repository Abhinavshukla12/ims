<!-- app/Views/sales/index.php -->

<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
<div class="row mt-4">
    <div class="col-12">
        <a href="<?= base_url('ims/sales/create') ?>" class="btn btn-primary mb-3">Create New Order</a>
        <div class="table-responsive">
            <table id="salesTable" class="table table-striped table-bordered" style="margin-left: 0;">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer ID</th>
                        <th>Name</th>
                        <th>Order Date</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sales as $sale): ?>
                    <tr>
                        <td><?= $sale['order_id'] ?></td>
                        <td><?= $sale['customer_id'] ?></td>
                        <td><?= $sale['name'] ?></td>
                        <td><?= $sale['order_date'] ?></td>
                        <td><?= $sale['quantity'] ?></td>
                        <td><?= isset($sale['price']) ? $sale['price'] : 'N/A' ?></td>
                        <td><?= $sale['created_at'] ?></td>
                        <td><?= $sale['updated_at'] ?></td>
                        <td>
                            <a href="<?= base_url('ims/sales/edit/') . $sale['order_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('ims/sales/delete/') . $sale['order_id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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
        var table = $('#salesTable').DataTable({
            "pagingType": "full_numbers"
        });

        $('#searchBar').on('keyup', function() {
            table.search(this.value).draw();
        });
    });
</script>
<?= $this->endSection() ?>