<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-white">
                    <h4 class="mb-0">Change Password</h4>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>
                    <form action="<?= base_url('ims/change_password') ?>" method="post">
                        <div class="form-group">
                            <label for="current_password" class="font-weight-bold">Current Password:</label>
                            <input type="password" id="current_password" name="current_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password" class="font-weight-bold">New Password:</label>
                            <input type="password" id="new_password" name="new_password" class="form-control" required>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<style>
body {
    background-color: #046169;
    color: white;
    font-family: Arial, sans-serif;
    font-size: 14px;
}

.card {
    background-color: #003D4D;
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.card-header {
    background-color: #006D77;
    border-bottom: none;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.card-body {
    padding: 20px;
}

.form-control {
    background-color: #004852;
    border: 1px solid #007B8A;
    color: white;
}

label {
    color: #A5A5A5;
}

.btn-primary {
    background-color: #007B8A;
    border: none;
}

.btn-primary:hover {
    background-color: #005F66;
}
</style>
<?= $this->endSection() ?>