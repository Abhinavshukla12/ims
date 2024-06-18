<!-- app/Views/items/index.php -->

<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
<div class="row mt-4">
    <div class="col-12">
        <a href="<?= base_url('ims/item_management/create') ?>" class="btn btn-primary mb-3">Add Item</a>
        <div class="table-responsive">
            <table id="itemsTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= $item['item_id'] ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['description'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td><?= $item['created_at'] ?></td>
                        <td><?= $item['updated_at'] ?></td>
                        <td>
                            <a href="<?= base_url('ims/item_management/edit/' . $item['item_id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('ims/item_management/delete/' . $item['item_id']) ?>" class="btn btn-danger btn-sm">Delete</a>
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
        $('#itemsTable').DataTable({
            "pagingType": "full_numbers"
        });
    });
</script>
<?= $this->endSection() ?>
