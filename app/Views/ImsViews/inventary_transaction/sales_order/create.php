<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>

<div class="row mt-5">
    <div class="col-12">
        <h1 class="mb-4">Add Sales</h1>
        <form action="<?=base_url('ims/sales_order/store')?>" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Sales</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>