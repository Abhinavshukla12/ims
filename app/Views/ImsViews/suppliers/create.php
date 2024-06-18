<!-- app/Views/suppliers/create.php -->

<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
<div class="row mt-4">
    <div class="col-12">
        <h1>Create Supplier</h1>
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <form action="<?= base_url('ims/suppliers/store') ?>" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" id="contact" name="contact" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" class="form-control"></textarea required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
</body>
<?= $this->endSection() ?>
