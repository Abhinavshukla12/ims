<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= csrf_hash() ?>">
    <title>IMS</title>
    <!-- font awesome link -->
    <link href="<?= base_url('node_modules/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="<?= base_url('node_modules/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Bootswatch CSS -->
    <link href="<?= base_url('node_modules/bootswatch/dist/zephyr/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Load custom CSS -->
<style>
/* General Navbar Styling */
.navbar {
    background-color: #02474d;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 100%;
    top: 0;
    z-index: 1000;
}

/* Brand Styling */
.navbar-brand {
    color: white;
    font-size: 24px;
    font-weight: bold;
    text-decoration: none;
    transition: color 0.7s ease;
    margin-left: 10px;
}

.navbar-brand:hover {
    color: black;
}

/* Nav Link Styling */
.navbar-nav .nav-link {
    color: white;
    font-size: 15px;
    font-weight: bolder;
    text-decoration: none;
    transition: color 0.3s ease, background-color 0.3s ease;
}

.navbar-nav .nav-link:hover {
    background-color: #5f948e;
    color: black;
    border-radius: 4px;
}

.dropdown-menu{
    width: 220px;
    margin-top: 20px;
    margin-left: 10px;
    margin-right: 20px;
    font-size: 14px;
    background-color: #2D9596;
}
</style>

<!-- Bootstrap css -->
<?php
if (isset($css)) {
    foreach ($css as $style):
        echo '<link href="' . base_url('' . $style) . '" rel="stylesheet">';
    endforeach;
}
?>

</head>
<body>

<!-- Primary Navbar -->
<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="<?=base_url('ims/home')?>">Factory Management System</a> <!-- Navbar Brand -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/home')?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/about')?>">About</a>
            </li>
            <!-- Services Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Services
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="nav-link" href="<?=base_url('ims/stock')?>">Stocks Management</a>
                    <a class="nav-link" href="<?=base_url('ims/sales')?>">Sales Management</a>
                    <a class="nav-link" href="<?=base_url('ims/purchase_order')?>">Purchase Management</a>
                    <a class="nav-link" href="<?=base_url('ims/item_management')?>">Item Management</a>
                    <a class="nav-link" href="<?=base_url('ims/suppliers')?>">Supplier Management</a>
                    <a class="nav-link" href="<?=base_url('ims/document')?>">Document Management</a>
                    <a class="nav-link" href="<?=base_url('ims/warehouse')?>">Warehouse Management</a>
                    <a class="nav-link" href="<?=base_url('ims/employee')?>">Employees Management</a>
                </div>
            </li>
            <!-- graph Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Graphs
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="nav-link" href="<?=base_url('ims/stock/stock_graph')?>">Stocks Graph</a>
                    <a class="nav-link" href="<?=base_url('ims/sales/sales_graph')?>">Sales Graph</a>
                    <a class="nav-link" href="<?=base_url('ims/purchase_order/purchase_graph')?>">Purchase Graph</a>
                    <a class="nav-link" href="<?=base_url('ims/item_management/items_graph')?>">Item Graph</a>
                </div>
            </li>
            <!-- Your Dropdown -->
            <li class="nav-item dropdown" style='margin-right: 60px;'>
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Your Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style='width: 80px'>
                    <a class="nav-link" href="<?=base_url('ims/profile')?>">My Profile</a>
                    <a class="nav-link" href="<?=base_url('ims/two_factor_authentication')?>">Two-Factor Authentication</a>
                    <a class="nav-link" href="<?=base_url('ims/account_recovery')?>">Account Recovery Options</a>
                    <a class="nav-link" href="<?=base_url('ims/delete_account')?>">Delete Account</a>
                    <a class="nav-link" href="<?=base_url('ims/switch_account')?>">Switch Account</a>
                    <div class="dropdown-divider"></div>
                        <a class="nav-link" href="<?=base_url('ims/logout')?>">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- the main content goes here -->
<div class="container">
    <?= $this->renderSection('content') ?>
</div>

<script src="<?= base_url('node_modules/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap JS and dependencies -->
<script src="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js"></script>

<!-- jQuery, Popper.js, and Bootstrap JS -->
<script type="text/javascript">
    $.ajaxPrefilter(function (options, originalData, xhr) {
        var data = "<?php echo  csrf_token(). '=' . csrf_hash(); ?>" + "&random=" + Math.random();
        if (options.data) {
            options.data += "&" + data;
        } else {
            options.data = data;
        }
    });
</script>

<!-- Load custom JS -->
<?php
if (isset($js)) {
    foreach ($js as $script):
        echo '<script src="' . base_url('' . $script) . '"></script>';
    endforeach;
}
?>

</body>
</html>