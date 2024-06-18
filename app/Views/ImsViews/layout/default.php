<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token">
    <title>IMS</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.3/zephyr/bootstrap.min.css" integrity="sha512-CWXb9sx63+REyEBV/cte+dE1hSsYpJifb57KkqAXjsN3gZQt6phZt7e5RhgZrUbaNfCdtdpcqDZtuTEB+D3q2Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    
    <style>
    .navbar-brand{
        color: white;
    }
    .navbar-brand:hover{
        color: white;
    }
    .navbar-nav .nav-link {
        color: white;
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
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand" href="<?=base_url('ims/home')?>">Management System</a> <!-- Navbar Brand -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/home')?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/about')?>">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/categories')?>">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/contact')?>">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/profile')?>">Profile</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Secondary Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/stock')?>">Stocks Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/purchase_order')?>">Purchase Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/sales')?>">Sales Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/item_management')?>">Item Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/suppliers')?>">Supplier Database</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/warehouse')?>">Warehouse Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/document')?>">Document Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/settings')?>">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/logout')?>">Logout</a>
            </li>
        </ul>
    </div>
</nav>




    <!-- the main content goes here -->
    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>

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
