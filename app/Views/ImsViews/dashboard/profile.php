<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<body>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white">
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
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="fullname" class="font-weight-bold">Full Name:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="fullname" class="form-control" value="<?= esc($user['fullname']) ?>" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="dob" class="font-weight-bold">Date of Birth:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="dob" class="form-control" value="<?= esc($user['dob']) ?>" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="phone" class="font-weight-bold">Phone Number:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="phone" name="phone" class="form-control" value="<?= esc($user['phone']) ?>" readonly>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <a class="btn btn-primary mx-1 my-1" href="<?=base_url('ims/change_username')?>">Change Username</a>
                            <a class="btn btn-primary mx-1 my-1" href="<?=base_url('ims/change_password')?>">Change Password</a>
                            <a class="btn btn-primary mx-1 my-1" href="<?=base_url('ims/change_number')?>">Change Number</a>
                            <a class="btn btn-primary mx-1 my-1" href="<?=base_url('ims/two_factor_authentication')?>">Two-Factor Authentication</a>
                            <a class="btn btn-primary mx-1 my-1" href="<?=base_url('ims/account_recovery')?>">Account Recovery Options</a>
                            <a class="btn btn-danger mx-1 my-1" href="<?=base_url('ims/delete_account')?>">Delete Account</a>
                        </div>
                    </div>
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

.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.375rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.btn-primary {
    background-color: #007B8A;
    border: none;
    margin-bottom: 10px;
}

.btn-primary:hover {
    background-color: #005F66;
}

.btn-danger {
    background-color: #D9534F;
    border: none;
    margin-bottom: 10px;
}

.btn-danger:hover {
    background-color: #C9302C;
}

.mx-1 {
    margin-left: 0.25rem !important;
    margin-right: 0.25rem !important;
}

.my-1 {
    margin-top: 0.25rem !important;
    margin-bottom: 0.25rem !important;
}
</style>
<?= $this->endSection() ?>
