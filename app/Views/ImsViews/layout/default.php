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
    <link href="<?= base_url('node_modules/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Bootswatch CSS -->
    <link href="<?= base_url('node_modules/bootswatch/dist/zephyr/bootstrap.min.css') ?>" rel="stylesheet">
    <!--custom css-->

    <!-- Load custom CSS -->
    
    <style>
    /* General Navbar Styling */
.navbar {
    background-color: #333;
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
    transition: color 0.3s ease;
}

.navbar-brand:hover {
    color: black;
}

/* Nav Link Styling */
.navbar-nav .nav-link {
    color: white;
    font-size: 14px;
    font-weight: bolder;
    text-decoration: none;
    transition: color 0.3s ease, background-color 0.3s ease;
}

.navbar-nav .nav-link:hover {
    color: black;
    background-color: #4a7375;
    border-radius: 4px;
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
        <a class="navbar-brand" href="<?=base_url('ims/home')?>">Factory Management System</a> <!-- Navbar Brand -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('ims/home')?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('ims/about')?>">About</a>
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
                <a class="nav-link" href="<?=base_url('ims/sales')?>">Sales Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/purchase_order')?>">Purchase Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/item_management')?>">Item Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/suppliers')?>">Supplier Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/document')?>">Document Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('ims/warehouse')?>">Warehouse Management</a>
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

    <script src="<?= base_url('node_modules/jquery/dist/jquery.min.js') ?>"></script>
  <!-- Bootstrap JS and dependencies -->
  <script src="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
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
