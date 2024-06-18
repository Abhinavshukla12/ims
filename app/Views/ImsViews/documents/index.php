<!-- app/Views/documents/index.php -->

<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
<div class="row mt-4">
    <div class="col-12">
        <a href="<?= base_url('ims/document/create') ?>" class="btn btn-primary mb-3">Add Document</a>
        <div class="table-responsive">
            <table id="documentsTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>File Path</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($documents as $document): ?>
                    <tr>
                        <td><?= $document['document_id'] ?></td>
                        <td><?= $document['title'] ?></td>
                        <td><?= $document['description'] ?></td>
                        <td><?= $document['file_path'] ?></td>
                        <td><?= $document['created_at'] ?></td>
                        <td><?= $document['updated_at'] ?></td>
                        <td>
                            <a href="<?= base_url('ims/document/edit/' . $document['document_id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('ims/document/delete/' . $document['document_id']) ?>" class="btn btn-danger btn-sm">Delete</a>
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
        $('#documentsTable').DataTable({
            "pagingType": "full_numbers"
        });
        
        $('#searchBar').on('keyup', function() {
            table.search(this.value).draw();
        });
    });
</script>
<?= $this->endSection() ?>
