<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
<div class="row mt-4">
    <div class="col-12">
        <a href="<?=base_url('ims/sales_order/create')?>" class="btn btn-primary mb-3">Add Sales</a>
        <div class="table-responsive">
            <table id="salesTable" class="table table-striped table-bordered" style="margin-left: 0;"> <!-- Apply inline style -->
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
                    <?php foreach ($sale_order as $sales_orders): ?>
                    <tr>
                        <td><?= $sales_orders['order_id'] ?></td>
                        <td><?= $sales_orders['customer_id'] ?></td>
                        <td><?= $sales_orders['name'] ?></td>
                        <td><?= $sales_orders['order_date'] ?></td>
                        <td><?= $sales_orders['quantity'] ?></td>
                        <td><?= $sales_orders['price'] ?></td>
                        <td><?= $sales_orders['created_at'] ?></td>
                        <td><?= $sales_orders['updated_at'] ?></td>
                        <td>
                            <a href="<?=base_url('ims/sales_order/edit/')?><?= $sales_orders['order_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?=base_url('ims/sales_order/delete/')?><?= $sales_orders['order_id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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