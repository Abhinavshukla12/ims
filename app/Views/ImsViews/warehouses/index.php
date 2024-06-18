<!-- app/Views/warehouses/index.php -->

<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
<div class="row mt-4">
    <div class="col-12">
        <a href="<?= base_url('ims/warehouse/create') ?>" class="btn btn-primary mb-3">Add Warehouse</a>
        <div class="table-responsive">
            <table id="warehousesTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Capacity</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($warehouses as $warehouse): ?>
                    <tr>
                        <td><?= $warehouse['warehouse_id'] ?></td>
                        <td><?= $warehouse['name'] ?></td>
                        <td><?= $warehouse['location'] ?></td>
                        <td><?= $warehouse['capacity'] ?></td>
                        <td><?= $warehouse['created_at'] ?></td>
                        <td><?= $warehouse['updated_at'] ?></td>
                        <td>
                            <a href="<?= base_url('ims/warehouse/edit/' . $warehouse['warehouse_id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('ims/warehouse/delete/' . $warehouse['warehouse_id']) ?>" class="btn btn-danger btn-sm">Delete</a>
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
        $('#warehousesTable').DataTable({
            "pagingType": "full_numbers"
        });
        
        $('#searchBar').on('keyup', function() {
            table.search(this.value).draw();
        });
    });
</script>
<?= $this->endSection() ?>
