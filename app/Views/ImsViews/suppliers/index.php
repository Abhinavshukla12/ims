<!-- app/Views/suppliers/index.php -->

<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
<div class="row mt-4">
    <div class="col-12">
        <a href="<?= base_url('ims/suppliers/create') ?>" class="btn btn-primary mb-3">Add Supplier</a>
        <div class="table-responsive">
            <table id="suppliersTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($suppliers as $supplier): ?>
                    <tr>
                        <td><?= $supplier['supplier_id'] ?></td>
                        <td><?= $supplier['name'] ?></td>
                        <td><?= $supplier['contact'] ?></td>
                        <td><?= $supplier['address'] ?></td>
                        <td><?= $supplier['created_at'] ?></td>
                        <td><?= $supplier['updated_at'] ?></td>
                        <td>
                            <a href="<?= base_url('ims/suppliers/edit/' . $supplier['supplier_id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('ims/suppliers/delete/' . $supplier['supplier_id']) ?>" class="btn btn-danger btn-sm">Delete</a>
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
        $('#suppliersTable').DataTable({
            "pagingType": "full_numbers"
        });
        
        $('#searchBar').on('keyup', function() {
            table.search(this.value).draw();
        });
    });
</script>
<?= $this->endSection() ?>
