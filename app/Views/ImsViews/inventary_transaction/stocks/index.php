<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
<div class="row mt-4">
    <div class="col-12">
        <a href="<?=base_url('ims/stock/create')?>" class="btn btn-primary mb-3">Add Stock</a>
        <div class="table-responsive">
            <table id="stocksTable" class="table table-striped table-bordered" style="margin-left: 0;"> <!-- Apply inline style -->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stocks as $stock): ?>
                    <tr>
                        <td><?= $stock['id'] ?></td>
                        <td><?= $stock['name'] ?></td>
                        <td><?= $stock['quantity'] ?></td>
                        <td><?= $stock['price'] ?></td>
                        <td><?= $stock['created_at'] ?></td>
                        <td><?= $stock['updated_at'] ?></td>
                        <td>
                            <a href="<?=base_url('ims/stock/edit/')?><?= $stock['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?=base_url('ims/stock/delete/')?><?= $stock['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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
        var table = $('#stocksTable').DataTable({
            "pagingType": "full_numbers"
        });

        $('#searchBar').on('keyup', function() {
            table.search(this.value).draw();
        });
    });
</script>
<?= $this->endSection() ?>