<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">User Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="username" class="font-weight-bold">Username:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="username" class="form-control" value="<?= esc($user['username']) ?>" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="email" class="font-weight-bold">Email:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="email" id="email" class="form-control" value="<?= esc($user['email']) ?>" readonly>
                        </div>
                    </div>
                    <!-- Add more fields as needed -->
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
