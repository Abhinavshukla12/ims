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
    <link href="<?=base_url('assets/css/about/main.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/inventary_transaction/stocks/main.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/inventary_transaction/purchase_order/main.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/inventary_transaction/sales_order/main.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/inventary_tracking/item_management/main.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/css/ui.jqgrid.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/plugins/css/ui.multiselect.min.css" />
    
    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #0ac4f2;
            color: black;
            padding: 15px 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar .brand a{
            color: black;
            font-size: 1.5em;
            font-weight: bold;
            margin-right: 20px;
        }
        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .navbar ul li {
            margin-right: 20px;
        }
        .navbar ul li:last-child {
            margin-right: 0;
        }
        .navbar ul li a {
            color: black;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .navbar ul li a:hover {
            background-color: #08596e;
        }
        /* Secondary Navbar Styles */
        .navbar-secondary {
            background-color: #05f782;
            padding: 10px;
            display: flex;
            justify-content: center;
        }
        .navbar-secondary ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .navbar-secondary ul li {
            margin-right: 10px;
        }
        .navbar-secondary ul li:last-child {
            margin-right: 0;
        }
        .navbar-secondary ul li a {
            color: black;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .navbar-secondary ul li a:hover {
            background-color: #08a358;
        }
    </style>
    <!-- Bootstrap css  -->
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
    <div class="navbar">
        <div class="brand"><a href="<?=base_url('ims/home')?>">Manangement System</a></div> <!-- Navbar Brand -->
        <div class="navbar-primary">
            <ul>
                <li><a href="<?=base_url('ims/home')?>">Home</a></li>
                <li><a href="<?=base_url('ims/about')?>">About</a></li>
                <li><a href="<?=base_url('ims/categories')?>">Categories</a></li>
                <li><a href="<?=base_url('ims/contact')?>">Contact</a></li>
                <li><a href="<?=base_url('ims/profile')?>">Profile</a></li>
            </ul>
        </div>
    </div>
    
    <!-- Secondary Navbar -->
    <div class="navbar-secondary">
        <ul>
            <li><a href="<?=base_url('ims/stocks')?>">Stocks Management</a></li>
            <li><a href="<?=base_url('ims/purchase_order')?>">Purchase Orders</a></li>
            <li><a href="<?=base_url('ims/sales_order')?>">Sales Orders</a></li>
            <li><a href="<?=base_url('ims/item_management')?>">Item Management</a></li>
            <li><a href="<?=base_url('ims/supplier_database')?>">Supplier Database</a></li>
            <li><a href="<?=base_url('ims/warehouse')?>">Warehouse Management</a></li>
            <li><a href="<?=base_url('ims/document')?>">Document Management</a></li>
            <li><a href="<?=base_url('ims/settings')?>">Settings</a></li>
            <li><a href="<?=base_url('ims/logout')?>">Logout</a></li>
        </ul>
    </div>

    <!-- the main content goes here -->
    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/jquery.jqgrid.min.js" ></script>
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
